<?php


class service extends CI_Model {

    public $client ;
    function __construct()
    {
        parent::__construct();
        $this->client = new SoapClient("http://64.150.184.135:81/WebServ/searchservice.svc?wsdl");
        
    }

    function getCities()
    {
        $inputs = array('CountryFK' => 73);
        $result = $this->client->GetCities($inputs);
        $data = array();
        foreach ($result->GetCitiesResult->City as $city) {
           $data[] = array('id' => $city->CityPk , 'name' => $city->CityName);
        }
         return $data;
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
         
    }
    

    function getPropertyTypes($id)
    {
        $inputs = array('lineofB' => $id);
        $result = $this->client->Getpropertytypes($inputs);
        $data = array();
        foreach ($result->GetpropertytypesResult->PropertyType as $property) {
          if($property->PropertyTypeName != 'Other')
           $data[] = $property->PropertyTypeName;
        }
         $data[] = 'Other';
         return $data;
    } 


    function test()
    {
        $result = $this->client->GetServiceType();
        printme($result);exit();
    }


    function getProperty($id)
    {
        $inputs = array('PropertyId' => $id);
        $result = $this->client->GetPropertyinfo($inputs);
        return $result->GetPropertyinfoResult ;
    }

   

}


