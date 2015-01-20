<?php

$con = mysqli_connect("localhost","root","root","cb");

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

propertyAlertCron($con);

function getUserByID($ID, $con)
{
    $sql = "SELECT * FROM user WHERE id = '$ID'";
    $result = $con->query($sql);
    if($result->num_rows >0){
        return $result;
    }
    return false;
}

function getCityByIdDB($id, $con)
{
    $sql = "SELECT * FROM city WHERE id = '$id'";
    $result = $con->query($sql);

    if($result->num_rows >0){
        $count = 0;
         while($row = $result->fetch_assoc()) {
            $data[$count] = array(
              'id' => $row['id'],
              'name' => $row['name']
              );
            $count++;
        }
        return (object) $data;
    }
    return false; 
}

function getDistrictByIdDB($id, $con)
{

    $sql = "SELECT * FROM district WHERE id = '$id'";
    $result = $con->query($sql);
    if($result->num_rows >0){
        $count = 0;
         while($row = $result->fetch_assoc()) {

            $data[$count] = array(
              'id' => $row['id'],
              'name' => $row['name'],
              'city_id' => $row['city_id']
              );
            $count++;
        }
        return (object) $data;
    }

       return false; 
}

function getPropertyTypeIdDB($name, $con)
{

    $sql = "SELECT * FROM property_type WHERE property_name = '$name'";
    $result = $con->query($sql);

    if($result->num_rows >0){
        $count = 0;
         while($row = $result->fetch_assoc()) {

            $data[$count] = array(
              'id' => $row['id'],
              'category_id' => $row['category_id'],
              'property_id' => $row['property_id'], 
              'property_name' => $row['property_name']
            );
            $count++;
        }
        return (object) $data[0];
    }
       return false; 
}

function getPropertyTypeByIdDB($id, $con)
{
    $sql = "SELECT * FROM property_type WHERE property_id = '$id'";
    $result = $con->query($sql);

    if($result->num_rows >0){
        $count = 0;
         while($row = $result->fetch_assoc()) {

            $data[$count] = array(
              'id' => $row['id'],
              'category_id' => $row['category_id'],
              'property_id' => $row['property_id'], 
              'property_name' => $row['property_name']
            );
            $count++;
        }
        return $data[0]['property_name'];
    }
       return false; 
}    


function getPropertyImagesDB($id, $con)
{
    $sql = "SELECT * FROM unit_image WHERE property_id = '$id'";
    $result = $con->query($sql);
    $images = array();
    if($result->num_rows > 0){
        $count = 0;
            while ($row = $result->fetch_assoc()) {
                $images['src'][$count] = $row['image'];
                
                $count++;
            }
            $images['count'] = count($images['src']);
        return $images;
    } 
    return false; 
}


function searchDB($inputs, $con)
{
    $AreaUpperLimit = $inputs['AreaUpperLimit'];
    $AreaLowerLimit = $inputs['AreaLowerLimit'];

    $sql = "SELECT * FROM property_service WHERE AreaNumericValue <= '$AreaUpperLimit' AND AreaNumericValue >= '$AreaLowerLimit'";
    if (isset($inputs['lob']) && $inputs['lob'] != ''){
        $lob = $inputs['lob'];
        $sql = $sql." AND LineofBusinessFK = '$lob'";
    }
    if (isset($inputs['PropertyType'])){
        $PropertyType = $inputs['PropertyType'];
        $sql = $sql." AND PrpertyTypeStr = '$PropertyType'";
    }
    if (isset($inputs['City'])){
        $City = $inputs['City'];
        $sql = $sql." AND LocationCity = '$City'";
    }
    if (isset($inputs['District'])){
        $District = $inputs['District'];
        $sql = $sql." AND LocationDistrict = '$District'";
    }
    if (isset($inputs['PropertyFor'])){
        $PropertyFor = $inputs['PropertyFor'];
        $PriceLowerLimit = $inputs['PriceLowerLimit'];
        $PriceUpperLimit = $inputs['PriceUpperLimit'];
        if ($inputs['PropertyFor'] == 'Sale/Rent')
        {
            $sql = $sql." AND (SalesTypeStr = 'Sale' OR SalesTypeStr = 'Rent' OR SalesTypeStr = 'Sale/Rent')";
            $sql = $sql." AND SalePrice < '$PriceUpperLimit'";
            $sql = $sql." AND SalePrice > '$PriceLowerLimit'";
            $sql = $sql." AND RentPrice < '$PriceUpperLimit'";
            $sql = $sql." AND RentPrice > '$PriceLowerLimit'";
        }else{
            $sql = $sql." AND SalesTypeStr = '$PropertyFor' OR SalesTypeStr = 'Sale/Rent'";
            if ($inputs['PropertyFor'] == 'Sale'){
                $sql = $sql." AND SalePrice < '$PriceUpperLimit'";
                $sql = $sql." AND SalePrice > '$PriceLowerLimit'";
            }elseif($inputs['PropertyFor'] == 'Rent'){
                $sql = $sql." AND RentPrice < '$PriceUpperLimit'";
                $sql = $sql." AND RentPrice > '$PriceLowerLimit'";
            }
        }
        
    }
    $sql = $sql." ORDER BY PropertyId";
    $result = $con->query($sql);
    if ($result->num_rows > 0)
    {
        $count = 0;
        $results =array();
        while($row = $result->fetch_assoc()) {
            $results[$count] = $row;
            $count++;
        }
        $results = array(
          'results' => $results,
          'totalResults' => $result->num_rows
        );
        return $results;
    }else{
        return false;
    }
}

function getEmailContents(array $vars) 
{
    extract($vars);
    ob_start();
    include 'propertyAlert_template.php';
    return ob_get_clean();
}

function smtpmailer($subject,$body,$to, $attachment) 
{ 

   date_default_timezone_set('America/Los_Angeles');

    require_once("phpmailer.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();  // telling the class to use SMTP
    $mail->Host = "ssl://smtp.googlemail.com"; // Your SMTP PArameter
    $mail->Port = 465; // Your Outgoing Port
    $mail->SMTPAuth = true; // This Must Be True
    $mail->Username = 's.nahal@enlightworld.com';
    $mail->Password = '01069393641';
    $mail->From     = "s.nahal@enlightworld.com";
    $mail->AddAddress($to);
    $mail->IsHTML(true);
    $mail->Subject  = $subject;
    $mail->Body     = $body;
    if(!$mail->Send()) {
      echo 'Message was not sent.';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent.';
    }
}   


function propertyAlertCron($con)
{
    require_once('simple_html_dom.php');
    
    $dataArray = array();

    $sql = "SELECT * FROM user_property_alert";
    $results = $con->query($sql);

    while($row = $results->fetch_assoc()) {
        $identifier = $row['user_identifier'];

        if(!filter_var($identifier, FILTER_VALIDATE_EMAIL)) 
        {
            $tmp = getUserByID($identifier, $con);
            $row['user_identifier'] = $tmp->email;
        }
      
        if (array_key_exists($row['property_data'], $dataArray))
        {
            $dataArray[$row['property_data']] = $dataArray[$row['property_data']].','.$row['user_identifier'];
        }else{
            $dataArray[$row['property_data']] = $row['user_identifier'];
        }
    } 
    
    foreach ($dataArray as $key1 => $data1) {
      $propertyData = explode(',', $key1);
          $property_data = array();
          $data = array();
          $count = 0;
          foreach ($propertyData as $key => $data2) {
              $tmp = explode('=', $data2);
              if ($tmp[0] == 'city'){
                  $city = explode("'", $tmp[1]);
                  $city = getCityByIdDB($city[1], $con);
                  $city = (array) $city;
                  // print_r($city[0]['name']);
                  $property_data[$count]['city'] = $city[0]['name'];
                  
              }elseif ($tmp[0] == 'district'){
                  $district = explode("'", $tmp[1]);
                  $district = getDistrictByIdDB($district[1], $con);
                  $district = (array) $district;
                  $property_data[$count]['district'] = $district[0]['name'];
              }elseif ($tmp[0] == 'type') {
                  $type = explode("'", $tmp[1]);
                  $type = $type[1];
                  $type = getPropertyTypeIdDB($type, $con);
                  // print_r($type);
                  // $type = (array) $type;
                $property_data[$count]['type'] = $type->property_id;
              }elseif ($tmp[0] == 'price'){
                  $price = explode("'", $tmp[1]);
                $price = $price[1];
                  $price = explode(" - ", $price);
                  $property_data[$count]['priceLowerLimit'] = $price[0];
                  $property_data[$count]['priceUpperLimit'] = $price[1];
              }elseif ($tmp[0] == 'area') {
                  $area = explode("'", $tmp[1]);
                  $area = $area[1];
                  $area = explode(" - ", $area);
                  $property_data[$count]['areaLowerLimit'] = $area[0];
                  $property_data[$count]['areaUpperLimit'] = $area[1];
              }elseif ($tmp[0] == 'contractType') {
                  $contractType = explode("'", $tmp[1]);
                  $property_data[$count]['contractType'] = $contractType[1];
              }
          }

          if(!isset($property_data[$count]['city']))
          {
              $property_data[$count]['city'] = '';
          }
          if(!isset($property_data[$count]['district']))
          {
              $property_data[$count]['district'] = '';
          }
          if (!isset($property_data[$count]['type'])){
              $property_data[$count]['type'] = '';
          }else{
              $property_data[$count]['type'] = getPropertyTypeByIdDB($property_data[$count]['type'], $con);
          }
          if(!isset($property_data[$count]['priceLowerLimit']))
          {
              $property_data[$count]['priceLowerLimit'] = 0;
          }
          if(!isset($property_data[$count]['priceUpperLimit']))
          {
              $property_data[$count]['priceUpperLimit'] = 100000000000000;
          }
          if(!isset($property_data[$count]['areaLowerLimit']))
          {
              $property_data[$count]['areaLowerLimit'] = 0;
          }
          if(!isset($property_data[$count]['areaUpperLimit']))
          {
              $property_data[$count]['areaUpperLimit'] = 100000000000000;
          }
          if(!isset($property_data[$count]['contractType']))
          {
              $property_data[$count]['contractType'] = 'Sale/Rent';
          }

          $searchParams = array(
            'lob' => '',
            'PropertyType' => $property_data[$count]['type'],
            'City' => $property_data[$count]['city'],
            'District' => $property_data[$count]['district'],
            'PropertyFor' => $property_data[$count]['contractType'],
            'PriceLowerLimit' => $property_data[$count]['priceLowerLimit'],
            'PriceUpperLimit' => $property_data[$count]['priceUpperLimit'],
            'AreaLowerLimit' => $property_data[$count]['areaLowerLimit'],
            'AreaUpperLimit' => $property_data[$count]['areaUpperLimit']
          );
          $count++;
          $searchResults = searchDB($searchParams, $con);
            if ($searchResults['totalResults'] != 0){
                $data = array(
                    'title'=>'Coldwell Banker Daily Property Alert', 
                    'properties' => $searchResults['results']
                );
                foreach ($data['properties'] as $key => $property) {
                  $data['images'][$property['PropertyId']] = getPropertyImagesDB($property['PropertyId'], $con);
                  if (!is_array($data['images'][$property['PropertyId']]))
                  {
                      $data['images'][$property['PropertyId']] = array ( 0 => 'http://104.236.15.51/cb/application/static/images/No_image.svg');
                  }else{
                    $data['images'][$property['PropertyId']] = $data['images'][$property['PropertyId']]['src'];
                  }
                }

                $body = getEmailContents(array('data' => $data));
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= 'From: Website' . "\r\n";
                $emails = explode(',', $data1);
                foreach ($emails as $email) {
                    smtpmailer('New Properties',$body,$email, '');
                }

            }
    }
}
?>