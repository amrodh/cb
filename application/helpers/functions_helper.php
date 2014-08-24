<?php 
	
	function printme($field)
	{
		echo '<pre>'.print_r($field,true).'</pre>';
	}

	function saltGenerator()
	{
		return random_string();
	}

	function passwordEncryption($string,$random)
	{
		$string = md5(md5($string).$random);
		return $string;
	}

	function uploadMe($object){
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
 ?>