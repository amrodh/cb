<?php 


	function printme($field)
	{
		echo '<pre>'.print_r($field,true).'</pre>';
	}

	function saltGenerator()
	{
		return random_string();
	}

	function tokenGenerator()
	{
		$time = time();
		$token = sha1($time.random_string());
		return $token;
	}

	

	function passwordEncryption($string,$random)
	{
		$string = md5(md5($string).$random);
		return $string;
	}

	function uploadMe($object)
	{
		$object->upload->initialize($object->config->config);
	if (!$object->upload->do_upload())
		{
			$error = array('error' => $object->upload->display_errors());
			return $error;
		}
		else
		{
			$data = array('upload_data' => $object->upload->data());
			return $data;
			
		}
	}


	function checkmail($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
	       return true;
	   else
	   	return false;
	    
	}



	
 ?>