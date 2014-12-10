<?php


class database extends CI_Model {

    function __construct()
    {   
        parent::__construct();
    }


    function getCountryCodes()
    {
         $q = $this
              ->db
              ->get('country_code');

           if($q->num_rows >0){
              return $q->result_array();
           } 

           return false;  

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


     function getDistricts($cityID)
    {
         $q = $this
              ->db
              ->where('city_id',$cityID)
              ->get('district');

           if($q->num_rows >0){
              return $q->result_array();
           } 

           return false; 
    }

    function getPropertyTypes($id)
    {

        $q = $this
              ->db
              ->where('category_id',$id)
              ->get('property_type');

           if($q->num_rows >0){
              return $q->result_array();
           } 

           return false; 
    } 

    function getAllPropertyTypes()
    {

        $q = $this
              ->db
              ->order_by('property_name','asc')
              ->get('property_type');

           if($q->num_rows >0){
              return $q->result_array();
           } 

           return false; 
    } 

    function getCityByID($id)
    {
        $q = $this
              ->db
              ->where('id',$id)
              ->get('city');

           if($q->num_rows >0){
              return $q->result_array();
           } 

           return false; 
    }

    function getDistrictByID($id){
      $q = $this
              ->db
              ->where('id',$id)
              ->get('district');

           if($q->num_rows >0){
              return $q->result_array();
           } 

           return false; 
    }

    function getPropertyTypeID($name)
    {
        $q = $this
              ->db
              ->where('property_name',$name)
              ->get('property_type');

           if($q->num_rows >0){
              return $q->result_array();
           } 

           return false; 
    }

    function search($inputs)
    {
        $q = $this
              ->db
              ->where('AreaNumericValue <', $inputs('areaUpperLimit'))
              ->where('AreaNumericValue >', $inputs('areaLowerLimit'))
              ->where('PrpertyTypeStr', $inputs('PropertyType'))
              ->where('LocationCity', $inputs('city'))
              ->where('LocationDistrict', $inputs('district'))
              ->where('SalesTypeStr', $inputs('PropertyFor'))
              ->where('SalePrice <', $inputs('PriceUpperLimit'))
              ->where('SalePrice >', $inputs('PriceLowerLimit'))
              ->where('RentPrice <', $inputs('PriceUpperLimit'))
              ->where('RentPrice >', $inputs('PriceLowerLimit'))
              ->order_by('PropertyId','desc')
              ->get('property_service');

           if($q->num_rows >0){
            printme($q->result_array());exit();
              return $q->result_array();
           } 
           return false; 
    }

    function getPropertyTypeByID($id)
    {
        $q = $this
              ->db
              ->where('property_id', $id)
              ->limit(1)
              ->get('property_type');


        if($q->num_rows >0){
          // printme();exit();
              return $q->result_array()[0]['property_name'];
           } 
           return false; 
    }

}


