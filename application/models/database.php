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
        // printme($inputs);
        // printme(count($inputs));
        // exit();

        if (count($inputs) == 1)
        {
            // printme('hello');
            $this->db->select('*');
            $this->db->from('property_featured');
            $this->db->order_by('propertyId','desc');
            $query = $this->db->get();
            $properties = array();
            foreach ($query->result() as $key => $value) {
              // printme($value);

                $properties[$key] = $this->getPropertyByID($value->propertyId);
                foreach ($properties[$key] as $property) {
                    $properties[$key] = $property;
                    $properties[$key] = (object) $property;
                }
            }
            if ($query->num_rows >0)
            {
                $results = array(
                  'results' => $properties,
                  'totalResults' => $query->num_rows
                  );
                return $results;
            }else{
                return false; 
            }
            // printme($results);exit();
        }else{
            $this->db->select('*');
            $this->db->from('property_service');
            $this->db->where('AreaNumericValue <', $inputs['AreaUpperLimit']);
            $this->db->where('AreaNumericValue >', $inputs['AreaLowerLimit']);
            $this->db->where('SalePrice <', $inputs['PriceUpperLimit']);
            $this->db->where('SalePrice >', $inputs['PriceLowerLimit']);
            $this->db->where('RentPrice <', $inputs['PriceUpperLimit']);
            $this->db->where('RentPrice >', $inputs['PriceLowerLimit']);
            $this->db->where('LineofBusinessFK', $inputs['lob']);
            if ($inputs['PropertyType'] != '' || $inputs['PropertyType'] != 0){
                $this->db->where('PrpertyTypeStr', $inputs['PropertyType']);
            }
            if ($inputs['City'] != '' || $inputs['City'] != 0)
            {
                $this->db->where('LocationCity', $inputs['City']);
            }
            if ($inputs['District'] != '' || $inputs['District'] != 0)
            {
                $this->db->where('LocationDistrict', $inputs['District']);
            }
            if ($inputs['PropertyFor'] != '' || $inputs['PropertyFor'] != 0)
            {
                $this->db->where("(SalesTypeStr='".$inputs['PropertyFor']."' OR SalesTypeStr='Sale/Rent')");
            }else{
                $this->db->where("(SalesTypeStr='Sale' OR SalesTypeStr='Sale/Rent' OR SalesTypeStr='Rent')");
            }
            $this->db->order_by('PropertyId','desc');
            $query = $this->db->get();
            // printme($this->db->last_query());
            // printme($query->result());exit();
            if ($query->num_rows >0)
            {
                $results = array(
                  'results' => $query->result(),
                  'totalResults' => $query->num_rows
                  );
                // printme($results);exit();
                return $results;
            }else{
                return false; 
            }
        }
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

    function getPropertyByID($id)
    {
        $q = $this
              ->db
              ->where('PropertyId', $id)
              ->limit(1)
              ->get('property_service');


        if($q->num_rows >0){
          // printme();exit();
              return $q->result_array();
           } 
           return false; 
    }

    function getAllProperties()
    {
        $q = $this
              ->db
              ->order_by('PropertyId', 'asc')
              ->get('property_service');


        if($q->num_rows >0){
          // printme($q->result_array());exit();
              return $q->result_array();
           } 
           return false; 
    }

    function getPropertyImages($id)
    {
        $q = $this
              ->db
              ->where('property_id', $id)
              ->get('unit_image');


        if($q->num_rows >0){
          printme($q->result_array());exit();
              return $q->result_array();
           } 
           return false; 
    }

}


