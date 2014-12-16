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


     function deleteAuction($id)
    {
      $q = $this
              ->db
              ->where('id',$id)
              ->delete('auction');

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

      function updateAuction($id,$params)
     {
         $q = $this
              ->db
              ->where('id',$id)
              ->update('auction',$params);

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


    function getPropertyImages($id)
    {
      $q = $this
              ->db
              ->where('property_id',$id)
              ->get('property_image');

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
              ->limit(1)
              ->get('property');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 

    }

     function getPropertiesAlert()
    {

      $q = $this
              ->db
              ->get('user_property_alert');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

    function checkNewProperty($where,$data)
    {
      // Call the service and check for new properties
    }


  

     function getAuctions()
    {

      $q = $this
              ->db
              ->get('auction');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

     function getAuctionById($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('auction');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 

    }


     function getAuctionByIdArray($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('auction');

           if($q->num_rows >0){
              return $q->row_array();
           } 

           return false; 

    }

    function getRecentAuctions()
    {
      date_default_timezone_set('Europe/London');
      $date = new DateTime('now');
      $date =  $date->format('2014-m-d');

      $q = $this
              ->db
               ->where('date_held <', $date)
              ->order_by('date_held','desc')
              ->get('auction');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

     function getUpcomingAuctions()
    {
      date_default_timezone_set('Europe/London');
      $date = new DateTime('now');
      $date =  $date->format('2014-m-d');

      $q = $this
              ->db
              ->where('date_held >', $date)
              ->order_by('date_held','asc')
              ->get('auction');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

     
   function insertPropertyAlert($params)
   {  

      $query = $this->db->insert_string('user_property_alert', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;

   }


   function testauctions()
   {

    // date_default_timezone_set('Europe/London');
    //   for ($i=1; $i < 11; $i++) { 
    //         $params['title'] = 'Tips for Marketing Your Home to Potential Buyers';
    //         $params['text'] = 'Lorem ipsum dolor sit amet, ex sed partem prompta, ne usu altera maluisset consetetur. Ex vel corpora mnesarchum, te fastidii epicurei qui, ad vidit omnis convenire vel. Qui suas error choro id, nonumy lucilius iudicabit eum et. An per quis vituperatoribus. Utroque veritus mea cu, cum quod mazim ei.';
    //         $params['image'] = 'test.png';

    //         $date = new DateTime(now());
    //         $date->modify('+'.$i.' day');
    //         $params['date_held'] =  $date->format('2014-m-d');
    //         $this->insertAuction($params);
    //         // printme($params);
            
    //   }
   }

   function insertAuction($params)
   {
      $query = $this->db->insert_string('auction', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
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

  
  

  // function propertyAlertCron()
  // {
  //     $this->load->library('simple_html_dom');
  //     $dataArray = array();
  //     // include(base_url().'application/libraries/simple_html_dom.php');
  //     // $this->load->model('service');
  //     $q = $this
  //           ->db
  //           ->get('user_property_alert');

  //     $results = $q->result();
  //     foreach ($results as $result) {
  //         $identifier = $result->user_identifier;
  //         if(!$this->checkmail($identifier)){
  //             $tmp = $this->user->getUserByID($identifier);
  //             $result->user_identifier = $tmp->email;
  //         }
          
  //         if (array_key_exists($result->property_data, $dataArray))
  //         {
  //             $dataArray[$result->property_data] = $dataArray[$result->property_data].','.$result->user_identifier;
  //         }else{
  //             $dataArray[$result->property_data] = $result->user_identifier;
  //         }
  //     }

  //     foreach ($dataArray as $key1 => $data1) {
  //         // printme($emails);
  //         $propertyData = explode(',', $key1);
  //         $property_data = array();
  //         $data = array();
  //         $count = 0;
  //         // printme($propertyData);exit();
  //         foreach ($propertyData as $key => $data2) {
  //             $tmp = explode('=', $data2);
  //             if ($tmp[0] == 'city'){
  //                 $city = explode("'", $tmp[1]);
  //                 $city = $this->database->getCityByID($city[1]);
  //                 $property_data[$count]['city'] = $city[0]['name'];
  //             }elseif ($tmp[0] == 'district'){
  //                 $district = explode("'", $tmp[1]);
  //                 $district = $this->database->getDistrictByID($district[1]);
  //                 $property_data[$count]['district'] = $district[0]['name'];
  //             }elseif ($tmp[0] == 'type') {
  //                 $type = explode("'", $tmp[1]);
  //                 $type = $type[1];
  //                 $type = $this->database->getPropertyTypeID($type);
  //                 $property_data[$count]['type'] = $type[0]['property_id'];
  //             }elseif ($tmp[0] == 'price'){
  //                 $price = explode("'", $tmp[1]);
  //                 $price = $price[1];
  //                 $price = explode(" - ", $price);
  //                 $property_data[$count]['priceLowerLimit'] = $price[0];
  //                 $property_data[$count]['priceUpperLimit'] = $price[1];
  //             }elseif ($tmp[0] == 'area') {
  //                 $area = explode("'", $tmp[1]);
  //                 $area = $area[1];
  //                 $area = explode(" - ", $area);
  //                 $property_data[$count]['areaLowerLimit'] = $area[0];
  //                 $property_data[$count]['areaUpperLimit'] = $area[1];
  //             }elseif ($tmp[0] == 'contractType') {
  //                 $contractType = explode("'", $tmp[1]);
  //                 $property_data[$count]['contractType'] = $contractType[1];
  //             }
  //         }

  //         if(!isset($property_data[$count]['city']))
  //         {
  //             $property_data[$count]['city'] = '';
  //         }
  //         if(!isset($property_data[$count]['district']))
  //         {
  //             $property_data[$count]['district'] = '';
  //         }
  //         if (!isset($property_data[$count]['type'])){
  //             $property_data[$count]['type'] = '';
  //         }else{
  //             $property_data[$count]['type'] = $this->database->getPropertyTypeByID($property_data[$count]['type']);
  //         }
  //         if(!isset($property_data[$count]['priceLowerLimit']))
  //         {
  //             $property_data[$count]['priceLowerLimit'] = 0;
  //         }
  //         if(!isset($property_data[$count]['priceUpperLimit']))
  //         {
  //             $property_data[$count]['priceUpperLimit'] = 100000000000000;
  //         }
  //         if(!isset($property_data[$count]['areaLowerLimit']))
  //         {
  //             $property_data[$count]['areaLowerLimit'] = 0;
  //         }
  //         if(!isset($property_data[$count]['areaUpperLimit']))
  //         {
  //             $property_data[$count]['areaUpperLimit'] = 100000000000000;
  //         }
  //         if(!isset($property_data[$count]['contractType']))
  //         {
  //             $property_data[$count]['contractType'] = 'Sale/Rent';
  //         }
  //         // printme($property_data);exit();
  //         // $searchParams = array(
  //         //     'lob' => $lob,
  //         //     'PropertyType' => $type,
  //         //     'City' => $city,
  //         //     'District' => $district,
  //         //     'PropertyFor' => $propertyFor,
  //         //     'PriceLowerLimit' => $priceLowerLimit,
  //         //     'PriceUpperLimit' => $priceUpperLimit,
  //         //     'AreaLowerLimit' => $areaLowerLimit,
  //         //     'AreaUpperLimit' => $areaUpperLimit
  //         //   );

  //         $searchParams = array(
  //           'lob' => '',
  //           'PropertyType' => $property_data[$count]['type'],
  //           'City' => $property_data[$count]['city'],
  //           'District' => $property_data[$count]['district'],
  //           'PropertyFor' => $property_data[$count]['contractType'],
  //           'PriceLowerLimit' => $property_data[$count]['priceLowerLimit'],
  //           'PriceUpperLimit' => $property_data[$count]['priceUpperLimit'],
  //           'AreaLowerLimit' => $property_data[$count]['areaLowerLimit'],
  //           'AreaUpperLimit' => $property_data[$count]['areaUpperLimit']
  //         );
  //         $count++;
  //         $searchResults = $this->database->search($searchParams);
  //         // printme($searchResults);exit();
  //         if ($searchResults['totalResults'] != 0){
  //             $data = array('title'=>'Coldwell Banker Daily Property Alert', 
  //                      'properties' => $searchResults['results']);
  //             foreach ($data['properties'] as $key => $property) {
  //                 $data['images'][$property->PropertyId] = $this->database->getPropertyImages($property->PropertyId);
  //                 if (!is_array($data['images'][$property->PropertyId]))
  //                 {
  //                     $data['images'][$property->PropertyId] = array ( 0 => getcwd().'/application/static/images/No_image.svg');
  //                     // $data['images'][$property->PropertyId] = "not array";
  //                 }else{
  //                   $data['images'][$property->PropertyId] = $data['images'][$property->PropertyId]['src'];
  //                 }
  //                 // printme
  //                 // $html = str_get_html(($data['images'][$property->PropertyId]));
  //                 // if($html && is_object($html)){
  //                 //     $count = 0;
  //                 //     $image = $html->find('img');
                     
  //                 //     if(count($image) == 0){
  //                 //       $data['image'][$property->PropertyId] = getcwd().'/application/static/images/No_image.svg';
  //                 //       continue;
  //                 //     }
  //                 //     foreach($image as $element) 
  //                 //     {   
  //                 //         if ($count == 0){
  //                 //             $data['image'][$property->PropertyId] = $element->src;
  //                 //         }
  //                 //         else{
  //                 //             break;
  //                 //         }
  //                 //         $count++;
  //                 //     }
                      
  //                 // }else{
  //                 //     $data['image'][$property->PropertyId] = getcwd().'/application/static/images/No_image.svg';
  //                 // }
  //             }
  //             // printme($data['images']);exit();
  //               $body = $this->load->view('admin/propertyAlert_template', $data, true);
  //               $emails = explode(',', $data1);
  //               foreach ($emails as $email) {
  //                   $this->smtpmailer('New Properties',$body,$email, '');
  //               }
  //         }
  //     }
          

  // }
  

  public function sendProperties($params,$list)
  {
      $this->load->model('service');
      $data['params'] = $params;
      foreach ($params['properties'] as $key => $property) {
        $data['properties'][$key]=$this->service->getPropertyByID($property);
        $data['images'][$property] = $this->service->getPropertyImages($property, $data['properties'][$key]->UnitId);
      }
      $body = $this->load->view('admin/properties_template', $data, true);
      $this->smtpmailer('New Properties',$body,'s.nahal@enlightworld.com');
  }

  function checkmail($email)
    {
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
           return true;
       else
        return false;
        
    }

    function smtpmailer($subject,$body,$to, $attachment) { 

     date_default_timezone_set('America/Los_Angeles');
     $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 's.nahal@enlightworld.com', // change it to yours
      'smtp_pass' => '01069393641', // change it to yours
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
      );

      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('test@ColdWell.com'); // change it to yours
      $this->email->to($to); // change it to yours
      $this->email->subject($subject);
      $this->email->message($body);
      // printme($attachment);exit();
      if ($attachment != '')
      {
          if (is_array($attachment)){
            foreach ($attachment as $value) {
              // printme($value);
              $this->email->attach($value);
            }
          }else{
            $this->email->attach($attachment);
          }
          
      }
      

      if($this->email->send())
      {
        // echo $this->email->print_debugger();die;
      return true;
    }
     else
      {
       show_error($this->email->print_debugger());
      }
}
    
}


