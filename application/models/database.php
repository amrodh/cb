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

    function insertCountryCodes()
    {
        // $codes = $this->getCountryCodes();
        // foreach ($codes as $code) {
        //     $data = array('country_code' => $code['id'] , 'country_name' => $code['name']);
        //     $query = $this->db->insert_string('country_code', $data);
        //     $query = $this->db->query($query);
        // }
    }

}


