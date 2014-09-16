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

    function getFeaturedProperties($inputs)
    {
        // $inputs = array('companyId' => $cityID,
        //                 'commercialId' => );
        $result = $this->client->GetFeaturedProperty($inputs);
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

   

}


