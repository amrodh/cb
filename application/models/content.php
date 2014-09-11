<?php


class Content extends CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }

   

    function getSliderContent()
    {

      $q = $this
              ->db
              ->get('home_slider');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

     function getActiveSliders()
    {

      $q = $this
              ->db
              ->where('is_active','1')
              ->get('home_slider');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }


    function insertSlide($params)
    {
      $query = $this->db->insert_string('home_slider', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
    }



  
   

}


