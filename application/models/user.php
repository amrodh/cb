<?php


class User extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    

    function logIn($username,$password)
    { 
      $user = $this->getUserByUsername($username);
      $password = passwordEncryption($password,$user->password_salt);

      if($password == $user->password){
        return true;
      }else{
        return false;
      }
      
    }



    function getUsersLimit($limit=null)
    {   
        if(!$limit)
          $limit = 100;
        $q = $this
              ->db
              ->select('username,email,date_joined,is_active,is_valid,first_name,last_name,gender')
              ->limit($limit)
              ->order_by('date_joined','desc')
              ->get('user');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 
    }

    function deleteUser($username)
    {
      $q = $this
              ->db
              ->where('username',$username)
              ->delete('user');

          if($this->db->affected_rows() != 1){
            return false;
          }

          return true;
    }


     function updateUser($id,$params)
     {
         $q = $this
              ->db
              ->where('id',$id)
              ->update('user',$params);

       if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
     }

    function getAllUsers($argument=null)
    {

      if(!$argument)
       $default = 'id,username,email,date_joined,is_active,is_valid,first_name,last_name,gender';
      else
        $default = $argument;
      $q = $this
              ->db
              ->select($default)
              ->order_by('date_joined','desc')
              ->get('user');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

    function getUserByUsername($username)
     {
          $q = $this
              ->db
              ->where('username',$username)
              ->limit(1)
              ->get('user');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false;  
     }

     function getUserByEmail($email)
     {
          $q = $this
              ->db
              ->where('email',$email)
              ->limit(1)
              ->get('user');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false;  
     }


      function getUserByID($ID)
     {
          $q = $this
              ->db
              ->where('id',$ID)
              ->limit(1)
              ->get('user');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false;  
     }

   function insertUser($params)
   {  
      $salt = saltGenerator();
      $params['password_salt'] = $salt;
      $params['password'] = passwordEncryption($params['password'],$salt);

      $query = $this->db->insert_string('user', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;

   }


   function changePassword($userID,$current,$new)
   {
      $user = $this->getUserByID($userID);
      $currentPassword = passwordEncryption($current,$user->password_salt);
      if($currentPassword == $user->password){
        $params = array(
               'password' => passwordEncryption($new,$user->password_salt),
            );
        $update = $this->updateUser($userID,$params);
        if($update)
          echo 'true';
        else
          echo 'false';
      }else{
        echo 'false';
      }
      exit();
   }

  
  

  
  


    
}


