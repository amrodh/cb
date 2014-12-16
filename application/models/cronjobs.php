<?php 
class CronJobs extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    function cronJob()
    {
    	// printme('entered');
    	$this->load->model('service');
  		$cities = $this->service->getCities();

  		foreach ($cities as $key => $city) {
  			$this->checkCity($city);
  		}
  		// printme('cities Done');
  	//========================================================================================================================
  		$cities = $this->database->getCities();
  		foreach ($cities as $key => $city) {
  			$districts = $this->service->getDistricts($city['id']);
  			if (is_array($districts))
  			{
  				foreach ($districts as $key => $district) {
	  				$this->checkDistrict($district);
	  			}
  			}
  		}
		// printme('districts Done');
  	//========================================================================================================================
  		$this->db->select('LocationDistrict');
  		$this->db->distinct();
  		$this->db->select('LocationProject');
  		$this->db->from('property_service');
  		$this->db->order_by('LocationDistrict', 'asc');
		$query = $this->db->get();
		foreach ($query->result() as $key => $neighborhood) {
			if ($neighborhood->LocationProject != ''){
				$neighborhoods = $this->checkNeighborhood();
				if (!in_array($neighborhood->LocationProject, $neighborhoods))
				{
					$districtID = $this->database->getDistrictId($neighborhood->LocationDistrict);
					if ($districtID != false){
						$data = array('district_id' => $districtID['id'] , 'neighborhood' => $neighborhood->LocationProject);
			            $query = $this->db->insert_string('neighborhood', $data);
			            $query = $this->db->query($query);
					}
				}
			}
		}
		// printme('projects Done');
	//========================================================================================================================

		$this->load->model('service');
        $inputs = array(
            'searchMode' => 'Exact',
            'Bedrooms' => '',
            'PropertyId' => '',
            'PropertyFor' => 3,
            'PriceLowerLimit' => 0,
            'PriceUpperLimit' => 1000000000000000000,
            'PunitSale' => '',
            'RentPriceLowerLimit' => 0,
            'RentPriceUpperLimit' => 1000000000000000000,
            'PunitRent' => '',
            'AreaLowerLimit' => 0,
            'AreaUpperLimit' => 1000000000000000000,
            'PropertyType' => '',
            'PropertyFor' => '',
            'BoxLocation' => '',
            'AreaUnitId' => '',
            'CompanyId' => '',
            'sortmode' => '',
            'sortType' =>'1',
            'isFeatured' => false,
            'resultsCountPerPage' => '1300', 
            'useFeaturedFilter' => false
        );

		$resultsArray = array();
		$lastID = 0;
        $results = $this->service->search($inputs);
        $serviceResults = array();
        foreach ($results['results'] as $key => $value) {
            $resultsArray[$key] = $value->PropertyId;
            $serviceResults[$key] = $value;
            $count = $key+1;
            $lastID = $value->PropertyId;
        }
        
        $inputs = array(
            'searchMode' => 'Exact',
            'Bedrooms' => '',
            'PropertyId' => '',
            'PropertyFor' => 3,
            'PriceLowerLimit' => 0,
            'PriceUpperLimit' => 1000000000000000000,
            'PunitSale' => '',
            'RentPriceLowerLimit' => 0,
            'RentPriceUpperLimit' => 1000000000000000000,
            'PunitRent' => '',
            'AreaLowerLimit' => 0,
            'AreaUpperLimit' => 1000000000000000000,
            'PropertyType' => '',
            'PropertyFor' => '',
            'BoxLocation' => '',
            'AreaUnitId' => '',
            'CompanyId' => '',
            'sortmode' => '',
            'sortType' =>'2',
            'isFeatured' => false,
            'resultsCountPerPage' => '1300', 
            'useFeaturedFilter' => false
        );

        $results = $this->service->search($inputs);
        foreach ($results['results'] as $key => $value) {
        	if ($value->PropertyId > $lastID)
        	{
        		$resultsArray[$count] = $value->PropertyId;
        		$serviceResults[$count] = $value;
            	$count++;
        	}
        }

        $DBPropertiesKeys = array();
        $DBProperties = array();
        $Properties = $this->database->getAllProperties();
        foreach ($Properties as $key => $value) {
        	$DBPropertiesKeys[$key] = $value['PropertyId'];
        	$DBProperties = $value;
        }
        // printme($DBProperties);exit();
        foreach ($resultsArray as $key => $value) {
        	if (!in_array($value, $DBPropertiesKeys)){
        		$data = array(
                    'AreaNumericValue' => $serviceResults[$key]->AreaNumericValue, 
                    'AreaUnit' => $serviceResults[$key]->AreaUnit,
                    'AreaunitStr' => $serviceResults[$key]->AreaunitStr,
                    'BalconiesNumber' => $serviceResults[$key]->BalconiesNumber,
                    'BathRoomsNumber' => $serviceResults[$key]->BathRoomsNumber,
                    'BedRoomsNumber' => $serviceResults[$key]->BedRoomsNumber,
                    'InteriorFinishing' => $serviceResults[$key]->InteriorFinishing,
                    'LineofBusinessFK' => $serviceResults[$key]->LineofBusinessFK,
                    'LocationCity' => $serviceResults[$key]->LocationCity,
                    'LocationDistrict' => $serviceResults[$key]->LocationDistrict,
                    'LocationProject' => $serviceResults[$key]->LocationProject,
                    'PropertyTypeFK' => $serviceResults[$key]->PropertyTypeFK,
                    'PrpertyTypeStr' => $serviceResults[$key]->PrpertyTypeStr,
                    'RentCurrency' => $serviceResults[$key]->RentCurrency,
                    'RentPrice' => $serviceResults[$key]->RentPrice,
                    'RentPricePerAreaUnit' => $serviceResults[$key]->RentPricePerAreaUnit,
                    'SaleCurrency' => $serviceResults[$key]->SaleCurrency,
                    'SalePrice' => $serviceResults[$key]->SalePrice,
                    'SalePricePerAreaUnit' => $serviceResults[$key]->SalePricePerAreaUnit,
                    'SalesTypeStr' => $serviceResults[$key]->SalesTypeStr,
                    'TotalArea' => $serviceResults[$key]->TotalArea,
                    'UnitId' => $serviceResults[$key]->UnitId,
                    'PropertyId' => $serviceResults[$key]->PropertyId
                );
                $query = $this->db->insert_string('property_service', $data);
                $query = $this->db->query($query);
                $this->insertPropertyImage($serviceResults[$key]->PropertyId, $serviceResults[$key]->UnitId);
        	}
        }

        foreach ($DBPropertiesKeys as $key => $value) {
        	if (!in_array($value, $resultsArray)){
        		$this->deleteProperty($value);
        	}
        }

        $inputs = array(
            'searchMode' => 'Exact',
            'Bedrooms' => '',
            'PropertyId' => '',
            'Purpose' => 3,
            'PriceLowerLimit' => 0,
            'PriceUpperLimit' => 1000000000000000000,
            'PunitSale' => '',
            'RentPriceLowerLimit' => 0,
            'RentPriceUpperLimit' => 1000000000000000000,
            'PunitRent' => '',
            'AreaLowerLimit' => 0,
            'AreaUpperLimit' => 1000000000000000000,
            'PropertyType' => '',
            'PropertyFor' => '',
            'BoxLocation' => '',
            'LineOfBusinessId' => '',
            'CompanyId' => '',
            'sortmode' => '',
            'sortType' => 1,
            'pageIndex' => '',
            'licences' => '',
            'isFeatured' => true,
            'resultsCountPerPage' => '1300', 
            'useFeaturedFilter' => true
        );

        $featuredProperties = $this->service->search($inputs);
        $featuredResults = array();
        $featuredResultsKey = array();
        $count2 = 0;
        foreach ($featuredProperties['results'] as $key => $value) {
            $featuredResultsKey[$key] = $value->PropertyId;
            $featuredResults[$key] = $value;
            // $count2 = $key+1;
            // $lastID = $value->PropertyId;
        }
        $DBFeaturedKey = array();
        $DBFeatured = $this->database->getAllFeaturedProperties();
        foreach ($DBFeatured as $key => $value) {
        	$DBFeaturedKey[$key] = $value->propertyId;
        }

        foreach ($featuredResultsKey as $key => $result) {
        	if (!in_array($result, $DBFeaturedKey))
        	{
        		$data = array(
                    'propertyId' => $featuredResults[$key]->PropertyId
                );
                $query = $this->db->insert_string('property_featured', $data);
                $query = $this->db->query($query);
        	}
        }

        foreach ($DBFeaturedKey as $key => $result) {
        	if (!in_array($result, $featuredResultsKey))
        	{
                $this->db->where('propertyId', $result);
                $this->db->delete('property_featured'); 
        	}
        }

        // printme('properties Done');
    }

    function propertyAlertCron()
	{
		$this->load->library('simple_html_dom');
      	$dataArray = array();
	    // include(base_url().'application/libraries/simple_html_dom.php');
	    // $this->load->model('service');
	    $q = $this
            ->db
            ->get('user_property_alert');

        $results = $q->result();
      	foreach ($results as $result) {
          	$identifier = $result->user_identifier;
          	if(!$this->checkmail($identifier)){
	      		$tmp = $this->user->getUserByID($identifier);
	          	$result->user_identifier = $tmp->email;
          	}
          
          	if (array_key_exists($result->property_data, $dataArray))
          	{
	            $dataArray[$result->property_data] = $dataArray[$result->property_data].','.$result->user_identifier;
	        }else{
	            $dataArray[$result->property_data] = $result->user_identifier;
	        }
  		}

  		foreach ($dataArray as $key1 => $data1) {
  			$propertyData = explode(',', $key1);
          	$property_data = array();
          	$data = array();
          	$count = 0;
          	foreach ($propertyData as $key => $data2) {
              	$tmp = explode('=', $data2);
              	if ($tmp[0] == 'city'){
                  	$city = explode("'", $tmp[1]);
                  	$city = $this->database->getCityByID($city[1]);
                  	$property_data[$count]['city'] = $city[0]['name'];
              	}elseif ($tmp[0] == 'district'){
                  	$district = explode("'", $tmp[1]);
                  	$district = $this->database->getDistrictByID($district[1]);
                  	$property_data[$count]['district'] = $district[0]['name'];
              	}elseif ($tmp[0] == 'type') {
                  	$type = explode("'", $tmp[1]);
                  	$type = $type[1];
                  	$type = $this->database->getPropertyTypeID($type);
            	  	$property_data[$count]['type'] = $type[0]['property_id'];
              	}elseif ($tmp[0] == 'price'){
                  	$price = explode("'", $tmp[1]);
                 	$price = $price[1];
                  	$price = explode(" - ", $price);
                  	$property_data[$count]['priceLowerLimit'] = $price[0];
                  	$property_data[$count]['priceUpperLimit'] = $price[1];
              	}elseif ($tmp[0] == 'area') {
                  	$area = explode("'", $tmp[1]);
                  	$area = $area[1];
                  	$area = explode(" - ", $area);
                  	$property_data[$count]['areaLowerLimit'] = $area[0];
                  	$property_data[$count]['areaUpperLimit'] = $area[1];
              	}elseif ($tmp[0] == 'contractType') {
                  	$contractType = explode("'", $tmp[1]);
                  	$property_data[$count]['contractType'] = $contractType[1];
              	}
          	}

          	if(!isset($property_data[$count]['city']))
            {
                $property_data[$count]['city'] = '';
            }
            if(!isset($property_data[$count]['district']))
            {
                $property_data[$count]['district'] = '';
            }
            if (!isset($property_data[$count]['type'])){
                $property_data[$count]['type'] = '';
            }else{
                $property_data[$count]['type'] = $this->database->getPropertyTypeByID($property_data[$count]['type']);
            }
            if(!isset($property_data[$count]['priceLowerLimit']))
            {
                $property_data[$count]['priceLowerLimit'] = 0;
            }
            if(!isset($property_data[$count]['priceUpperLimit']))
            {
                $property_data[$count]['priceUpperLimit'] = 100000000000000;
            }
            if(!isset($property_data[$count]['areaLowerLimit']))
            {
                $property_data[$count]['areaLowerLimit'] = 0;
            }
            if(!isset($property_data[$count]['areaUpperLimit']))
            {
                $property_data[$count]['areaUpperLimit'] = 100000000000000;
            }
            if(!isset($property_data[$count]['contractType']))
            {
                $property_data[$count]['contractType'] = 'Sale/Rent';
            }

            $searchParams = array(
              'lob' => '',
              'PropertyType' => $property_data[$count]['type'],
              'City' => $property_data[$count]['city'],
              'District' => $property_data[$count]['district'],
              'PropertyFor' => $property_data[$count]['contractType'],
              'PriceLowerLimit' => $property_data[$count]['priceLowerLimit'],
              'PriceUpperLimit' => $property_data[$count]['priceUpperLimit'],
              'AreaLowerLimit' => $property_data[$count]['areaLowerLimit'],
              'AreaUpperLimit' => $property_data[$count]['areaUpperLimit']
            );
            $count++;
            $searchResults = $this->database->search($searchParams);
            if ($searchResults['totalResults'] != 0){
            	$data = array(
            		'title'=>'Coldwell Banker Daily Property Alert', 
               		'properties' => $searchResults['results']
           		);

            }
  		}
	}

	function checkmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
             return true;
        else
          	return false;       
    }

	function smtpmailer($subject,$body,$to, $attachment) { 

	   date_default_timezone_set('America/Los_Angeles');
	   $config = Array(
	    'protocol' => 'smtp',
	    'smtp_host' => 'ssl://smtp.googlemail.com',
	    'smtp_port' => 465,
	    'smtp_user' => 's.nahal@enlightworld.com', // change it to yours
	    'smtp_pass' => '01069393641', // change it to yours
	    'mailtype' => 'html',
	    'charset' => 'iso-8859-1',
	    'wordwrap' => TRUE
	    );

	    $this->load->library('email', $config);
	    $this->email->set_newline("\r\n");
	    $this->email->from('test@ColdWell.com'); // change it to yours
	    $this->email->to($to); // change it to yours
	    $this->email->subject($subject);
	    $this->email->message($body);
	    // printme($attachment);exit();
	    if ($attachment != '')
	    {
	        if (is_array($attachment)){
	            foreach ($attachment as $value) {
	                // printme($value);
	              	$this->email->attach($value);
	            }
	        }else{
	          $this->email->attach($attachment);
	        }
	        
	    }
	    

	    if($this->email->send()){
	      // echo $this->email->print_debugger();die;
	    	return true;
	  	}else{
	     	show_error($this->email->print_debugger());
	    }
  	}	

  	// function importCitiesCron()
  	// {
  	// 	$this->load->model('service');
  	// 	$cities = $this->service->getCities();

  	// 	foreach ($cities as $key => $city) {
  	// 		$this->checkCity($city);
  	// 	}
  	// }

  	// function importDistrictsCron()
  	// {
  	// 	$this->load->model('service');
  	// 	$this->load->model('database');
  	// 	$cities = $this->database->getCities();
  	// 	foreach ($cities as $key => $city) {
  	// 		$districts = $this->service->getDistricts($city['id']);
  	// 		if (is_array($districts))
  	// 		{
  	// 			foreach ($districts as $key => $district) {
	  // 				$this->checkDistrict($district);
	  // 			}
  	// 		}
  	// 	}
  	// }

  // 	function importNeighborhoodsCron()
  // 	{	
  // 		$this->db->select('LocationDistrict');
  // 		$this->db->distinct();
  // 		$this->db->select('LocationProject');
  // 		$this->db->from('property_service');
  // 		$this->db->order_by('LocationDistrict', 'asc');
		// $query = $this->db->get();
		// foreach ($query->result() as $key => $neighborhood) {
		// 	if ($neighborhood->LocationProject != ''){
		// 		$neighborhoods = $this->checkNeighborhood();
		// 		if (!in_array($neighborhood->LocationProject, $neighborhoods))
		// 		{
		// 			$districtID = $this->database->getDistrictId($neighborhood->LocationDistrict);
		// 			if ($districtID != false){
		// 				$data = array('district_id' => $districtID['id'] , 'neighborhood' => $neighborhood->LocationProject);
		// 	            $query = $this->db->insert_string('neighborhood', $data);
		// 	            $query = $this->db->query($query);
		// 			}
		// 		}
		// 	}
		// }
  // 	}

  	function checkCity($city)
  	{
  		$q = $this
              ->db
              ->where('id', $city['id'])
              ->get('city');

        if($q->num_rows  == 0){
            $data = array('id' => $city['id'] , 'name' => $city['name']);
            $query = $this->db->insert_string('city', $data);
            $query = $this->db->query($query);
            return true;
       	}
       	return false;
  	}

  	function checkDistrict($district)
  	{

  		$q = $this
              ->db
              ->where('id', $district['id'])
              ->get('district');

        if($q->num_rows  == 0){
            $data = array('id' => $district['id'] , 'name' => $district['name']);
            $query = $this->db->insert_string('district', $data);
            $query = $this->db->query($query);
            return true;
       	}
       	return false;
  	}

  	function checkNeighborhood()
  	{	
  		$q = $this
              ->db
              ->get('neighborhood');

        $neighborhoods = array();

        foreach ($q->result_array() as $key => $result) {
        	$neighborhoods[$key] = $result['neighborhood'];
        }
        if($q->num_rows  > 0){
        	return $neighborhoods;
       	}
       	return false;
  	}

  // 	function importPropertiesIntoDB()
  //   {
  //   	$this->load->model('service');
  //       $inputs = array(
  //           'searchMode' => 'Exact',
  //           'Bedrooms' => '',
  //           'PropertyId' => '',
  //           'PropertyFor' => 3,
  //           'PriceLowerLimit' => 0,
  //           'PriceUpperLimit' => 1000000000000000000,
  //           'PunitSale' => '',
  //           'RentPriceLowerLimit' => 0,
  //           'RentPriceUpperLimit' => 1000000000000000000,
  //           'PunitRent' => '',
  //           'AreaLowerLimit' => 0,
  //           'AreaUpperLimit' => 1000000000000000000,
  //           'PropertyType' => '',
  //           'PropertyFor' => '',
  //           'BoxLocation' => '',
  //           'AreaUnitId' => '',
  //           'CompanyId' => '',
  //           'sortmode' => '',
  //           'sortType' =>'1',
  //           'isFeatured' => false,
  //           'resultsCountPerPage' => '1300', 
  //           'useFeaturedFilter' => false
  //       );

		// $resultsArray = array();
		// $lastID = 0;
  //       $results = $this->service->search($inputs);
  //       $serviceResults = array();
  //       foreach ($results['results'] as $key => $value) {
  //           $resultsArray[$key] = $value->PropertyId;
  //           $serviceResults[$key] = $value;
  //           $count = $key+1;
  //           $lastID = $value->PropertyId;
  //       }
        
  //       $inputs = array(
  //           'searchMode' => 'Exact',
  //           'Bedrooms' => '',
  //           'PropertyId' => '',
  //           'PropertyFor' => 3,
  //           'PriceLowerLimit' => 0,
  //           'PriceUpperLimit' => 1000000000000000000,
  //           'PunitSale' => '',
  //           'RentPriceLowerLimit' => 0,
  //           'RentPriceUpperLimit' => 1000000000000000000,
  //           'PunitRent' => '',
  //           'AreaLowerLimit' => 0,
  //           'AreaUpperLimit' => 1000000000000000000,
  //           'PropertyType' => '',
  //           'PropertyFor' => '',
  //           'BoxLocation' => '',
  //           'AreaUnitId' => '',
  //           'CompanyId' => '',
  //           'sortmode' => '',
  //           'sortType' =>'2',
  //           'isFeatured' => false,
  //           'resultsCountPerPage' => '1300', 
  //           'useFeaturedFilter' => false
  //       );

  //       $results = $this->service->search($inputs);
  //       foreach ($results['results'] as $key => $value) {
  //       	if ($value->PropertyId > $lastID)
  //       	{
  //       		$resultsArray[$count] = $value->PropertyId;
  //       		$serviceResults[$count] = $value;
  //           	$count++;
  //       	}
  //       }

  //       $DBPropertiesKeys = array();
  //       $DBProperties = array();
  //       $Properties = $this->database->getAllProperties();
  //       foreach ($Properties as $key => $value) {
  //       	$DBPropertiesKeys[$key] = $value['PropertyId'];
  //       	$DBProperties = $value;
  //       }
  //       // printme($DBProperties);exit();
  //       foreach ($resultsArray as $key => $value) {
  //       	if (!in_array($value, $DBPropertiesKeys)){
  //       		$data = array(
  //                   'AreaNumericValue' => $serviceResults[$key]->AreaNumericValue, 
  //                   'AreaUnit' => $serviceResults[$key]->AreaUnit,
  //                   'AreaunitStr' => $serviceResults[$key]->AreaunitStr,
  //                   'BalconiesNumber' => $serviceResults[$key]->BalconiesNumber,
  //                   'BathRoomsNumber' => $serviceResults[$key]->BathRoomsNumber,
  //                   'BedRoomsNumber' => $serviceResults[$key]->BedRoomsNumber,
  //                   'InteriorFinishing' => $serviceResults[$key]->InteriorFinishing,
  //                   'LineofBusinessFK' => $serviceResults[$key]->LineofBusinessFK,
  //                   'LocationCity' => $serviceResults[$key]->LocationCity,
  //                   'LocationDistrict' => $serviceResults[$key]->LocationDistrict,
  //                   'LocationProject' => $serviceResults[$key]->LocationProject,
  //                   'PropertyTypeFK' => $serviceResults[$key]->PropertyTypeFK,
  //                   'PrpertyTypeStr' => $serviceResults[$key]->PrpertyTypeStr,
  //                   'RentCurrency' => $serviceResults[$key]->RentCurrency,
  //                   'RentPrice' => $serviceResults[$key]->RentPrice,
  //                   'RentPricePerAreaUnit' => $serviceResults[$key]->RentPricePerAreaUnit,
  //                   'SaleCurrency' => $serviceResults[$key]->SaleCurrency,
  //                   'SalePrice' => $serviceResults[$key]->SalePrice,
  //                   'SalePricePerAreaUnit' => $serviceResults[$key]->SalePricePerAreaUnit,
  //                   'SalesTypeStr' => $serviceResults[$key]->SalesTypeStr,
  //                   'TotalArea' => $serviceResults[$key]->TotalArea,
  //                   'UnitId' => $serviceResults[$key]->UnitId,
  //                   'PropertyId' => $serviceResults[$key]->PropertyId
  //               );
  //               $query = $this->db->insert_string('property_service', $data);
  //               $query = $this->db->query($query);
  //               $this->insertPropertyImage($serviceResults[$key]->PropertyId, $serviceResults[$key]->UnitId);
  //       	}
  //       }

  //       foreach ($DBPropertiesKeys as $key => $value) {
  //       	if (!in_array($value, $resultsArray)){
  //       		$this->deleteProperty($value);
  //       	}
  //       }

  //       $inputs = array(
  //           'searchMode' => 'Exact',
  //           'Bedrooms' => '',
  //           'PropertyId' => '',
  //           'Purpose' => 3,
  //           'PriceLowerLimit' => 0,
  //           'PriceUpperLimit' => 1000000000000000000,
  //           'PunitSale' => '',
  //           'RentPriceLowerLimit' => 0,
  //           'RentPriceUpperLimit' => 1000000000000000000,
  //           'PunitRent' => '',
  //           'AreaLowerLimit' => 0,
  //           'AreaUpperLimit' => 1000000000000000000,
  //           'PropertyType' => '',
  //           'PropertyFor' => '',
  //           'BoxLocation' => '',
  //           'LineOfBusinessId' => '',
  //           'CompanyId' => '',
  //           'sortmode' => '',
  //           'sortType' => 1,
  //           'pageIndex' => '',
  //           'licences' => '',
  //           'isFeatured' => true,
  //           'resultsCountPerPage' => '1300', 
  //           'useFeaturedFilter' => true
  //       );

  //       $featuredProperties = $this->service->search($inputs);
  //       $featuredResults = array();
  //       $featuredResultsKey = array();
  //       $count2 = 0;
  //       foreach ($featuredProperties['results'] as $key => $value) {
  //           $featuredResultsKey[$key] = $value->PropertyId;
  //           $featuredResults[$key] = $value;
  //           // $count2 = $key+1;
  //           // $lastID = $value->PropertyId;
  //       }
  //       $DBFeaturedKey = array();
  //       $DBFeatured = $this->database->getAllFeaturedProperties();
  //       foreach ($DBFeatured as $key => $value) {
  //       	$DBFeaturedKey[$key] = $value->propertyId;
  //       }

  //       foreach ($featuredResultsKey as $key => $result) {
  //       	if (!in_array($result, $DBFeaturedKey))
  //       	{
  //       		$data = array(
  //                   'propertyId' => $featuredResults[$key]->PropertyId
  //               );
  //               $query = $this->db->insert_string('property_featured', $data);
  //               $query = $this->db->query($query);
  //       	}
  //       }

  //       foreach ($DBFeaturedKey as $key => $result) {
  //       	if (!in_array($result, $featuredResultsKey))
  //       	{
  //               $this->db->where('propertyId', $result);
  //               $this->db->delete('property_featured'); 
  //       	}
  //       }
  //   }

    function insertPropertyImage($propertyID, $unitID)
    {
    	$this->load->library('simple_html_dom');
    	$this->load->model('service');
    	$data['images'][$propertyID] = $this->service->getPropertyImages($propertyID, $unitID);
    	$html = str_get_html(($data['images'][$propertyID]));
        if($html && is_object($html)){
            $count = 0;
            $image = $html->find('img');
             
            if(count($image) == 0){
                $data['image'][$propertyID] = getcwd().'/application/static/images/No_image.svg';
                $data = array('property_id' => $property['PropertyId'] , 'image' => 'No_image.svg');
                $query = $this->db->insert_string('unit_image', $data);
                $query = $this->db->query($query);
                // printme('done1');
                continue;
            }
            foreach($image as $element) 
            {   
                $url = $element->attr['src'];
                $test = file_get_contents(trim($url));
                
                $img = getcwd().'/application/static/upload/property_images/image_'.$count.'_'.$propertyID.'.jpg';
                file_put_contents($img, $test);
                $data = array('property_id' => $propertyID , 'image' => 'image_'.$count.'_'.$propertyID.'.jpg');
                $query = $this->db->insert_string('unit_image', $data);
                $query = $this->db->query($query);
                // printme('done2'.$propertyID);
                $count++;
                // exit();
            }
              
        }else{
            $data['image'][$propertyID] = getcwd().'/application/static/images/No_image.svg';
        }
    }

    function deleteProperty($propertyID)
    {
    	$this->db->where('PropertyId', $propertyID);
		$this->db->delete('property_service'); 

		$this->db->where('property_id', $propertyID);
		$this->db->delete('unit_image'); 
    }

}