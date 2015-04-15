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
              ->order_by('name', 'asc')
              ->get('district');

              // printme($q->result_array());exit();
           if($q->num_rows >0){
              return $q->result_array();
           } 

           return false; 
    }


     function getDistricts($cityID)
    {
          // $cityID = $this->security->xss_clean($cityID);
         $q = $this
              ->db
              ->order_by('name', 'asc')
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
              ->order_by('property_name', 'asc')
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

    function getDistrictByID($id)
    {
      $q = $this
              ->db
              ->where('id',$id)
              ->get('district');

           if($q->num_rows >0){
              return $q->result_array();
           } 

           return false; 
    }

    function getDistrictId($name)
    {
        $q = $this
          ->db
          ->where('name',$name)
          ->get('district');
          // printme($q->result_array()[0]);exit();
        if($q->num_rows >0){
            return $q->result_array()[0];
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
      // printme(count($inputs));exit();
        if (count($inputs) == 2)
        {
            $this->db->select('*');
            $this->db->from('property_featured');
            $this->db->order_by('propertyId','desc');
            $query = $this->db->get();
            $finalProperties = array();
            $count = 0;
            foreach ($query->result() as $key => $value) {
                $properties[$key] = $this->getPropertyByID($value->propertyId);
                foreach ($properties[$key] as $property) {
                    if ($property['LineofBusinessFK'] == $inputs['lob'])
                    {
                        $finalProperties[$count] = $property;
                        $finalProperties[$count] = (object) $property;
                        $count++;
                    }
                }
            }
            // printme($finalProperties);exit();
            if ($query->num_rows >0)
            {
                $results = array(
                  'results' => $finalProperties,
                  'totalResults' => count($finalProperties)
                  );
                // printme($results);exit();
                return $results;
            }else{
                return false; 
            }
            // printme($results);exit();
        }else{
            if (isset($inputs['generalFlag'])){

                if ($inputs['generalFlag'] == 1){
                    $this->db->select('*');
                    $this->db->from('property_service');
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
                }else{
                    if ($inputs['PropertyId'] == '')
                    {
                        $this->db->select('*');
                        $this->db->from('property_service');
                        $this->db->where('AreaNumericValue <', $inputs['AreaUpperLimit']);
                        $this->db->where('AreaNumericValue >', $inputs['AreaLowerLimit']);
                        if (isset($inputs['LocationProject']))
                        {
                            if($inputs['LocationProject'] != '' || $inputs['LocationProject'] != 0)
                            {
                                $this->db->where('LocationProject', $inputs['LocationProject']);
                            }
                        }
                        if ($inputs['lob'] != '' || $inputs['lob'] != 0){
                            $this->db->where('LineofBusinessFK', $inputs['lob']);
                        }
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
                        if(empty($inputs['PropertyFor']))
                        {
                          $this->db->where("(SalesTypeStr='Sale' OR SalesTypeStr='Sale/Rent' OR SalesTypeStr='Rent')");
                          $this->db->where('((SalePrice < '. $inputs['PriceUpperLimit']. ' AND SalePrice > '.  $inputs['PriceLowerLimit']. ') OR (RentPrice < '.$inputs['PriceUpperLimit'].' AND RentPrice > '.$inputs['PriceLowerLimit'].'))');
                        }else{
                            $this->db->where("(SalesTypeStr='".$inputs['PropertyFor']."' OR SalesTypeStr='Sale/Rent')");
                            if ($inputs['PropertyFor'] == 'Sale' || $inputs['PropertyFor'] == 'Sale/Rent'){
                                $this->db->where('SalePrice <', $inputs['PriceUpperLimit']);
                                $this->db->where('SalePrice >', $inputs['PriceLowerLimit']);
                            }elseif($inputs['PropertyFor'] == 'Rent'){
                                $this->db->where('RentPrice <', $inputs['PriceUpperLimit']);
                                $this->db->where('RentPrice >', $inputs['PriceLowerLimit']);
                            }
                        }
                        if ($inputs['locationType'] != '' || $inputs['locationType'] != 0){
                            $this->db->where('LocationType', $inputs['locationType']);
                        }
                        $this->db->order_by('PropertyId','desc');
                        $query = $this->db->get();
                        // printme($this->db->last_query());
                        // printme($query->result());
                        // exit();
                        if ($query->num_rows >0)
                        {
                            $results = array(
                              'results' => $query->result(),
                              'totalResults' => $query->num_rows
                            );
                            return $results;
                        }else{
                            return false; 
                        }
                    }else{
                        $this->db->select('*');
                        $this->db->from('property_service');
                        $this->db->where('PropertyId', $inputs['PropertyId']);
                        $query = $this->db->get();
                        // printme($this->db->last_query());
                        // printme($query->result());
                        // exit();
                        if ($query->num_rows >0)
                        {
                            $results = array(
                              'results' => $query->result(),
                              'totalResults' => $query->num_rows
                              );
                            return $results;
                        }else{
                            return false; 
                        }
                    }
                    
                }
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
        $images = array();
        if($q->num_rows >0){
              foreach ($q->result_array() as $key => $image) {
                  $images['src'][$key] = $image['image'];
              }
              $images['count'] = count($images['src']);
              // printme($images['src'][0]);exit();
              return $images;
           } 
        return false; 
    }

    function getFeaturedProperties()
    {
        $this->db->select('*');
        $this->db->order_by('propertyId', 'desc');
        $this->db->from('property_featured');
        $query = $this->db->get();
        $count1 = 0;
        $count2 = 0;
        $residentialLocationType = false;
        $commercialLocationType = false;

        if ($query->num_rows >0)
        {
            foreach ($query->result() as $key => $value) {
                $temp = $this->getPropertyByID($value->propertyId);
                // printme($temp);
                if ($count1 < 2 && $temp[0]['LineofBusinessFK'] == 1)
                {
                    if ($temp[0]['LocationType'] == 'project' && $residentialLocationType == false)
                    {
                        $properties[$value->propertyId] = (object) $temp[0];
                        $count1++;
                        $residentialLocationType = true;
                    }elseif ($temp[0]['LocationType'] == 'unit') {
                        $properties[$value->propertyId] = (object) $temp[0];
                        $count1++;
                    }
                }elseif ($count2 < 2 && ($temp[0]['LineofBusinessFK'] == 4 || $temp[0]['LineofBusinessFK'] == 2 )) {
                    if ($commercialLocationType == false)
                    {
                        $properties[$value->propertyId] = (object) $temp[0];
                        $count2++;
                        $commercialLocationType = true;
                    }elseif ($temp[0]['LocationType'] == 'unit') {
                        $properties[$value->propertyId] = (object) $temp[0];
                        $count2++;
                    }
                }
            }
            // exit();
            return $properties;
        }else{
            return false;
        }
    }

    function getAllNeighborhoods()
    {
        $this->db->select('*');
        $this->db->order_by('neighborhood', 'asc');
        $this->db->from('neighborhood');
        $query = $this->db->get();
        if ($query->num_rows >0)
        {
            return $query->result();
        }
        return false;
    }

    function getAllFeaturedProperties()
    {
        $this->db->select('*');
        $this->db->from('property_featured');
        $query = $this->db->get();
        if ($query->num_rows >0)
        {
            return $query->result();
        }
        return false;
    }

}


