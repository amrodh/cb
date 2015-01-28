<?php
    
    libxml_disable_entity_loader(false);
    ini_set( "soap.wsdl_cache_enabled", "0" );
    $options = array( 
        'exceptions'=>0, 
        'trace'=>1,
        'cache_wsdl'=>WSDL_CACHE_NONE 
    ); 
    try {
        $client = new SoapClient("http://64.150.184.135:81/WebServ/searchservice.svc?wsdl",$options);
    } catch (Exception $e) {
    }
    $con = mysqli_connect("localhost","root","root","cb");
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      print_r('hello');
      cronJob($client, $con);

    function searchService($inputs , $client)
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
            'resultsCountPerPage' => '100', 
            'useFeaturedFilter' => $useFeaturedFilter
            );
        
        $results = $client->Search($inputs);
        
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
        return $data;
    }
    function getCitiesService($client)
    {
        $inputs = array('CountryFK' => 73);
        $result = $client->GetCities($inputs);
        $data = array();
        foreach ($result->GetCitiesResult->City as $city) {
           $data[] = array('id' => $city->CityPk , 'name' => $city->CityName);
        }
        return $data;
    }
    function getDistrictsService($cityID, $client)
    {
        $inputs = array('cityId' => $cityID);
        $result = $client->GetDistrictList($inputs);
        $data = array();
        if(is_array($result->GetDistrictListResult->DistrictItem)){
            foreach ($result->GetDistrictListResult->DistrictItem as $district) {
               $data[] = array('id' => $district->DistrictId , 'name' => $district->DistrictName);
            }
            return $data;
        }
        else 
            return 0; 
    }
    function searchDB($inputs, $con)
    {
        $AreaUpperLimit = $inputs['AreaUpperLimit'];
        $AreaLowerLimit = $inputs['AreaLowerLimit'];
        $sql = "SELECT * FROM property_service WHERE AreaNumericValue <= '$AreaUpperLimit' AND AreaNumericValue >= '$AreaLowerLimit'";
        if (isset($inputs['lob']) && $inputs['lob'] != ''){
            $lob = $inputs['lob'];
            $sql = $sql." AND LineofBusinessFK = '$lob'";
        }
        if (isset($inputs['PropertyType'])){
            $PropertyType = $inputs['PropertyType'];
            $sql = $sql." AND PrpertyTypeStr = '$PropertyType'";
        }
        if (isset($inputs['City'])){
            $City = $inputs['City'];
            $sql = $sql." AND LocationCity = '$City'";
        }
        if (isset($inputs['District'])){
            $District = $inputs['District'];
            $sql = $sql." AND LocationDistrict = '$District'";
        }
        if (isset($inputs['PropertyFor'])){
            $PropertyFor = $inputs['PropertyFor'];
            $PriceLowerLimit = $inputs['PriceLowerLimit'];
            $PriceUpperLimit = $inputs['PriceUpperLimit'];
            if ($inputs['PropertyFor'] == 'Sale/Rent')
            {
                $sql = $sql." AND (SalesTypeStr = 'Sale' OR SalesTypeStr = 'Rent' OR SalesTypeStr = 'Sale/Rent')";
                $sql = $sql." AND SalePrice < '$PriceUpperLimit'";
                $sql = $sql." AND SalePrice > '$PriceLowerLimit'";
                $sql = $sql." AND RentPrice < '$PriceUpperLimit'";
                $sql = $sql." AND RentPrice > '$PriceLowerLimit'";
            }else{
                $sql = $sql." AND SalesTypeStr = '$PropertyFor' OR SalesTypeStr = 'Sale/Rent'";
                if ($inputs['PropertyFor'] == 'Sale'){
                    $sql = $sql." AND SalePrice < '$PriceUpperLimit'";
                    $sql = $sql." AND SalePrice > '$PriceLowerLimit'";
                }elseif($inputs['PropertyFor'] == 'Rent'){
                    $sql = $sql." AND RentPrice < '$PriceUpperLimit'";
                    $sql = $sql." AND RentPrice > '$PriceLowerLimit'";
                }
            }
            
        }
        $sql = $sql." ORDER BY PropertyId";
        $result = $con->query($sql);
        if ($result->num_rows > 0)
        {
            $count = 0;
            $results =array();
            while($row = $result->fetch_assoc()) {
                $results[$count] = $row;
                $count++;
            }
            $results = array(
              'results' => $results,
              'totalResults' => $result->num_rows
            );
            return $results;
        }else{
            return false;
        }
    }
    function getCitiesDB($con)
    {
          $sql = "SELECT * FROM city";
          $result = $con->query($sql);
          if($result->num_rows >0){
              $count = 0;
               while($row = $result->fetch_assoc()) {
                  $data[$count] = array(
                    'id' => $row['id'],
                    'name' => $row['name']
                    );
                  $count++;
              }
              return (object) $data;
           } 
           return false;  
    }
    function getDistrictIdDB($name, $con)
    {
        $sql = "SELECT * FROM district WHERE name = '$name'";
        $result = $con->query($sql);
        if($result->num_rows >0){
              $count = 0;
               while($row = $result->fetch_assoc()) {
                  $data[$count] = array(
                    'id' => $row['id'],
                    'name' => $row['name']
                    );
                  $count++;
              }
              return $data[0];
           } 
           return false;  
    }
    function getAllPropertiesDB($con)
    {
        $sql = "SELECT * FROM property_service ORDER BY PropertyId ASC";
        $result = $con->query($sql);
        if($result->num_rows >0){
            $count = 0;
             while($row = $result->fetch_assoc()) {
                $data[$count] = array(
                  'id' => $row['id'],
                  'AreaNumericValue' => $row['AreaNumericValue'],
                  'AreaUnit' => $row['AreaUnit'],
                  'AreaunitStr' => $row['AreaunitStr'],
                  'BalconiesNumber' => $row['BalconiesNumber'],
                  'BathRoomsNumber' => $row['BathRoomsNumber'],
                  'BedRoomsNumber' => $row['BedRoomsNumber'],
                  'InteriorFinishing' => $row['InteriorFinishing'],
                  'LineofBusinessFK' => $row['LineofBusinessFK'],
                  'LocationCity' => $row['LocationCity'],
                  'LocationDistrict' => $row['LocationDistrict'],
                  'LocationProject' => $row['LocationProject'],
                  'PropertyTypeFK' => $row['PropertyTypeFK'],
                  'PrpertyTypeStr' => $row['PrpertyTypeStr'],
                  'RentCurrency' => $row['RentCurrency'],
                  'RentPrice' => $row['RentPrice'],
                  'RentPricePerAreaUnit' => $row['RentPricePerAreaUnit'],
                  'SaleCurrency' => $row['SaleCurrency'],
                  'SalePrice' => $row['SalePrice'],
                  'SalePricePerAreaUnit' => $row['SalePricePerAreaUnit'],
                  'SalesTypeStr' => $row['SalesTypeStr'],
                  'TotalArea' => $row['TotalArea'],
                  'UnitId' => $row['UnitId'],
                  'PropertyId' => $row['PropertyId']
                );
                $count++;
            }
            return (object) $data;
        } 
           return false; 
    }
    function getAllFeaturedPropertiesDB($con)
    {
        $sql = "SELECT * FROM property_featured";
        $result = $con->query($sql);
        if($result->num_rows >0){
            $count = 0;
            while($row = $result->fetch_assoc()) {
              $data[$count] = array(
                  'id' => $row['id'],
                  'propertyId' => $row['propertyId']
                );
              $count++;
            }
            return((object) $data);
        }
        return false;
    }
    function getCityByIdDB($id, $con)
    {
        $sql = "SELECT * FROM city WHERE id = '$id'";
        $result = $con->query($sql);
        if($result->num_rows >0){
            $count = 0;
             while($row = $result->fetch_assoc()) {
                $data[$count] = array(
                  'id' => $row['id'],
                  'name' => $row['name']
                  );
                $count++;
            }
            return (object) $data;
        }
        return false; 
    }
    function getDistrictByIdDB($id, $con)
    {
        $sql = "SELECT * FROM district WHERE id = '$id'";
        $result = $con->query($sql);
        if($result->num_rows >0){
            $count = 0;
             while($row = $result->fetch_assoc()) {
                $data[$count] = array(
                  'id' => $row['id'],
                  'name' => $row['name'],
                  'city_id' => $row['city_id']
                  );
                $count++;
            }
            return (object) $data;
        }
           return false; 
    }
    function getPropertyTypeIdDB($name, $con)
    {
        $sql = "SELECT * FROM property_type WHERE property_name = '$name'";
        $result = $con->query($sql);
        if($result->num_rows >0){
            $count = 0;
             while($row = $result->fetch_assoc()) {
                $data[$count] = array(
                  'id' => $row['id'],
                  'category_id' => $row['category_id'],
                  'property_id' => $row['property_id'], 
                  'property_name' => $row['property_name']
                );
                $count++;
            }
            return (object) $data[0];
        }
           return false; 
    }
    function getPropertyTypeByIdDB($id, $con)
    {
        $sql = "SELECT * FROM property_type WHERE property_id = '$id'";
        $result = $con->query($sql);
        if($result->num_rows >0){
            $count = 0;
             while($row = $result->fetch_assoc()) {
                $data[$count] = array(
                  'id' => $row['id'],
                  'category_id' => $row['category_id'],
                  'property_id' => $row['property_id'], 
                  'property_name' => $row['property_name']
                );
                $count++;
            }
            return $data[0]['property_name'];
        }
           return false; 
    }
    function cronJob($client, $con)
    {
        // $cities = getCitiesService($client);
        // foreach ($cities as $key => $city) 
        // {
        //    checkCity($city, $con);
        // }
      
    
        // $cities = getCitiesDB($con);
        // foreach ($cities as $key => $city) {
        //   $districts = getDistrictsService($city['id'], $client);
        //   if (is_array($districts))
        //   {
        //     foreach ($districts as $key => $district) {
        //         checkDistrict($district, $con);
        //       }
        //   }
        // }
        // $sql = "SELECT LocationDistrict, LocationProject FROM property_service GROUP BY LocationProject ORDER BY LocationDistrict ASC";
        // $result = $con->query($sql);
        // if($result->num_rows > 0){
        //     while($row = $result->fetch_assoc()) {
        //         if ($row['LocationProject'] != '')
        //         {
        //             $neighborhoods = checkNeighborhood($con);
        //             if (!in_array($row['LocationProject'], $neighborhoods))
        //             {
        //                 $districtID = getDistrictIdDB($row['LocationDistrict'], $con);
        //                 if ($districtID != false){
        //                     $district_id = $districtID['id'];
        //                     $neighborhood = $row['LocationProject'];
        //                     $sqlInsert = "INSERT INTO neighborhood (district_id, neighborhood) VALUES ('$district_id', '$neighborhood')";
        //                     $con->query($sqlInsert);
        //                 }
        //             }
        //         }
        //     }
        // }
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
            $results = searchService($inputs, $client);
            $serviceResults = array();
            foreach ($results['results'] as $key => $value) {
                $resultsArray[$key] = $value->PropertyId;
                $serviceResults[$key] = (array) $value;
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
            $results = searchService($inputs, $client);
            foreach ($results['results'] as $key => $value) {
                if ($value->PropertyId > $lastID)
                {
                  $resultsArray[$count] = $value->PropertyId;
                  $serviceResults[$count] = (array) $value;
                    $count++;
                }
            }
            // $files = glob('/Applications/MAMP/htdocs/ColdwellBanker/application/static/upload/property_images/*'); // get all file names
            $files = glob('/var/www/html/cb/application/static/upload/property_images/*'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file))
                  unlink($file); // delete file
            }
            $sqlDelete = "TRUNCATE TABLE unit_image";
            mysqli_query($con, $sqlDelete);
            $sqlDelete2 = "TRUNCATE TABLE property_featured";
            mysqli_query($con, $sqlDelete2);
            $sqlDelete3 = "TRUNCATE TABLE property_service";
            mysqli_query($con, $sqlDelete3);
            
            foreach ($resultsArray as $key => $value) {
                $AreaNumericValue = $serviceResults[$key]['AreaNumericValue'];
                $AreaUnit = $serviceResults[$key]['AreaUnit'];
                $AreaunitStr = $serviceResults[$key]['AreaunitStr'];
                $BalconiesNumber = $serviceResults[$key]['BalconiesNumber'];
                $BathRoomsNumber = $serviceResults[$key]['BathRoomsNumber'];
                $BedRoomsNumber = $serviceResults[$key]['BedRoomsNumber'];
                $InteriorFinishing = $serviceResults[$key]['InteriorFinishing'];
                $LineofBusinessFK = $serviceResults[$key]['LineofBusinessFK'];
                $LocationCity = $serviceResults[$key]['LocationCity'];
                $LocationDistrict = $serviceResults[$key]['LocationDistrict'];
                $LocationProject = $serviceResults[$key]['LocationProject'];
                $PropertyTypeFK = $serviceResults[$key]['PropertyTypeFK'];
                $PrpertyTypeStr = $serviceResults[$key]['PrpertyTypeStr'];
                $RentCurrency = $serviceResults[$key]['RentCurrency'];
                $RentPrice = $serviceResults[$key]['RentPrice'];
                $RentPricePerAreaUnit = $serviceResults[$key]['RentPricePerAreaUnit'];
                $SaleCurrency = $serviceResults[$key]['SaleCurrency'];
                $SalePrice = $serviceResults[$key]['SalePrice'];
                $SalePricePerAreaUnit = $serviceResults[$key]['SalePricePerAreaUnit'];
                $SalesTypeStr = $serviceResults[$key]['SalesTypeStr'];
                $TotalArea = $serviceResults[$key]['TotalArea'];
                $UnitId = $serviceResults[$key]['UnitId'];
                $PropertyId = $serviceResults[$key]['PropertyId'];
                    $sqlInsert = "INSERT INTO property_service (AreaNumericValue, AreaUnit, AreaunitStr, BalconiesNumber, BathRoomsNumber, BedRoomsNumber,
                      InteriorFinishing, LineofBusinessFK, LocationCity, LocationDistrict, LocationProject, PropertyTypeFK, PrpertyTypeStr, RentCurrency, 
                      RentPrice, RentPricePerAreaUnit, SaleCurrency, SalePrice, SalePricePerAreaUnit, SalesTypeStr, TotalArea, UnitId, PropertyId) 
                      VALUES ('$AreaNumericValue', '$AreaUnit', '$AreaunitStr', 
                      '$BalconiesNumber', '$BathRoomsNumber', '$BedRoomsNumber', '$InteriorFinishing', '$LineofBusinessFK', '$LocationCity',
                      '$LocationDistrict', '$LocationProject', '$PropertyTypeFK', '$PrpertyTypeStr', '$RentCurrency', '$RentPrice', 
                      '$RentPricePerAreaUnit', '$SaleCurrency', '$SalePrice', '$SalePricePerAreaUnit', '$SalesTypeStr', '$TotalArea', '$UnitId', '$PropertyId')";
                    
                    if (mysqli_query($con, $sqlInsert))
                    {
                      print_r('inserted: '. $PropertyId);
                    }else{
                      print_r('failed insert: '.$PropertyId);
                    }
                    insertPropertyImage($PropertyId, $UnitId, $client, $con);
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
                'resultsCountPerPage' => '10', 
                'useFeaturedFilter' => true
            );
            $lastID2 = 0;
            $count3 = 0;
            $featuredResults = array();
            $featuredResultsKey = array();
            $featuredProperties = searchService($inputs, $client);
            foreach ($featuredProperties['results'] as $key => $value) {
                $featuredResultsKey[$key] = $value->PropertyId;
                $featuredResults[$key] = $value;
                $count3 = $key + 1;
                $lastID2 = $value->PropertyId;
            }
            // $inputs = array(
            //     'searchMode' => 'Exact',
            //     'Bedrooms' => '',
            //     'PropertyId' => '',
            //     'Purpose' => 3,
            //     'PriceLowerLimit' => 0,
            //     'PriceUpperLimit' => 1000000000000000000,
            //     'PunitSale' => '',
            //     'RentPriceLowerLimit' => 0,
            //     'RentPriceUpperLimit' => 1000000000000000000,
            //     'PunitRent' => '',
            //     'AreaLowerLimit' => 0,
            //     'AreaUpperLimit' => 1000000000000000000,
            //     'PropertyType' => '',
            //     'PropertyFor' => '',
            //     'BoxLocation' => '',
            //     'LineOfBusinessId' => '',
            //     'CompanyId' => '',
            //     'sortmode' => '',
            //     'sortType' => 2,
            //     'pageIndex' => '',
            //     'licences' => '',
            //     'isFeatured' => true,
            //     'resultsCountPerPage' => '1300', 
            //     'useFeaturedFilter' => true
            // );
            // $featuredProperties = searchService($inputs, $client);
            // foreach ($featuredProperties['results'] as $key => $value) {
            //     $featuredResultsKey[$count3] = $value->PropertyId;
            //     $featuredResults[$count3] = $value;
            //     $count3++;
            // }
          
            foreach ($featuredResultsKey as $key => $result) {
                $ID = $featuredResults[$key]->PropertyId;
                $sql = "INSERT INTO property_featured (propertyId) VALUES ('$ID')";
                $result = $con->query($sql);
                if($result == true){
                    print_r($ID."<br>");
                }else{
                    echo $con->error."<br>";
                }
            }
            $sqlInsertCron = "INSERT INTO cron (name) values ('cron')";
            $result = $con->query($sqlInsertCron);
    }
    
    function checkmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
             return true;
        else
            return false;       
    }
    function smtpmailer($subject,$body,$to, $attachment) 
    { 
     date_default_timezone_set('America/Los_Angeles');
      require_once("phpmailer.php");
        $mail = new PHPMailer();
        $mail->IsSMTP();  // telling the class to use SMTP
        $mail->Host = "ssl://smtp.googlemail.com"; // Your SMTP PArameter
        $mail->Port = 465; // Your Outgoing Port
        $mail->SMTPAuth = true; // This Must Be True
        $mail->Username = 's.nahal@enlightworld.com';
        $mail->Password = '01069393641';
        $mail->From     = "s.nahal@enlightworld.com";
        $mail->AddAddress($to);
        $mail->IsHTML(true);
        $mail->Subject  = $subject;
        $mail->Body     = $body;
        if(!$mail->Send()) {
          echo 'Message was not sent.';
          echo 'Mailer error: ' . $mail->ErrorInfo;
        } else {
          echo 'Message has been sent.';
        }
    } 
    function checkCity($city, $con)
    {
      $id = $city['id'];
          $sql = "SELECT * FROM city WHERE id = '$id'";
          $result = $con->query($sql);
        if($result->num_rows  == 0){
            $cityId = $city['id'];
            $cityName = $city['name'];
            $sqlInsert = "INSERT INTO city (id, name) VALUES ('$cityId', '$cityName')";
            if ($con->query($sqlInsert) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
    function checkDistrict($district, $con)
    {
        $id = $district['id'];
          $sql = "SELECT * FROM district WHERE id = '$id'";
          $result = $con->query($sql);
        if($result->num_rows  == 0){
            $districtId = $district['id'];
            $districtName = $district['name'];
            $sqlInsert = "INSERT INTO city (id, name) VALUES ('$districtId', '$districtName')";
            if ($con->query($sqlInsert) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
    function checkNeighborhood($con)
    { 
        $sql = "SELECT * FROM neighborhood";
        $result = $con->query($sql);
        if($result->num_rows >0){
            $count = 0;
             while($row = $result->fetch_assoc()) {
                $data[$count] =$row['neighborhood'];
                $count++;
            }
            return $data;
         } 
        return false;
    }
    function deleteProperty($propertyID, $con)
    {
        $sql = "DELETE FROM property_service WHERE PropertyId = $propertyID";
        $result = $con->query($sql);
        $sql2 = "DELETE FROM unit_image WHERE property_id = $propertyID";
        $result2 = $con->query($sql2);
        if ($result == true && $result2 == true)
        {
            return true;
        }else{
          return false;
        }
    }
    function insertPropertyImage($propertyID, $unitID, $client, $con)
    {
      require_once('simple_html_dom.php');
      $data['images'][$propertyID] = getPropertyImages($propertyID, $unitID, $client);
      $html = str_get_html(($data['images'][$propertyID]));
        if($html && is_object($html)){
            $count = 0;
            $image = $html->find('img');
             
            if(count($image) == 0){
                $data['image'][$propertyID] = '/var/www/html/cb/application/static/images/No_image.svg';
                // $data['image'][$propertyID] = '/Applications/MAMP/htdocs/ColdwellBanker/application/static/images/No_image.svg';
                $sql = "INSERT INTO unit_image (property_id, image) VALUES ('$propertyID', 'No_image.svg')";
                $result = $con->query($sql);
            }
            foreach($image as $element) 
            {   
                $url = $element->attr['src'];
                $test = file_get_contents(trim($url));
                // $img = '/Applications/MAMP/htdocs/ColdwellBanker/application/static/upload/property_images/image_'.$count.'_'.$propertyID.'.jpg';
                $img = '/var/www/html/cb/application/static/upload/property_images/image_'.$count.'_'.$propertyID.'.jpg';
                file_put_contents($img, $test);
                $img_name = 'image_'.$count.'_'.$propertyID.'.jpg';
                $sql = "INSERT INTO unit_image (property_id, image) VALUES ('$propertyID', '$img_name')";
                $result = $con->query($sql);
                $count++;
            }
              
        }else{
            $data['image'][$propertyID] = '/var/www/html/cb/application/static/images/No_image.svg';
            // $data['image'][$propertyID] = '/Applications/MAMP/htdocs/ColdwellBanker/application/static/images/No_image.svg';
        }
    }
    function getPropertyImages($id, $serial, $client)
    {
        $inputs = array(
            'PropertyId' => $id,
            'UnitId' => $serial,
            'ImageType' => 'Image',
            'URL' => 'http://64.150.184.135:81'
            );
        $results = $client->GetListOfImages($inputs);
        return $results->GetListOfImagesResult;
    }
    function getUserByID($ID, $con)
    {
          $sql = "SELECT * FROM user WHERE id = '$ID'";
          $result = $con->query($sql);
          if($result->num_rows >0){
            return $result;
          }
          return false;
    }
    function getPropertyImagesDB($id, $con)
    {
        $sql = "SELECT * FROM unit_image WHERE property_id = '$id'";
        $result = $con->query($sql);
        $images = array();
        if($result->num_rows > 0){
            $count = 0;
                while ($row = $result->fetch_assoc()) {
                    $images['src'][$count] = $row['image'];
                    
                    $count++;
                }
                $images['count'] = count($images['src']);
            return $images;
        } 
        return false; 
    }
    function getEmailContents(array $vars) {
      extract($vars);
      ob_start();
      include 'propertyAlert_template.php';
      return ob_get_clean();
    }
?>