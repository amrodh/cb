<?php 
	$con = mysqli_connect("localhost","root","root","cb");
    if (mysqli_connect_errno())
  	{
      	echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $properties = getAllPropertiesDB($con);
    // printme($properties);exit();
    foreach ($properties as $key => $property) {
    	// printme($property);exit();
    	insertPropertyImage($property['PropertyId'], $property['UnitId'], $con);
    }

    function printme($field)
    {
      echo '<pre>'.print_r($field,true).'</pre>';
    }

    function insertPropertyImage($propertyID, $unitID, $con)
    {

        $imgFlag = true;
        $count = 0;
        while($imgFlag){
            $path = "http://mycb.cb-ia.com/GetFile.aspx?fty=1&ftg=".$propertyID.",".$unitID."&id=".$count;
            $data = file_get_contents($path);
            if (strpos($data,'IHDR') == false) {
                // $img = '/Applications/MAMP/htdocs/ColdwellBanker/application/static/upload2/image_'.$count.'_'.$propertyID.'.jpg';
                $img = '/var/www/html/cb/application/static/upload/property_images/image_'.$count.'_'.$propertyID.'.jpg';
                file_put_contents($img, $data);
                $img_name = 'image_'.$count.'_'.$propertyID.'.jpg';
                $sql = "INSERT INTO unit_image (property_id, image) VALUES ('$propertyID', '$img_name')";
                $result = $con->query($sql);
                echo 'done'.$count.'<br>';
            }else{
                if ($count == 0)
                {
                    $sql = "INSERT INTO unit_image (property_id, image) VALUES ('$propertyID', 'No_image.svg')";
                    $result = $con->query($sql);
                }
                echo "none<br>";
                $imgFlag = false;
            }
            $count++;
        }
    }

    function getAllPropertiesDB($con)
    {
        $sql = "SELECT * FROM property_service ORDER BY PropertyId ASC";
        $result = $con->query($sql);
        if($result->num_rows >0){
            $count = 0;
             while($row = $result->fetch_assoc()) {
                $data[$count] = array(
                  'id' => $row['id'],
                  'AreaNumericValue' => $row['AreaNumericValue'],
                  'AreaUnit' => $row['AreaUnit'],
                  'AreaunitStr' => $row['AreaunitStr'],
                  'BalconiesNumber' => $row['BalconiesNumber'],
                  'BathRoomsNumber' => $row['BathRoomsNumber'],
                  'BedRoomsNumber' => $row['BedRoomsNumber'],
                  'InteriorFinishing' => $row['InteriorFinishing'],
                  'LineofBusinessFK' => $row['LineofBusinessFK'],
                  'LocationCity' => $row['LocationCity'],
                  'LocationDistrict' => $row['LocationDistrict'],
                  'LocationProject' => $row['LocationProject'],
                  'PropertyTypeFK' => $row['PropertyTypeFK'],
                  'PrpertyTypeStr' => $row['PrpertyTypeStr'],
                  'RentCurrency' => $row['RentCurrency'],
                  'RentPrice' => $row['RentPrice'],
                  'RentPricePerAreaUnit' => $row['RentPricePerAreaUnit'],
                  'SaleCurrency' => $row['SaleCurrency'],
                  'SalePrice' => $row['SalePrice'],
                  'SalePricePerAreaUnit' => $row['SalePricePerAreaUnit'],
                  'SalesTypeStr' => $row['SalesTypeStr'],
                  'TotalArea' => $row['TotalArea'],
                  'UnitId' => $row['UnitId'],
                  'PropertyId' => $row['PropertyId']
                );
                $count++;
            }
            return (object) $data;
        } 
           return false; 
    }