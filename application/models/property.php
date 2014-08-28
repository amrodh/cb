<?php


class Property extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    

    function deleteProperty($id)
    {
      $q = $this
              ->db
              ->where('id',$id)
              ->delete('property');

          if($this->db->affected_rows() != 1){
            return false;
          }

          return true;
    }


     function updateProperty($id,$params)
     {
         $q = $this
              ->db
              ->where('id',$id)
              ->update('property',$params);

       if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
     }

    function getAllProperties()
    {

      $q = $this
              ->db
              ->order_by('date_joined','desc')
              ->get('property');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

    function getUserProperties($userID)
    {

      $q = $this
              ->db
              ->where('user_id',$userID)
              ->get('property');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }


    function getPropertyByID($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->get('property');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

     
     

   function insertProperty($params)
   {  

      $query = $this->db->insert_string('property', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;

   }

   function insertImage($params)
   {
        $query = $this->db->insert_string('property_image', $params);
        $query = $this->db->query($query);

          if($this->db->affected_rows() != 1){
              return false;
            }

            return true;
   }


   
function test()
{
  for ($i=0; $i < 100 ; $i++) { 
      $this->populateDB();
  }
}



   function populateDB()
   {
      $inputs = array();
      $types = array('Apartment','Furnished Apartment','Chalet','Building','Villas','Land','Shop / Showroom','Office / Company','Other Types');
      $district = array('Greater Cairo','Alexandria','North Coast','Marsa Matruh','Ain ElSokhna','Red Sea / Hurghada','Ras Sidr','Sharm el Sheikh','Dakahlia / Mansoura');
      $inputs['area'] = '2688 SqFt';
      $inputs['type'] = $types[array_rand($types,1)];
      $inputs['district'] = $district[array_rand($types,1)];
      $inputs['address'] = ' 114 Concord Drive , Greenville, NC 27858';
      $inputs['features'] = 'Quiet Neighborhood; New carpet and vinyl flooring; perfect for Investor with Rental $450-$485. Inexpensive Living';
      $inputs['price'] = rand(10000,1000000);
      $inputs['is_valid'] = rand(0,1);
      $inputs['user_id'] = rand(2,103);
      $inputs['city'] = "Egypt";
      $query = $this->db->insert_string('property', $inputs);
      $query = $this->db->query($query);
   }

  
  

  
  


    
}


