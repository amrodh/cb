<?php


class Course extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    

    

     
    function getCourses()
    {

      $q = $this
              ->db
              ->get('course');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }


  


    function getCourseByID($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('course');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 

    }


   function insertCourse($params)
   {  

      $query = $this->db->insert_string('course', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;

   }


   

  

   
   




  
  

  
  


    
}


