<?php


class service extends CI_Model {

    public $client ;
    function __construct()
    {
        parent::__construct();
        $this->client = new SoapClient("http://64.150.184.135:81/WebServ/searchservice.svc?wsdl");
        
    }

    function search($inputs)
    {
        // printme($inputs);exit();
        $LineOfBusinessId = new SoapVar (array(), SOAP_ENC_OBJECT, "ArrayOflong", "http://schemas.microsoft.com/2003/10/Serialization/Arrays");
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
            'PropertyFor' => $inputs['PropertyFor'],
            'BoxLocation' => $inputs['BoxLocation'],
            'BudgetFrom' => '',
            'BudgetTo' => '',
            'AreaFrom' => '',
            'AreaTo' => '',
            'AreaUnitId' => '',
            'LineOfBusinessId' => $LineOfBusinessId,
            'CompanyId' => '',
            'sortmode' => '',
            'sortType' => '',
            'pageIndex' => '',
            'licences' => '',
            'isFeatured' => false,
            'resultsCountPerPage' => '20'
            );
        $results = $this->client->Search($inputs);

        $data = array();
        if ($results->TotalResults != 0)
        {
            foreach ($results->SearchResult as $result) {
                // printme($result);exit();
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
        // printme($results);exit();
        return $results->GetResultsByPropertyIDResult->PropertySingleSarchResult;
    }

    // function getPropertyImages($id, $unitId)
    // {
    //     $inputs = array(
    //         'PropertyId' => $id,
    //         'UnitId' => $unitId,
    //         'ImageType' => '',
    //         'URL' => ''
    //         );
    //     $results = $this->client->GetListOfImages($inputs);
    //     printme($results);exit();
    //     return $results->GetResultsByPropertyIDResult->PropertySingleSarchResult;
    // }

    function getCities()
    {

         $q = $this
              ->db
              ->get('city');

           if($q->num_rows >0){
              return $q->result_array();
           } 

           return false;  
        // $inputs = array('CountryFK' => 73);
        // $result = $this->client->GetCities($inputs);
        // $data = array();
        // foreach ($result->GetCitiesResult->City as $city) {
        //    $data[] = array('id' => $city->CityPk , 'name' => $city->CityName);
        // }
        //  return $data;
    }

    function getPropertyImages($id, $serial)
    {
        $inputs = array(
            'PropertyId' => $id,
            'UnitId' => $serial,
            'ImageType' => 'Image',
            'URL' => 'http://64.150.184.135:81/'
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
        // $inputs = array('cityId' => $cityID);
        // $result = $this->client->GetDistrictList($inputs);
        // $data = array();
        // if(is_array($result->GetDistrictListResult->DistrictItem)){
        //     foreach ($result->GetDistrictListResult->DistrictItem as $district) {
        //        $data[] = array('id' => $district->DistrictId , 'name' => $district->DistrictName);
        //     }
        //     return $data;
        // }
        // else 
        //     return 0; 
         $q = $this
              ->db
              ->where('city_id',$cityID)
              ->get('district');

           if($q->num_rows >0){
              return $q->result_array();
           } 

           return false; 
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

    function getFeaturedProperties($inputs)
    {
        $inputs = array('companyId' => '',
                        'commercialId' => '',
                        'residentialId' => '');
        $result = $this->client->GetFeaturedProperty($inputs);
        printme($result);exit();
        $data = array();
        // if(is_array($result->GetFeaturedPropertyResult->DistrictItem)){
        //     foreach ($result->GetFeaturedPropertyResult->DistrictItem as $district) {
        //        $data[] = array('id' => $district->DistrictId , 'name' => $district->DistrictName);
        //     }
        //     return $data;
        // }
        // else 
        //     return 0; 
    }

    function getCountryCodes()
    {
        $result = $this->client->GetCountryCode();
        if(is_array($result->GetCountryCodeResult->vw_CountryPhCode)){
            foreach ($result->GetCountryCodeResult->vw_CountryPhCode as $code) {
               $data[] = array('id' => $code->PhoneCode , 'name' => $code->CountryPhoneCode);
            }
            return $data;
        }
        else 
            return 0;
        // printme($data);exit();
    }

}


