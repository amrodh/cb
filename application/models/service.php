<?php


class service extends CI_Model {

    public $client ;
    function __construct()
    {   
        parent::__construct();
        libxml_disable_entity_loader(false);
        ini_set( "soap.wsdl_cache_enabled", "0" );
       
        
        $options = array( 
                'exceptions'=>0, 
                'trace'=>1,
                'cache_wsdl'=>WSDL_CACHE_NONE 
            ); 
        try {
            $this->client = new SoapClient("http://64.150.184.135:81/WebServ/searchservice.svc?wsdl",$options);
        } catch (Exception $e) {
        }
        
    }

    function search($inputs)
    {
        if (isset($inputs['lineOfBusiness'])){
            $lineOfBusiness = array (0 => $inputs['lineOfBusiness']);
        }else{
            $lineOfBusiness = array();
        }

        if (isset($inputs['isFeatured'])){
            $isFeatured = $inputs['isFeatured'];
        }else{
            $isFeatured = false;
        }

        if (isset($inputs['useFeaturedFilter'])){
            $useFeaturedFilter = $inputs['useFeaturedFilter'];
        }else{
            $useFeaturedFilter = false;
        }

        if (isset($inputs['sortType'])) {
            $sortType = $inputs['sortType'];
        }else{
            $sortType = '';
        }

        $inputs = array(
            'searchMode' => 'Exact',
            'Bedrooms' => '',
            'PropertyId' => '',
            'Purpose' => $inputs['PropertyFor'],
            'PriceLowerLimit' => $inputs['PriceLowerLimit'],
            'PriceUpperLimit' => $inputs['PriceUpperLimit'],
            'PunitSale' => '',
            'RentPriceLowerLimit' => $inputs['PriceLowerLimit'],
            'RentPriceUpperLimit' => $inputs['PriceUpperLimit'],
            'PunitRent' => '',
            'AreaLowerLimit' => $inputs['AreaLowerLimit'],
            'AreaUpperLimit' => $inputs['AreaUpperLimit'],
            'PropertyType' => $inputs['PropertyType'],
            'PropertyFor' => '',
            'BoxLocation' => $inputs['BoxLocation'],
            'BudgetFrom' => '',
            'BudgetTo' => '',
            'AreaFrom' => '',
            'AreaTo' => '',
            'AreaUnitId' => '',
            'LineOfBusinessId' => $lineOfBusiness,
            'CompanyId' => '',
            'sortmode' => '',
            'sortType' => $sortType,
            'pageIndex' => '',
            'licences' => '',
            'isFeatured' => $isFeatured,
            'resultsCountPerPage' => '10', 
            'useFeaturedFilter' => $useFeaturedFilter
            );
        
        $results = $this->client->Search($inputs);
        
        $data = array();
        if ($results->TotalResults != 0)
        {
            foreach ($results->SearchResult as $result) {
                
                $data['results'] = $result;
            }
            $data['totalResults'] = $results->TotalResults;
        }else{
            $data['results'] = '';
            $data['totalResults'] = $results->TotalResults;
        }
        // printme($data);exit();
        return $data;
    }


    function getPropertyByID($id)
    {
        $LineOfBusinessId = new SoapVar (array(), SOAP_ENC_OBJECT, "ArrayOflong", "http://schemas.microsoft.com/2003/10/Serialization/Arrays");
        $inputs = array(
            'searchMode' => 'Exact',
            'PropertyID' => $id,
            'LineOfBusinessId' => $LineOfBusinessId,
            'CompanyId' => ''
            );
        $results = $this->client->GetResultsByPropertyID($inputs);
        return $results->GetResultsByPropertyIDResult->PropertySingleSarchResult;
    }

    function getCities()
    {

         // $q = $this
         //      ->db
         //      ->get('city');

         //   if($q->num_rows >0){
         //      return $q->result_array();
         //   } 

         //   return false;  
        $inputs = array('CountryFK' => 73);
        $result = $this->client->GetCities($inputs);
        $data = array();
        foreach ($result->GetCitiesResult->City as $city) {
           $data[] = array('id' => $city->CityPk , 'name' => $city->CityName);
        }
         return $data;
    }

    function getPropertyImages($id, $serial)
    {
        $inputs = array(
            'PropertyId' => $id,
            'UnitId' => $serial,
            'ImageType' => 'Image',
            'URL' => 'http://64.150.184.135:81'
            );
        $results = $this->client->GetListOfImages($inputs);

        return $results->GetListOfImagesResult;
        // return $results->GetResultsByPropertyIDResult->PropertySingleSarchResult;
    }

    function importCitiesIntoDB()
    {

        $inputs = array('CountryFK' => 73);
        $result = $this->client->GetCities($inputs);
        $data = array();

        $this->db->empty_table('city'); 

        foreach ($result->GetCitiesResult->City as $city) {
           $data = array('id' => $city->CityPk , 'name' => $city->CityName);
            $query = $this->db->insert_string('city', $data);
            $query = $this->db->query($query);
        }
        
    }


    function getCitiesFromDB()
    {
        $q = $this
              ->db
              ->get('city');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 
    }



    function importDistrictsIntoDB()
    {   

        $cities = $this->getCitiesFromDB();
        $this->db->empty_table('district'); 
        foreach ($cities as $city) {
            $inputs = array('cityId' => $city->id);
            $result = $this->client->GetDistrictList($inputs);
            if(is_array($result->GetDistrictListResult->DistrictItem)){
                foreach ($result->GetDistrictListResult->DistrictItem as $district) {
                   $data = array('id' => $district->DistrictId , 'name' => $district->DistrictName,'city_id'=>$city->id);
                   $query = $this->db->insert_string('district', $data);
                   $query = $this->db->query($query);
                }
            }
    
        }

    }



    function getCityByID($cityID)
    {
        $inputs = array('CountryFK' => 73);
        $result = $this->client->GetCities($inputs);

        $data = array();
        foreach ($result->GetCitiesResult->City as $city) {
            if($cityID == $city->CityPk)
                return $city->CityName;
        }
         return false;
    }

    function getDistricts($cityID)
    {
        $inputs = array('cityId' => $cityID);
        $result = $this->client->GetDistrictList($inputs);
        $data = array();
        if(is_array($result->GetDistrictListResult->DistrictItem)){
            foreach ($result->GetDistrictListResult->DistrictItem as $district) {
               $data[] = array('id' => $district->DistrictId , 'name' => $district->DistrictName);
            }
            return $data;
        }
        else 
            return 0; 
         // $q = $this
         //      ->db
         //      ->where('city_id',$cityID)
         //      ->get('district');

         //   if($q->num_rows >0){
         //      return $q->result_array();
         //   } 

         //   return false; 
    }

    function getDistrictByID($cityID,$districtID)
    {
        $inputs = array('cityId' => $cityID);
        $result = $this->client->GetDistrictList($inputs);
        $data = array();
        if(is_array($result->GetDistrictListResult->DistrictItem)){
            foreach ($result->GetDistrictListResult->DistrictItem as $district) {
                if($districtID == $district->DistrictId )
                    return $district->DistrictName;
            }
        }
            return false;
    }
    
    function getAllDistricts()
    {
        $q = $this
              ->db
              ->get('district');

           if($q->num_rows >0){
              return $q->result_array();
           } 

           return false; 
    }

    function getNeighborhoods($districtID)
    {
        $result=array();
        $result = $this->client->GetNeighborhoodList($districtID);
        // printme($result);exit();
        return $result;
        
    }

    function getPropertyTypes($id)
    {
        $inputs = array('lineofB' => $id);
        $result = $this->client->Getpropertytypes($inputs);

        $data = array();
        foreach ($result->GetpropertytypesResult->PropertyType as $property) {
          if($property->PropertyTypeName != 'Other'){
            $data[$property->PropertyTypePK] = $property->PropertyTypeName;
          }
        }
        return $data;
    } 

    function getPropertyTypeByID($lob, $id)
    {
        $inputs = array('lineofB' => $lob);
        $result = $this->client->Getpropertytypes($inputs);
        foreach ($result->GetpropertytypesResult->PropertyType as $property) {
          if($property->PropertyTypePK == $id){
            return $property->PropertyTypeName;
          }
        }
    }


    function getServiceType()
    {
        $result = $this->client->GetServiceType();
        $data =array();
        foreach ($result->GetServiceTypeResult->Service as $types) {
           $data[] = array('id' => $types->ServicePK , 'name' => $types->ServiceName);
        }
        return $data;
    }

    function getServiceTypeByID($id)
    {
        $result = $this->client->GetServiceType();
        foreach ($result->GetServiceTypeResult->Service as $types) {
            if ($types->ServicePK == $id)
            {
                return $types->ServiceName;
            }
        }
    }


    function getProperty($id)
    {
        $inputs = array('PropertyId' => $id);
        $result = $this->client->GetPropertyinfo($inputs);
        return $result->GetPropertyinfoResult ;
    }

    function getFeaturedProperties()
    {
        $lineOfBusiness1 = array(0 => '1');       //Residential
        $lineOfBusiness2 = array(0 => '2');       //Commercial
        $inputs1 = array(
            'searchMode' => 'Exact',
            'Bedrooms' => '',
            'PropertyId' => '',
            'Purpose' => '',
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
            'BudgetFrom' => '',
            'BudgetTo' => '',
            'AreaFrom' => '',
            'AreaTo' => '',
            'AreaUnitId' => '',
            'LineOfBusinessId' => $lineOfBusiness1,
            'CompanyId' => '',
            'sortmode' => '',
            'sortType' => '',
            'pageIndex' => '',
            'licences' => '',
            'isFeatured' => true,
            'resultsCountPerPage' => '2', 
            'useFeaturedFilter' => true
            );

        $inputs2 = array(
            'searchMode' => 'Exact',
            'Bedrooms' => '',
            'PropertyId' => '',
            'Purpose' => '',
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
            'BudgetFrom' => '',
            'BudgetTo' => '',
            'AreaFrom' => '',
            'AreaTo' => '',
            'AreaUnitId' => '',
            'LineOfBusinessId' => $lineOfBusiness2,
            'CompanyId' => '',
            'sortmode' => '',
            'sortType' => '',
            'pageIndex' => '',
            'licences' => '',
            'isFeatured' => true,
            'resultsCountPerPage' => '1', 
            'useFeaturedFilter' => true
            );

        $results1 = $this->client->Search($inputs1);
        $results2 = $this->client->Search($inputs2);
        // printme($results2->SearchResult);exit();

        $count = 0;
        $results = array();
        foreach ($results1->SearchResult->PropertySingleSarchResult as $result) {
            $results[$count] = $result;
            $count++;
        }
        foreach ($results2->SearchResult as $result) {
            $results[$count] = $result;
            $count++;
        }
        return $results;
        // printme($results);exit();
    }

    function getCountryCodes()
    {
        // $result = $this->client->GetCountryCode();
        // if(is_array($result->GetCountryCodeResult->vw_CountryPhCode)){
        //     foreach ($result->GetCountryCodeResult->vw_CountryPhCode as $code) {
        //        $data[] = array('id' => $code->PhoneCode , 'name' => $code->CountryPhoneCode);
        //     }
        //     return $data;
        // }
        // else 
        //     return 0;
        // printme($data);exit();

         $q = $this
              ->db
              ->get('country_code');

           if($q->num_rows >0){
              return $q->result_array();
           } 

           return false;  

    }

    function insertCountryCodes()
    {
        // $codes = $this->getCountryCodes();
        // foreach ($codes as $code) {
        //     $data = array('country_code' => $code['id'] , 'country_name' => $code['name']);
        //     $query = $this->db->insert_string('country_code', $data);
        //     $query = $this->db->query($query);
        // }
    }

    function insertPropertyTypes()
    {
        // $propertyType1 = $this->getPropertyTypes(1);
        // $propertyType2 = $this->getPropertyTypes(2);

        // foreach ($propertyType1 as $key => $type) {
        //     $data = array('category_id' => 1 , 'property_id' => $key, 'property_name' => $type);
        //     $query = $this->db->insert_string('property_type', $data);
        //     $query = $this->db->query($query);
        // }
        // foreach ($propertyType2 as $key => $type) {
        //     $data = array('category_id' => 2 , 'property_id' => $key, 'property_name' => $type);
        //     $query = $this->db->insert_string('property_type', $data);
        //     $query = $this->db->query($query);
        // }
    }

    function insertImagesIntoDB()
    {
        $this->load->library('simple_html_dom');
        $this->load->model('database');
        $properties = $this->database->getAllProperties();
        $data = array();
        foreach ($properties as $key => $property) {
            // printme($property['PropertyId']);
            $data['images'][$property['PropertyId']] = $this->getPropertyImages($property['PropertyId'], $property['UnitId']);
            $html = str_get_html(($data['images'][$property['PropertyId']]));
            if($html && is_object($html)){
                $count = 0;
                $image = $html->find('img');
                 
                if(count($image) == 0){
                    $data['image'][$property['PropertyId']] = getcwd().'/application/static/images/No_image.svg';
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
                    
                    $img = getcwd().'/application/static/upload/property_images/image_'.$count.'_'.$property['PropertyId'].'.jpg';
                    file_put_contents($img, $test);
                    $data = array('property_id' => $property['PropertyId'] , 'image' => 'image_'.$count.'_'.$property['PropertyId'].'.jpg');
                    $query = $this->db->insert_string('unit_image', $data);
                    $query = $this->db->query($query);
                    // printme('done2'.$property['PropertyId']);
                    $count++;
                    // exit();
                }
                  
            }else{
                $data['image'][$property['PropertyId']] = getcwd().'/application/static/images/No_image.svg';
            }
        }
        // printme($data['image']);exit();
    }


    function file_get_contents_utf8($fn) {
     $content = file_get_contents($fn);
      return mb_convert_encoding($content, 'UTF-8',
          mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
    }

}


