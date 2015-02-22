<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		// echo date('YmdGi', strtotime("-1 days"));exit();
		$data['session'] = $this->session;
		$tmp = $this->session->flashdata('loginError');

		if($tmp){
			$data['loginError'] = $this->session->flashdata('loginError');
			$data['login_username'] = $this->session->flashdata('login_username');
			$data['loginErrorType'] = $this->session->flashdata('loginErrorType');
		}

		$data = $this->init();
		$data['title'] = 'Coldwell Banker Egypt – Betna | Real estate Egypt | Egypt real estate';	
		$this->load->model('content');
		$data['slides'] = $this->content->getActiveSliders();
		$data['cities'] = $this->database->getCities();
		$data['districts'] = $this->database->getAllDistricts();
		$data['propertyType1'] = $this->database->getAllPropertyTypes();

		// $inputs = array(
  //             'searchMode' => 'Exact',
  //             'Bedrooms' => '',
  //             'PropertyId' => '',
  //             'PropertyFor' => 3,
  //             'PriceLowerLimit' => 0,
  //             'PriceUpperLimit' => 1000000000000000000,
  //             'PunitSale' => '',
  //             'RentPriceLowerLimit' => 0,
  //             'RentPriceUpperLimit' => 1000000000000000000,
  //             'PunitRent' => '',
  //             'AreaLowerLimit' => 0,
  //             'AreaUpperLimit' => 1000000000000000000,
  //             'PropertyType' => '',
  //             'PropertyFor' => '',
  //             'BoxLocation' => '',
  //             'AreaUnitId' => '',
  //             'CompanyId' => '',
  //             'sortmode' => '',
  //             'sortType' =>'1',
  //             'isFeatured' => false,
  //             'resultsCountPerPage' => '1300', 
  //             'useFeaturedFilter' => false
  //           );
		// $this->load->model('service');
		// $data['searchFunction'] = $this->service->search($inputs);
		// printme($data['searchFunction']);
		// printme("<br><br>======================================<br><br>");
		// exit();

		// $this->load->model('cronjobs');
		// $this->cronjobs->importPropertiesIntoDB();


		// $data['propertyType2'] = $this->database->Getpropertytypes(2);

		// printme($data['propertyType1']);exit();


		// $districts = $this->database->getAllDistricts();
		// $neighborhoods = array();
		// foreach ($districts as $key => $district) {
			// printme($district);
			// $neighborhoods[$key] = $this->service->GetNeighborhoodList($district['id']);
		// }
		// printme($neighborhoods);exit();
		
		// $data['featuredProperties']=$this->service->getFeaturedProperties();
		// foreach ($data['featuredProperties'] as $property) {
		// 	$data['featuredImages'][$property->PropertyId] = $this->service->getPropertyImages($property->PropertyId,$property->UnitId);		
		// }


		$this->load->view($data['languagePath'].'home',$data);
	}


	public function _remap($method, $params = array())
    {
        // Check if the requested route exists
        if (method_exists($this, $method))
        {
            // Method exists - so just continue as normal
            return call_user_func_array(array($this, $method), $params);
        }else{
        	redirect(base_url());
        }
    }

	public function getFeaturedProperties()
	{	
		$data = $this->init();

		$data['featuredProperties']=$this->database->getFeaturedProperties();
		if($data['featuredProperties'] != false)
		{
			foreach ($data['featuredProperties'] as $property) {
				$data['featuredImages'][$property->PropertyId] = $this->database->getPropertyImages($property->PropertyId);		
			}
		}else{
			$data['no_featured'] = true;
		}
		 

		 if($_POST['language'] == 'ar')
		 	$data['languagePath'] = 'arabic/';
		 else
		 	$data['languagePath'] = '';
		 $this->load->view($data['languagePath'].'featuredProperties',$data);
	}

	public function authenticate()
	{
		$this->load->model('user');
		$username = $_POST['username'];
		$password = $_POST['password'];
		$currentUrl = $_POST['currentUrl'].'?'.$_POST['query_string'];
		$data['districts'] = $this->database->getAllDistricts();
		$user = $this->user->getUserByUsername($username);
		if($user){
			$login = $this->user->login($user->username,$password);
			if($login){
				$this->startSession($user);
				redirect($currentUrl);
				exit();
			}else{
				 $this->session->set_flashdata('loginError', 'Password is not correct');
				 $this->session->set_flashdata('loginErrorType', '1');
			}
		}else{
			 $this->session->set_flashdata('loginError', 'Username does not exist');
			 $this->session->set_flashdata('loginErrorType', '2');

		}
		$this->session->set_flashdata('login_username', $username);
		redirect($currentUrl.'?'.$query);

	}





	public function startSession($user)
	{
		$this->session->set_userdata($user);
		$this->load->model('user');
		$params = array('is_active' => 1);
		$this->user->updateUser($user->id, $params);
	}


	public function logout()
	{	
		$userid = $this->session->userdata['id'];
		$this->load->model('user');
		$params = array('is_active' => 0);
		$this->user->updateUser($userid, $params);
		$this->session->sess_destroy();
		$this->session->unset_userdata();
		redirect($_POST['currentUrl'].'?'.$_POST['query_string']);
	}

	public function register ()
	{

		$data = $this->init();

		if(isset($data['loggedIn']) && $data['loggedIn'] == 1)
			redirect(base_url());

		$data['title'] = 'ColdWell Banker | Registration';
		$data['countryCodes'] = $this->database->getCountryCodes();
		$data['districts'] = $this->database->getAllDistricts();
		if(isset($_POST['submit'])){
			$firstname = $_POST['first_name'];
			$lastname = $_POST['last_name'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$location	 = $_POST['location'];
			$code	 = $_POST['country_Code'];
			$phone	 = $_POST['phone'];
			$password = $_POST['password'];
			$birthday = $_POST['birthday'];
			if (isset($_POST['newsletter']))
			{
				$newsletter = $_POST['newsletter'];
			}
			$data['params'] = $_POST;


			if (empty($_POST['first_name'])){
				$data['firstNameError'] = 'Insert First Name';
			}
			elseif (empty($_POST['last_name'])) {
				$data['lastNameError'] = 'Insert Last Name';
			}elseif (empty($_POST['username'])) {
				$data['usernameError'] = 'Insert Username';
			}elseif (empty($_POST['email'])) {
				$data['emailError'] = 'Insert email';
			}elseif (empty($_POST['location'])){
				$data['locationError'] = 'Insert location';
			}elseif (empty($_POST['phone'])){
				$data['phoneError'] = 'Insert phone number';
			}elseif (empty($_POST['location'])){
				$data['passwordError'] = 'Insert password';
			}elseif (empty($_POST['birthday'])) {
				$data['birthdayError'] = 'Insert birthday';
			}else
			{
				$user = $this->user->getUserByUsername($username);
				if ($user)
				{
					$data['registrationError'] = 'Username already exists';
				}else{
					$userData = array('username' => $_POST['username'],
						'email' => $_POST['email'],
						'first_name' => $_POST['first_name'],
						'last_name' => $_POST['last_name'],
						'location' => $_POST['location'],
						'phone' => $_POST['country_Code'].$_POST['phone'],
						'password' => $_POST['password'],
						'birthday' => $_POST['birthday'],
						'is_valid' => 0
						);

					if ($this->user->insertUser($userData))
					{	
						$insertToken = $this->user->insertTempEmail($this->db->insert_id(),$_POST['email'],1);
						$this->registrationValidation($this->db->insert_id());
						$user = $this->user->getUserByUsername($userData['username']);
						$this->startSession($user);

						if (isset($_POST['newsletter']))
						{	
							$params['user_identifier'] = $this->db->insert_id();
							$this->user->insertNewsletterData($params);
						}
						if ($data['language'] !== 'ar' && $data['language'] !== 'en')
						{
							redirect(base_url());
						}else{
							redirect(base_url().$data['language']);
						}
						
					}
				}
			}
		}
		$this->load->view($data['languagePath'].'register',$data);
	}

	public function registrationValidation($id)
	{	
		$token = $this->user->getToken($id);
		$body = '
		Please Validate your account by clicking on the following link 
		</br>
		 <a href="'.base_url().'validate/'.$token->token.'"> Validate My Account</a>
		';
		$this->smtpmailer('Welcome To ColdWell Banker',$body,$token->email, '');
	}

	public function emailUpdateValidation($id)
	{	
		$token = $this->user->getToken($id);
		$body = '
		Please Validate updating your email by clicking on the following link 
		</br>
		 <a href="'.base_url().'validate/'.$token->token.'"> Verify Email Update</a>
		';
		$this->smtpmailer('Email Update Verification',$body,$token->email, '');
	}

	public function forgotPasswordValidation($id, $language)
	{
		$token = $this->user->getToken($id);
		$body = '
		Please click on the following link to reset your password.
		</br>
		 <a href="'.base_url().$language.'/resetpassword/'.$token->token.'"> Reset Password</a>
		';
		$this->smtpmailer('Reset Password',$body,$token->email, '');
	}

	public function profile()
	{
		$username = $this->session->userdata('username');
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Profile';
		$data['districts'] = $this->database->getAllDistricts();
		if(!isset($data['user']))
			redirect('home');

		$data['favorites'] = $this->user->getUserFavorites($data['user']->id);
		$data['favoritesArray'] = array();
		$data['favoritesImages'] = array();
		foreach ($data['favorites'] as $key => $property) {
			$data['favoritesArray'][$key] = $this->database->getPropertyByID($property->property_id);
			$data['favoritesArray'][$key] = (object)$data['favoritesArray'][$key][0];
			$data['favoritesImages'][$property->property_id] = $this->database->getPropertyImages($property->property_id);		
		}

		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$email = $_POST['email'];
			$location = $_POST['location'];
			$phone = $_POST['phone'];

			if (empty($username)) {
				$data['usernameError'] = 'Insert Username';
			}elseif (empty($email)) {
				$data['emailError'] = 'Insert email';
			}elseif (empty($location)) {
				$data['locationError'] = 'Insert location';			
			}elseif(empty($phone)){
				$data['phoneError'] = 'Insert phone';
			}
			else{
				$user = $this->user->getUserByUsername($username);
				if ($user){

					if($user ->username == $this->session->userdata('username'))
					{
						$params = array('username' => $username,
						'location' => $location,
						'phone' => $phone);

						$emailtmp = $this->user->getUserByEmail($email);
						if ($emailtmp){
							if($emailtmp ->email == $this->session->userdata('email'))
							{
								$update = $this->user->updateUser($data['user']->id, $params);
								$data['user'] = $this->user->getUserByUsername($username);
								$this->startSession($data['user']);
								if($update){
									$data['update'] = true;
								}
							}
							else{
								$data['updateEmailError'] = 'Email already exists';
							}
						}
						else{
							 $update = $this->user->updateUser($data['user']->id, $params);
							if ($_POST['email'] != $this->session->userdata('email')){
								if ($this->user->insertTempEmail($this->session->userdata('id'),$_POST['email'],2))
								{
									$this->emailUpdateValidation($this->db->insert_id());
									$data['emailUpdateMessage'] = 'Please login to your email to confirm email update.';	
								}
								
							}

							$data['user'] = $this->user->getUserByUsername($username);
							$this->startSession($data['user']);
							if($update){
								$data['update'] = true;
							}
						}
					}
					else{
						$data['updateError'] = 'Username already exists';
					}
				}	
				else{
					$params = array('username' => $username,
					'location' => $location,
					'phone' => $phone);

					$emailtmp = $this->user->getUserByEmail($email);
					if ($emailtmp){
						if($emailtmp ->email == $this->session->userdata('email'))
						{
							$update = $this->user->updateUser($data['user']->id, $params);
							$data['user'] = $this->user->getUserByUsername($username);
							$this->startSession($data['user']);
							if($update){
								$data['update'] = true;
							}else{
								$data['update'] = false;
							}
						}
						else{
							$data['updateEmailError'] = 'Email already exists';
						}
					}
					else{
						$update = $this->user->updateUser($data['user']->id, $params);
						
						if ($_POST['email'] != $this->session->userdata('email')){
							if ($this->user->insertTempEmail($this->session->userdata('id'),$_POST['email'],2))
							{
								$this->emailUpdateValidation($this->db->insert_id());
								$data['emailUpdateMessage'] = 'Please login to your email to confirm email update.';	
							}
							
						}

						$data['user'] = $this->user->getUserByUsername($username);
						$this->startSession($data['user']);
						if($update){
							$data['update'] = true;
						}else{
							$data['update'] = false;
						}
					}


					// $update = $this->user->updateUser($data['user']->id, $params);
					// $data['user'] = $this->user->getUserByUsername($username);
					// $this->startSession($data['user']);
					// if($update){
					// 	$data['update'] = true;
					// }else{
					// 	$data['update'] = false;
					// }
				}

			}
		}
		$this->load->view($data['languagePath'].'profile', $data);
	}

	public function validateToken()
	{
		$this->load->model('user');
		$token = $this->uri->uri_string;
		$token = explode('validate/', $token);
		$token = $token[1];
		$tokenInfo = $this->user->checkToken($token);
		if ($tokenInfo->is_valid == 1)
		{
			$date = explode(' ', $tokenInfo->date_joined);
			$date = explode('-', $date[0]);
			$today = date('j');

			$diff = $today - $date[2];
			if ($diff < 1)
			{	
				$user = $this->user->getUserByID($tokenInfo->user_id);
				$is_valid = $user->is_valid;
				if($tokenInfo->type == 1){
					$params = array('is_valid' => 1);
					$this->user->updateUser($tokenInfo->user_id, $params);
					$this->startSession($user);
					redirect('home');
				}elseif($tokenInfo->type == 2){
					$params = array('email' => $tokenInfo->email,'is_valid' => 1);
					$emailUpdate = $this->user->updateUser($tokenInfo->user_id, $params);
					redirect('home');
				}else{
					// token == 3 change password
					// $this->session->set_flashdata('email', $tokenInfo->email);
					// $this->session->set_flashdata('token', $token);
					// redirect('resetpassword');
				}
			}
			else
			{
				echo "Confirmation email expired";
			}
		}
	}	

	public function shareProperty()
	{
		// $this->load->model('user');
		// $this->load->model('property');
		// $this->load->model('service');

		$username = $this->session->userdata('username');
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Share your Property';
		$data['cities'] = $this->database->getCities();
		$data['districts'] = $this->database->getAllDistricts();
		
		if (isset($_POST['submit'])){
			$data['params'] = $_POST;
			if (empty($_POST['area']) || $_POST['area'] == 'Select Area'){
				$data['insertError'] = $this->lang->line('shareProperty_missing_area');
			}elseif (empty($_POST['shareProperty_lob']) || $_POST['shareProperty_lob'] == 'Select Category' || $_POST['shareProperty_lob'] == 'إختار الفئة'){
				$data['insertError'] = $this->lang->line('shareProperty_missing_category');
			}elseif (empty($_POST['shareProperty_type']) || $_POST['shareProperty_type'] == 'Select Type') {
				$data['insertError'] = $this->lang->line('shareProperty_missing_type');
			}elseif (empty($_POST['price']) || $_POST['price'] == 'Select Price') {
				$data['insertError'] = $this->lang->line('shareProperty_missing_price');
			}elseif (empty($_POST['city']) || $_POST['city'] == 'Select City') {
				$data['insertError'] = $this->lang->line('shareProperty_missing_city');
			}elseif (empty($_POST['district']) || $_POST['district'] == 'Select District') {
				$data['insertError'] = $this->lang->line('shareProperty_missing_district');
			}elseif (empty($_POST['address'])) {
				$data['insertError'] = $this->lang->line('shareProperty_missing_address');
			}elseif (empty($_POST['features'])) {
				$data['insertError'] = $this->lang->line('shareProperty_missing_features');
			}else{
				
				if ($_POST['shareProperty_lob'] == 1){
					$category = 'Residential';
				}elseif ($_POST['shareProperty_lob'] == 2) {
					$category = 'Commercial';
				}elseif ($_POST['shareProperty_lob'] == 3) {
					$category = 'Auctions';
				}elseif ($_POST['shareProperty_lob'] == 4) {
					$category = 'Commercial Projects';
				}

				$city = $this->database->getCityByID($_POST['city']);
				$city = $city[0]['name'];
				if ($_POST['district'] != 0){
					$district = $this->database->getDistrictByID($_POST['district']);
					$district = $district[0]['name'];
				}else{
					$district = '';
				}
				
				$propertyType = $this->database->getPropertyTypeByID($_POST['shareProperty_lob'],$_POST['shareProperty_type']);

				$params = array ('user_id' => $data['user']->id,
					'area' => $_POST['area'],
					'category' => $category,
					'type' => $propertyType,
					'price' => $_POST['price'],
					'district' => $district,
					'features' => $_POST['features'],
					'address' => $_POST['address'],
					'city' => $city);
				if ($this->property->insertProperty($params))
				{
					if(isset($_FILES) && $_FILES['img']['name']['0'] != "" ){
							$images = array();
							$params = array();
							$params['property_id'] = $this->db->insert_id();
							$i = 0;
							foreach ($_FILES['img']['name'] as $name) {
							 	$images['image_'.$i]['name'] = $name;
							 	$images['image_'.$i]['type'] = $_FILES['img']['type'][$i];
							 	$images['image_'.$i]['size'] = $_FILES['img']['size'][$i];
							 	$images['image_'.$i]['tmp_name'] = $_FILES['img']['tmp_name'][$i];
							 	$i++;
							}
							$count=0;
							foreach ($images as $image) {
								$fileExtension = explode('.',$image['name']);
								$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
								$_FILES['userfile']['tmp_name'] = $image['tmp_name'];
								$_FILES['userfile']['size'] = $image['size'];
								$params['image_url'] = $_FILES['userfile']['name'];
								$this->config->set_item('allowed_types','pdf|jpg|jpeg|png');
								if (!isset($data['imageFlag'])){
									$upload = uploadme($this);
									if(!isset($upload['error'])){
										$this->load->model('property');
										$this->property->insertImage($params);
										$data['insertProcess'] = true;

										$imageAttachments[$count] = getcwd().'/application/static/upload/'.$_FILES['userfile']['name'];
										$count++;
										
									}else{
										$this->property->deleteProperty($params['property_id']);
										$data['insertProcess'] = false;
										$data['imageFlag'] = true; 
									}
								}
								
							}
							$firstname = $data['user']->first_name;
							$lastname = $data['user']->last_name;
							$phone = $data['user']->phone;
							$email = $data['user']->email;
							$body = 'Name: '.$firstname.' '.$lastname.'<br>
									E-mail: '.$email.'<br>
									Phone: '.$phone.'<br>
									Property Type: '.$propertyType;
							if(isset($imageAttachments)){
								$this->smtpmailer('Share Property',$body,'customerservice@cb-egypt.com', $imageAttachments);
							}else{
								$this->smtpmailer('Share Property',$body,'customerservice@cb-egypt.com', '');
							}
						}
						$data['insertProcess'] = true;
				}else{
					$data['insertError'] = "Error Inserting Property Data";
				}
				
			}
		}
		$this->load->view($data['languagePath'].'share_property', $data);
	}


	public function subscribeuser()
	{
		if($_POST['id'] == 'user'){
			$params['user_identifier'] = $this->session->userdata['id'];
		}else{
			$params['user_identifier'] = $_POST['id'];
		}
		
		$process = $this->user->insertNewsletterData($params);
		if($process)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getSearchResults()
	{
		$data = $this->init();
		$flag = false;
		$generalFlag = false;
		$districtFlag = false;
		if (isset($data['loggedIn'])){
			$data['userFavorites'] = $this->user->getUserFavorites($data['user']->id);
			if(is_array($data['userFavorites'])){
				foreach ($data['userFavorites'] as $property) {
					$userFavorites[] = $property->property_id;
				}
			}else{
				$userFavorites = array();
			}
		}
		if ($_GET['language'] == 'ar')
		{
			$data['languagePath'] = 'arabic/';
		}else{
			$data['languagePath'] = '';
		}


		$getData = explode('&', $_GET['data']);
		foreach ($getData as $value) {
			$value = explode('=', $value);
			if($value[0] == 'featured'){
				$flag = true;
				$searchParams = array('featured' => true);
				$data['searchResults'] = $this->database->search($searchParams);
				
				if ($data['searchResults']['totalResults'] > 0)
				{
					$data['totalResults'] = $data['searchResults']['totalResults'];
					$data['searchResults'] = $data['searchResults']['results'];
					$data['images'] = array();
					foreach ($data['searchResults'] as $property) {
						if(isset($userFavorites)){
							if(in_array($property->PropertyId,$userFavorites)){
								$property->is_favorite = 1;
							}else{
								$property->is_favorite = 0;
							}
						}
						$data['images'][$property->PropertyId] = $this->database->getPropertyImages($property->PropertyId);
						// $data['images'][$property->PropertyId] = $this->service->getPropertyImages($property->PropertyId,$property->UnitId);
					}
				}else{
					$data['resultCount'] = 0;
					$data['totalResults'] = 0;
					$data['noResults'] = "Sorry, there were no results that match your criteria";
				}
				break;
			}elseif ($value[0] == 'lob'){
				if ($value[1] == 0 || $value[1] == '')
				{
					$lob = '';
				}else{
					$lob = $value[1];
				}
			}elseif($value[0] == 'city'){
				if ($value[1] == 0 || $value[1] == '')
				{
					$city = '';
				}else{
					$city = $this->database->getCityByID($value[1]);
					$data['districts'] = $this->database->getDistricts($city[0]['id']);
					$city = $city[0]['name'];
				}
			}elseif($value[0] == 'district'){
				if ($value[1] == 0 || $value[1] == '')
				{
					$district = '';
				}else{
					$district = $this->database->getDistrictByID($value[1]);
					$district = $district[0]['name'];
					$districtFlag = true;
				}
			}elseif($value[0] == 'type'){
				if ($value[1] == 0 || $value[1] == '')
				{
					$type = '';
				}else{
					$type = $this->database->getPropertyTypeByID($value[1]);
				}
			}elseif($value[0] == 'contractType'){
				
				// if ($value[1] != 'Sale' || $value[1] != 'Rent' || $value[1] != 'Sale/Rent')
				// {
					// $propertyFor = '';
				// }else{
					$propertyFor = $value[1];
				// }
			}elseif($value[0] == 'price'){
				$price = explode('+', $value[1]);
				if (count($price) == 1)
				{
					$priceLowerLimit = $price[0];
					$priceUpperLimit = 1000000000000000000000000;
				}else{
					$priceLowerLimit = $price[0];
					$priceUpperLimit = $price[2];
				}
			}elseif($value[0] == 'area'){
				$area = explode('+', $value[1]);
				if (count($area) == 1)
				{
					if ($area[0] == '%3C50')
					{
						$areaLowerLimit = 0;
						$areaUpperLimit = 50;
					}elseif ($area[0] == '%3E500') {
						$areaLowerLimit = 500;
						$areaUpperLimit = 10000000000000000000000000;
					}elseif($area[0] == 0){
						$areaLowerLimit = 0;
						$areaUpperLimit = 10000000000000000000000000;
					}
				}else{
					$areaLowerLimit = $area[0];
					$areaUpperLimit = $area[2];
				}
			}elseif($value[0] == 'project'){
				if ($value[1] == 0 || $value[1] == '')
				{
					$project = '';
				}else{
					$project = $value[1];
				}
			}
		}

		if ($districtFlag == false){
			$district = '';
		}

		if ($flag == false){
			if ($lob == '' && $type == '' && $city == '' && $district == '' && $project == '' && $propertyFor == '')
			{
				$generalFlag = true;
			}
			$searchParams = array(
				'lob' => $lob,
				'PropertyType' => $type,
				'City' => $city,
				'District' => $district,
				'LocationProject' => $project,
				'PropertyFor' => $propertyFor,
				'PriceLowerLimit' => $priceLowerLimit,
				'PriceUpperLimit' => $priceUpperLimit,
				'AreaLowerLimit' => $areaLowerLimit,
				'AreaUpperLimit' => $areaUpperLimit,
				'generalFlag' => $generalFlag
			);
			if ($lob == 2)
			{
				$data['commercial'] = true;
			}
			$data['searchResults'] = $this->database->search($searchParams);
			if ($data['searchResults']['totalResults'] > 0)
			{
				$data['totalResults'] = $data['searchResults']['totalResults'];
				$data['searchResults'] = $data['searchResults']['results'];
				$data['images'] = array();
				foreach ($data['searchResults'] as $property) {
					if(isset($userFavorites)){
						if(in_array($property->PropertyId,$userFavorites)){
							$property->is_favorite = 1;
						}else{
							$property->is_favorite = 0;
						}
					}
					$data['images'][$property->PropertyId] = $this->database->getPropertyImages($property->PropertyId);
					if ((!is_array($data['images'][$property->PropertyId]) || count($data['images'][$property->PropertyId]) < 1)) {
						$data['images'][$property->PropertyId]['src'] = 'No_image.svg';
						$data['images'][$property->PropertyId]['count'] = 1;
					}

				}
			}else{
				$data['resultCount'] = 0;
				$data['totalResults'] = 0;
				$data['noResults'] = "Sorry, there were no results that match your criteria";
			}
		}
		$this->load->view($data['languagePath'].'search_results', $data);
	}

	public function viewAllProperties ()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Available Properties';
		$data['cities'] = $this->database->getCities();
		if (isset($_GET['city']))
		{
			$data['districts'] = $this->database->getDistricts($_GET['city']);
		}
		$data['propertyType1'] = $this->database->Getpropertytypes(1);
		$data['propertyType2'] = $this->database->Getpropertytypes(2);
		$data['uri'] = $data['uri'].'?'.$_SERVER['QUERY_STRING'];
		$this->load->view($data['languagePath'].'view_all_properties',$data);
	}

	public function compareProperties ()
	{
		$data = $this->init();
		$data['title'] = 'Coldwell Banker | Compare Properties';
		$data['districts'] = $this->database->getAllDistricts();
		if(isset($_GET['compareSubmit']))
		{
			$properties = array();
			$count = 0;
			foreach ($_GET['property_chkbx'] as $key => $property) {
				$propertyID = explode('_', $property);
				$propertyID = $propertyID[1];
				$data['properties'][$propertyID] = $this->database->getPropertyByID($propertyID);
				$data['properties'][$propertyID] = (object)$data['properties'][$propertyID][0];
				$data['images'][$propertyID] = $this->database->getPropertyImages($propertyID);
				$count++;
			}
			$data['propertyCount'] = $count;
		}
		$data['uri'] = $data['uri'].'?'.$_SERVER['QUERY_STRING'];
		$this->load->view($data['languagePath'].'compare_properties',$data);
	}

	public function propertyDetails ()
	{
		$data = $this->init();
		$propertyId = explode('/', $data['uri']);
		$data['propertyId'] = $propertyId[1];
		$data['searchResults'] = $this->database->getPropertyByID($data['propertyId']);
		if (!is_array($data['searchResults'])) {
			redirect(base_url());
		}
		$data['searchResults'] = (object)  $data['searchResults'][0];
		$data['title'] = 'ColdWell Banker | '.$data['searchResults']->PrpertyTypeStr.' for '.$data['searchResults']->SalesTypeStr.' in '.$data['searchResults']->LocationProject.', '.$data['searchResults']->LocationDistrict.', '.$data['searchResults']->LocationCity;
		$data['districts'] = $this->database->getAllDistricts();
		$data['images'] = $this->database->getPropertyImages($data['propertyId']);
		if (isset($_POST['submit'])){
			if (empty($_POST['firstName'])){
				$data['contactError'] = "Please insert First Name";
			}elseif (empty($_POST['lastName'])) {
				$data['contactError'] = "Please insert Last Name";
			}elseif (empty($_POST['email'])){
				$data['contactError'] = "Please insert E-mail";
			}elseif (empty($_POST['phone'])) {
				$data['contactError'] = "Please insert Phone";
			}elseif (!isset($_POST['interest'])){
				$data['contactError'] = "Please choose your interest";
			}else{

				foreach ($_POST['interest'] as $interest) {
					$interests[] = $interest;
				}
				$params = array(
					'first_name' => $_POST['firstName'],
					'last_name' => $_POST['lastName'],
					'email' => $_POST['email'],
					'phone' => $_POST['phone'],
					'comments' => $_POST['comments'], 
					'propertyId' => $data['propertyId']
					);
				if ($this->user->insertContactInformation($params, $interests)){

					$data['contactSuccess'] = "Your Contact Info was inserted successfully!";
					$body = 'Name: '.$_POST['firstName'].' '.$_POST['lastName'].'<br>
						E-mail: '.$_POST['email'].'<br>
						Phone: '.$_POST['phone'].'<br>
						PropertyID: '.$data['propertyId'].'<br>
						Property Address: '.$data['searchResults']->LocationProject.', '.$data['searchResults']->LocationDistrict.', '.$data['searchResults']->LocationCity.'<br>
						Property Type: '.$data['searchResults']->PrpertyTypeStr.'<br>
						Comments: '.$_POST['comments'];
					$this->smtpmailer('Property Inquiries',$body,'customerservice@cb-egypt.com', '');
				}
			}
		}

		// $data['images'] = $this->service->getPropertyImages($data['propertyId'],$data['searchResults']->UnitId);
		$this->load->view($data['languagePath'].'property_details',$data);
	}

	public function careers ()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Careers';
		$data['cities'] = $this->database->getCities();
		$data['districts'] = $this->database->getAllDistricts();
		$data['propertyType1'] = $this->database->getAllPropertyTypes();
		$this->load->view($data['languagePath'].'careers',$data);
	}

	public function uploadCV ()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Apply Now';
		$data['districts'] = $this->database->getAllDistricts();
		$this->load->model('user');

		$vacancy_id = $data['uri'];

		if($vacancy_id == 'uploadCV'){
			$vacancy_id = 11;

		}else{
			$expodeCV = explode('uploadCV/', $vacancy_id);
			$vacancy_id = $expodeCV[1];

		}

		if(isset($_POST['submit']))
		{

			if (isset($data['loggedIn'])){
				$firstname = $data['user']->first_name;
				$lastname = $data['user']->last_name;
				$email = $data['user']->email;
				$id = $data['user']->id;
			}
			else{
				if (empty($_POST['uploadcv_app_firstname'])){
					$data['uploadError'] = $this->lang->line('uploadCV_missing_firstname');
				}elseif (empty($_POST['uploadcv_app_lastname'])) {
					$data['uploadError'] = $this->lang->line('uploadCV_missing_lastname');
				}elseif (empty($_POST['uploadcv_app_email'])) {
					$data['uploadError'] = $this->lang->line('uploadCV_missing_email');
				}elseif (!isset($_FILES)){
					$data['uploadError'] = $this->lang->line('uploadCV_missing_file');
				}else{
					$firstname = $_POST['uploadcv_app_firstname'];
					$lastname = $_POST['uploadcv_app_lastname'];
					$id = $_POST['uploadcv_app_email'];
					$email = $_POST['uploadcv_app_email'];
					$data['params'] = $_POST;
				}
			}
			
			$filename = explode('.', $_FILES['userfile']['name']);
			$filename = $filename[0];
			$ext = explode('.', $_FILES['userfile']['name']);
			$ext = $ext[1];
			$_FILES['userfile']['name'] = $filename.'_'.time().'.'.$ext;
			$this->config->set_item('upload_path',getcwd().'/application/static/upload/careers');
			$this->config->set_item('allowed_types','pdf|doc|docx');
			
			$upload = uploadme($this);
			if(isset($upload['upload_data'])){
				$params = array('user_identifier' => $id,
				'first_name' => $firstname,
				'last_name' => $lastname,
				'vacancy_id' => $vacancy_id,
				'cv' => $_FILES['userfile']['name']
				);
				if ($this->vacancy->insertEnrollment($params))
				{
					$data['uploadSuccess'] = $this->lang->line('uploadCV_success');
					$body = 'Name: '.$firstname.' '.$lastname.'<br>
							E-mail: '.$email.'<br>
							Vacancy: '.$vacancy_id;
					$attachment = getcwd().'/application/static/upload/careers/'.$_FILES['userfile']['name'] ;
					$this->smtpmailer('CV Application',$body,'hr@cb-egypt.com', $attachment);
				}
			}else{
				$uploadError = uploadme($this);
				$data['uploadError'] = $uploadError['error']." (pdf, doc and docx)";
			}

			
			
		}

		$this->load->view($data['languagePath'].'upload_cv',$data);
	}

	public function joinUs ()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Join Us';
		$this->load->model('vacancy');
		$data['districts'] = $this->database->getAllDistricts();
		$data['vacancies'] = $this->vacancy->getVacancies();
		$this->load->view($data['languagePath'].'join_us',$data);
	}

	public function marketIndex ()
	{
		$data = $this->init();
		$data['districts'] = $this->database->getAllDistricts();
		$data['title'] = 'ColdWell Banker | Market Index';
		$this->load->view($data['languagePath'].'market_index',$data);
	}

	public function auction ()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Auctions';

		$this->database->getPropertyImages(162);
		$data['districts'] = $this->database->getAllDistricts();
		$data['auctions'] = $this->property->getAuctions();
		$data['recentAuctions'] = $this->property->getRecentAuctions();
		$data['upcomingAuctions'] = $this->property->getUpcomingAuctions();
		$this->load->view($data['languagePath'].'auction',$data);
	}

	public function init()
	{	
		$data = array();
		
		if(isset($this->session->userdata['id'])){
			$this->load->model('user');
			$data['loggedIn'] = true;
			$data['user'] = $this->user->getUserByUsername($this->session->userdata['username']);
			if ($data['user']->is_valid == 1)
			{
				$data['is_valid'] = $data['user']->is_valid;
			}
			// $this->load->model('service');
			if ($this->user->is_subscribed($data['user']->id))
			{
				$data['is_subscribed'] = true;
			}
			else{
				$data['is_subscribed'] = false;
			}
		}


		$tmp = $this->session->flashdata('loginError');

		if($tmp){
			$data['loginError'] = $this->session->flashdata('loginError');
			$data['login_username'] = $this->session->flashdata('login_username');
			$data['loginErrorType'] = $this->session->flashdata('loginErrorType');
		}

		
		$uri = $this->uri->uri_string;
		$posAr = strpos($uri, 'ar/');
		$posEn = strpos($uri, 'en/');
		$posAr2 = strpos($uri, 'ar');
		$posEn2 = strpos($uri, 'en');
		
		if ($posEn !== false || $posEn2 !== false ){
			if ($posAr == false || $posAr2 == false)
			{
				$explodeAr = explode('ar/', $uri);
				$explodeEn = explode('en/', $uri);
				if ($explodeAr[0] == $uri)
				{
					$data['uri'] = explode('en/', $uri);
					if(isset($data['uri'][1])){
						$data['uri'] = $data['uri'][1];
					}else{
						$data['uri'] = $uri;
					}
				}
				elseif ($explodeEn[0] == $uri){
					$data['uri'] = explode('ar/', $uri);
					if(isset($data['uri'][1])){
						$data['uri'] = $data['uri'][1];
					}else{
						$data['uri'] = $uri;
					}
				}
			}
			else{
				$data['uri'] = explode('en/', $uri);
				if(isset($data['uri'][1])){
					$data['uri'] = $data['uri'][1];
				}else{
					$data['uri'] = $uri;
				}
			}
			
		}
		elseif ($posAr !== false || $posAr2 !== false){
			if ($posEn == false || $posEn2 == false){
				$explodeAr = explode('ar/', $uri);
				$explodeEn = explode('en/', $uri);
				if ($explodeEn[0] == $uri)
				{
					$data['uri'] = explode('ar/', $uri);
					if(isset($data['uri'][1])){
						$data['uri'] = $data['uri'][1];
					}else{
						$data['uri'] = $uri;
					}
				}
				elseif ($explodeAr[0] == $uri){
					$data['uri'] = explode('en/', $uri);
					if(isset($data['uri'][1])){
						$data['uri'] = $data['uri'][1];
					}else{
						$data['uri'] = $uri;
					}
				}
			}
			else{
				$data['uri'] = explode('en/', $uri);
				if(isset($data['uri'][1])){
					$data['uri'] = $data['uri'][1];
				}else{
					$data['uri'] = $uri;
				}
			}
		}
		else{
			$data['uri'] = $uri;
		}
		if (($uri == 'en') || ($uri == 'ar')){
			$data['uri'] = '';
		}

		$data['language'] = $this->uri->segment(1);

		if(isset($_GET['language'])){
			$data['language'] = $_GET['language'];
		}

		$data['languagePath'] = '';
		if($data['language'] == 'ar')
		{
			$data['languagePath'] = 'arabic/';
		}else{
			$data['languagePath'] = '';
		}
		$this->loadLanguage($data['language']);
		return $data;
		
	}


	public function loadLanguage($lang)
	{	

		if($lang == 'ar')
			$lang = 'arabic';
		else
			$lang = 'english';
		$this->lang->load('home', $lang);
		$this->lang->load('auction', $lang);
		$this->lang->load('compare', $lang);
		$this->lang->load('careers', $lang);
		$this->lang->load('error', $lang);
		$this->lang->load('joinus', $lang);
		$this->lang->load('marketindex', $lang);
		$this->lang->load('profile', $lang);
		$this->lang->load('propertyalert', $lang);
		$this->lang->load('propertydetails', $lang);
		$this->lang->load('register', $lang);
		$this->lang->load('search', $lang);
		$this->lang->load('searchhome', $lang);
		$this->lang->load('shareproperty', $lang);
		$this->lang->load('trainingcenter', $lang);
		$this->lang->load('uploadcv', $lang);
		$this->lang->load('viewallproperties', $lang);
		$this->lang->load('forgetpassword', $lang);
		$this->lang->load('resetpassword', $lang);
		$this->lang->load('offices', $lang);
		$this->lang->load('featuredProperties', $lang);
		$this->lang->load('about', $lang);
	}

	public function insertPropertyAlert()
	{
		$name = $_POST['name'];
		if(filter_var($name, FILTER_VALIDATE_EMAIL)) {
	        $params['user_identifier'] = $name;
	    }
	    else {
	       $user = $this->user->getUserByUsername($name);
	        $params['user_identifier'] = $user->id;
	    }

	    $params['property_data'] = $_POST['data'];
	    $insertProcess = $this->property->insertPropertyAlert($params);
	    $postData = explode(',', $_POST['data']);
	    foreach ($postData as $value) {
			$value = explode('=', $value);
			if($value[0] == 'city'){
				if ($value[1] == 0 || $value[1] == '')
				{
					$city = '';
				}else{
					$city = $this->database->getCityByID($value[1]);
					$data['districts'] = $this->database->getDistricts($city[0]['id']);
					$city = $city[0]['name'];
				}
			}elseif($value[0] == 'district'){
				if ($value[1] == 0 || $value[1] == '')
				{
					$district = '';
				}else{
					$district = $this->database->getDistrictByID($value[1]);
					$district = $district[0]['name'];
					$districtFlag = true;
				}
			}elseif($value[0] == 'type'){
				// if ($value[1] == 0 || $value[1] == '')
				// {
					// $type = '';
				// }else{
					$type = $this->database->getPropertyTypeByID($value[1]);
				// }
			}elseif($value[0] == 'contractType'){
				// if ($value[1] != 'Sale' || $value[1] != 'Rent' || $value[1] != 'Sale/Rent')
				// {
					// $propertyFor = '';
				// }else{
					$propertyFor = $value[1];
				// }
			}elseif($value[0] == 'price'){
				$price = explode('-', $value[1]);
				if (count($price) == 1)
				{
					$priceLowerLimit = $price[0];
					$priceUpperLimit = 1000000000000000000000000;
				}else{
					$priceLowerLimit = $price[0];
					$priceUpperLimit = $price[2];
				}
			}elseif($value[0] == 'area'){
				$area = explode('-', $value[1]);
				if (count($area) == 1)
				{
					if ($area[0] == '%3C50')
					{
						$areaLowerLimit = 0;
						$areaUpperLimit = 50;
					}elseif ($area[0] == '%3E500') {
						$areaLowerLimit = 500;
						$areaUpperLimit = 10000000000000000000000000;
					}elseif($area[0] == 0){
						$areaLowerLimit = 0;
						$areaUpperLimit = 10000000000000000000000000;
					}
				}else{
					$areaLowerLimit = $area[0];
					$areaUpperLimit = $area[2];
				}
			}elseif($value[0] == 'project'){
				if ($value[1] == 0 || $value[1] == '')
				{
					$project = '';
				}else{
					$project = $value[1];
				}
			}
		}

		if (!isset($propertyFor))
		{
			$propertyFor = '';
		}
		if (!isset($priceLowerLimit))
		{
			$priceLowerLimit = 0;
			$priceUpperLimit = 100000000000000000;
		}
		if (!isset($areaLowerLimit))
		{
			$areaLowerLimit = 0;
			$areaUpperLimit = 1000000000000000000;
		}

		$searchParams = array(
			'lob' => '',
			'PropertyType' => $type,
			'City' => $city,
			'District' => $district,
			'PropertyFor' => $propertyFor,
			'PriceLowerLimit' => $priceLowerLimit,
			'PriceUpperLimit' => $priceUpperLimit,
			'AreaLowerLimit' => $areaLowerLimit,
			'AreaUpperLimit' => $areaUpperLimit, 
			'generalFlag' => false
		);		
	    
		$data['searchResults'] = $this->database->search($searchParams);
		if (is_array($data['searchResults']))
		{
			if ($data['searchResults']['totalResults'] > 0)
			{
				$data['totalResults'] = $data['searchResults']['totalResults'];
				$data['searchResults'] = $data['searchResults']['results'];
				$data['images'] = array();
				foreach ($data['searchResults'] as $property) {
					$data['images'][$property->PropertyId] = $this->database->getPropertyImages($property->PropertyId);
					if ((!is_array($data['images'][$property->PropertyId]) || count($data['images'][$property->PropertyId]) < 1)) {
						$data['images'][$property->PropertyId]['src'] = 'No_image.svg';
					}

				}
			}else{
				$data['resultCount'] = 0;
				$data['totalResults'] = 0;
				$data['noResults'] = "Sorry, there were no results that match your criteria";
			}

		    if($insertProcess)
		    {
		    	$body = $this->load->view('newsletter_properties', $data, true);
		    	if(filter_var($name, FILTER_VALIDATE_EMAIL)) {
			        $this->smtpmailer('Property Alert',$body,$name, '');
			    }
			    else {
			       $user = $this->user->getUserByUsername($name);
			       $result = $this->smtpmailer('Property Alert',$body,$user->email, '');
			    }
		    }
		    else
				exit();
		}
		
	}

	public function getDistricts()
	{
		$data = $this->init();
		$data['districts'] = $this->database->getDistricts($_POST['id']);
		$data['key'] = $_POST['key'];
		if($_POST['lang'] == 'ar')
			$language='arabic/';
		else
			$language='';
		if ($data['districts'] != 0)
		{
			$this->load->view($language.'districtselect', $data);
		}
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
		  // 'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_host' => 'ssl://mail.cb-egypt.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'inquiries@cb-egypt.com', // change it to yours
		  'smtp_pass' => 'Iq3214560', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
			);

		  $this->load->library('email', $config);
		  $this->email->set_newline("\r\n");
		  $this->email->from('inquiries@cb-egypt.com'); // change it to yours
		  $this->email->to($to); // change it to yours
		  $this->email->subject($subject);
		  $this->email->message($body);
		  if ($attachment != '')
		  {
		  		if (is_array($attachment)){
		  			foreach ($attachment as $value) {
		  				$this->email->attach($value);
		  			}
		  		}else{
		  			$this->email->attach($attachment);
		  		}
	  			
		  }
		  

		  	if($this->email->send())
		  	{	
				return true;
			}
			else
			{
				show_error($this->email->print_debugger());
			}
}

function trainingCenter()
{
	$this->load->model('course');
	$data = $this->init();
	$data['courses'] = $this->course->getCourses();
	$data['districts'] = $this->database->getAllDistricts();
	$data['title'] = 'ColdWell Banker | Training Academy';
	$this->load->view($data['languagePath'].'training_center', $data);
}

function forgotPassword()
{
	$this->load->model('user');
	$data = $this->init();
	$data['title'] = 'Coldwell Banker | Forgot Password';
	if ($data['language'] !== 'en' && $data['language'] !== 'ar'){
		$language = 'en';
	}
	else{
		$language = $data['language'];
	}
	if(isset($_POST['submit'])){
		$email =$this->user->getUserByEmail($_POST['email']);
		if ($email){
			if ($this->user->insertTempEmail($email->id,$_POST['email'],3))
			{
				$this->forgotPasswordValidation($this->db->insert_id(), $language);
				$data['resetPasswordMessage'] = 'Please login to your email to reset password.';	
			}
			
		}
	}
	$this->load->view($data['languagePath'].'forgot_password', $data);
}

function resetpassword()
{
	$this->load->model('user');
	$data = $this->init();
	$data['title'] = 'Coldwell Banker | Reset Password';
	$token = $this->uri->uri_string;
	$token = explode('resetpassword/', $token);
	$token = $token[1];

	$tokenInfo = $this->user->checkToken($token);
	$data['token'] = $tokenInfo->token;
	$data['user_email'] = $tokenInfo->email;
	if ($tokenInfo->is_valid == 1)
	{
		$date = explode(' ', $tokenInfo->date_joined);
		$date = explode('-', $date[0]);
		$today = date('j');

		$diff = $today - $date[2];
		if ($diff < 1)
		{
			if (isset($_POST['submit'])){
				if (empty($_POST['password'])){
					$data['resetError'] = 'Please enter new password';
				}elseif(empty($_POST['confrimpassword'])){
					$data['resetError'] = 'Please confirm password';
				}
				else{
					$data['user'] = $this->user->getUserByEmail($data['user_email']);
					$update = $this->user->updatePassword($data['user']->id,$_POST['password']);
					if ($update)
					{
						$this->startSession($data['user']);
						redirect('home');
					}
				}
			}
		}
	}
	$this->load->view($data['languagePath'].'reset_password', $data);
}

	function getPropertyTypes()
	{
		$lob = $_POST['lob'];
		// $this->load->model('service');
		$data = $this->init();
		$data['propertyType'] = $this->database->getPropertyTypes($lob);
		$data['key'] = $_POST['key'];
		if ($data['propertyType'] != 0)
		{
			$this->load->view('propertyselect', $data);
		}
	}

	function offices()
	{
		$data = $this->init();
		$this->load->model('office');
		$data['title'] = 'ColdWell Banker | Offices';
		$data['offices'] = $this->office->getOffices();
		$data['phones'] = $this->office->getAllPhones();

		$count1 = 0;
		$count2 = 0;
		$count3 = 0;
		if(is_array($data['phones'])){
			foreach ($data['phones']  as $key => $phone) {
				if ($phone->category == 'residential')
				{
					$data['phonesResidential'][$phone->office_id][$count1] = $phone->phone;
					$count1++;
				}elseif ($phone->category == 'commercial') {
					$data['phonesCommercial'][$phone->office_id][$count2] = $phone->phone;
					$count2++;
				}elseif ($phone->category == 'hotline') {
					$data['phonesHotline'][$phone->office_id][$count3] = $phone->phone;
					$count3++;
				}
			}
		}
		
		if (isset($data['phonesResidential'])) {
			foreach ($data['phonesResidential'] as $key => $phones) {
				if (count($phones) > 1)
				{
					$count = 0;
					$phoneArray = array();
					foreach ($phones as $key2 => $phone) {
						$phoneArray[$count] = $phone;
						$count++;
					}
					$data['phonesResidential'][$key] = $phoneArray;
				}else{
					foreach ($phones as $key3 => $phone) {
						$data['phonesResidential'][$key] = array(0=>$phone);
					}
				}
			}
		}
		
		if (isset($data['phonesCommercial']))
		{
			foreach ($data['phonesCommercial'] as $key => $phones) {
				if (count($phones) > 1)
				{
					$count = 0;
					$phoneArray = array();
					foreach ($phones as $key2 => $phone) {
						$phoneArray[$count] = $phone;
						$count++;
					}
					$data['phonesCommercial'][$key] = $phoneArray;
				}else{
					foreach ($phones as $key3 => $phone) {
						$data['phonesCommercial'][$key] = array(0=>$phone);
					}
				}
			}
		}
		

		if (isset($data['phonesHotline']))
		{
			foreach ($data['phonesHotline'] as $key => $phones) {
				if (count($phones) > 1)
				{
					$count = 0;
					$phoneArray = array();
					foreach ($phones as $key2 => $phone) {
						$phoneArray[$count] = $phone;
						$count++;
					}
					$data['phonesHotline'][$key] = $phoneArray;
				}else{
					foreach ($phones as $key3 => $phone) {
						$data['phonesHotline'][$key] = array(0=>$phone);
					}
				}
			}
		}

		$data['districts'] = $this->database->getAllDistricts();

		if (isset($_POST['submit']))
		{
			if(!isset($data['loggedIn']))
			{
				if (empty($_POST['contact_firstName']))
				{
					$data['contactError'] = $this->lang->line('offices_missing_firstName');
				}elseif (empty($_POST['contact_lastName'])) {
					$data['contactError'] = $this->lang->line('offices_missing_lastName');
				}elseif (empty($_POST['contact_email'])) {
					$data['contactError'] = $this->lang->line('offices_missing_email');
				}elseif (empty($_POST['contact_phone'])) {
					$data['contactError'] = $this->lang->line('offices_missing_phone');
				}elseif (empty($_POST['contact_subject'])) {
					$data['contactError'] = $this->lang->line('offices_missing_subject');
				}else{

					$params = array(
						'first_name' => $_POST['contact_firstName'],
						'last_name' => $_POST['contact_lastName'],
						'email' => $_POST['contact_email'],
						'phone' => $_POST['contact_phone'],
						'comments' => $_POST['contact_subject'], 
						'propertyId' => ''
						);

					$interests = array();
					if ($this->user->insertContactInformation($params, $interests)){
						echo 1;
						$body = 'Name: '.$_POST['contact_firstName'].' '.$_POST['contact_lastName'].'<br>
								E-mail: '.$_POST['contact_email'].'<br>
								Phone: '.$_POST['contact_phone'].'<br>
								Comments: '.$_POST['contact_subject'];
						$this->smtpmailer('Contact Request',$body,'customerservice@cb-egypt.com', '');
						// $data['contactSuccess'] = $this->lang->line('offices_contact_success');
					}else{
						echo 0;
						// $data['contactError'] = $this->lang->line('offices_contact_error');
					}
				}
			}else{
				$firstname = $data['user']->first_name;
				$lastname = $data['user']->last_name;
				$phone = $data['user']->phone;
				$email = $data['user']->email;
				$params = array(
						'first_name' => $firstname,
						'last_name' => $lastname,
						'email' => $email,
						'phone' => $phone,
						'comments' => $_POST['contact_subject'], 
						'propertyId' => ''
						);

				$interests = array();
				if ($this->user->insertContactInformation($params, $interests)){
					echo 1;
					$body = 'Name: '.$firstname.' '.$lastname.'<br>
							E-mail: '.$email.'<br>
							Phone: '.$phone.'<br>
							Comments: '.$_POST['contact_subject'];
					$this->smtpmailer('Contact Request',$body,'customerservice@cb-egypt.com', '');
				}else{
					echo 0;
				}
			}
			
		}
		$this->load->view($data['languagePath'].'offices', $data);
	}

	function insertContact()
	{
		$this->load->model('user');
		$data = $this->init();
		$params = array(
			'first_name' => $_POST['firstname'],
			'last_name' => $_POST['lastname'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'comments' => $_POST['comments'], 
			'propertyId' => $_POST['propertyID']
			);
		if ($this->user->insertContactInformation($params, $_POST['interests'])){
			echo 1;
			$body = 'Name: '.$_POST['firstname'].' '.$_POST['lastname'].'<br>
					E-mail: '.$_POST['email'].'<br>
					Phone: '.$_POST['phone'].'<br>
					PropertyID: '.$_POST['propertyID'].'<br>
					Comments: '.$_POST['comments'];
			$this->smtpmailer('Property Inquiries',$body,'customerservice@cb-egypt.com', '');
		}else{
			echo 0;
		}
	}

	function insertFavorite()
	{
		$params = array(
			'user_id' => $_POST['userID'],
			'property_id' => $_POST['propertyID']
		);
		if ($this->user->insertFavorite($params)){
			echo 1;
		}else{
			echo 0;
		}
	}

	function deleteFavorite()
	{
		$userID = $_POST['userID'];
		$propertyID = $_POST['propertyID'];
		if ($this->user->deleteFavorite($userID, $propertyID)){
			echo 1;
		}else{
			echo 0;
		}
	}



	function about()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | About Us';
		$data['districts'] = $this->database->getAllDistricts();
		$this->load->view($data['languagePath'].'about', $data);
	}
	function franchise()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Franchise';
		$data['districts'] = $this->database->getAllDistricts();
		$this->load->view($data['languagePath'].'franchise', $data);
	}

	function displayOffice()
	{
		$data = $this->init();
		$this->load->model('office');
		$data['currentLang'] = $_POST['lang'];
		$data['districts'] = $this->database->getAllDistricts();
		$data['officeInfo'] = $this->office->getOfficeByID($_POST['id']);
		$data['phones'] = $this->office->getOfficePhones($_POST['id']);
		$count1 = 0;
		$count2 = 0;
		$count3 = 0;
		if(is_array($data['phones'])){
			foreach ($data['phones']  as $key => $phone) {
				if ($phone->category == 'residential')
				{
					$data['phonesResidential'][$count1] = $phone->phone;
					$count1++;
				}elseif ($phone->category == 'commercial') {
					$data['phonesCommercial'][$count2] = $phone->phone;
					$count2++;
				}elseif ($phone->category == 'hotline') {
					$data['phonesHotline'][$count3] = $phone->phone;
					$count3++;
				}
			}
		}
		$this->load->view('displayOffice', $data);
	}

	function displayMap()
	{
		$data = $this->init();
		$this->load->model('office');
		$data['officeInfo'] = $this->office->getOfficeByID($_POST['id']);
		echo $data['officeInfo']->address_en;
	}

	function newsletterSingle()
	{
		$data = $this->init();
		$this->load->view('newsletter_single', $data);
	}

	function newsletterBanner()
	{
		$data = $this->init();
		$this->load->view('newsletter_banner', $data);
	}

	function newsletterProperties()
	{
		$data = $this->init();
		$this->load->view('newsletter_properties', $data);
	}

	// function createExcel()
	// {
	// 	$this->load->library('excel');
	// 	$this->load->model('service');
	// 	$this->excel->setActiveSheetIndex(0);
	// 	$categories = array(
	// 		0 => 'Residential', 
	// 		1 => 'Commercial'
	// 		);
	// 	$propertyType1 = $this->service->Getpropertytypes(1);
	// 	$propertyType2 = $this->service->Getpropertytypes(2);
	// 	$districts = $this->service->getAllDistricts();
	// 	$contractTypes = array(
	// 		0 => 'Sale',
	// 		1 => 'Rent'
	// 		);
	// 	$alphas = range('A', 'Z');
	// 	// printme(phpinfo());exit();
	// 	$count = 1;
	// 	foreach ($categories as $category) {
	// 		if($category == 'Residential')
	// 		{
	// 			foreach ($propertyType1 as $type1) {

	// 				foreach ($districts as $district) {
						
	// 					foreach ($contractTypes as $contractType) {

	// 						$this->excel->getActiveSheet()->SetCellValue('A'.$count, $category);
	// 						$this->excel->getActiveSheet()->SetCellValue('B'.$count, $type1);
	// 						$this->excel->getActiveSheet()->SetCellValue('C'.$count, $district['name']);
	// 						$this->excel->getActiveSheet()->SetCellValue('D'.$count, $contractType);
	// 						$count++;
	// 					}
	// 				}
	// 			}
	// 		}else{
	// 			foreach ($propertyType1 as $type2) {

	// 				foreach ($districts as $district) {
						
	// 					foreach ($contractTypes as $contractType) {

	// 						$this->excel->getActiveSheet()->SetCellValue('A'.$count, $category);
	// 						$this->excel->getActiveSheet()->SetCellValue('B'.$count, $type1);
	// 						$this->excel->getActiveSheet()->SetCellValue('C'.$count, $district['name']);
	// 						$this->excel->getActiveSheet()->SetCellValue('D'.$count, $contractType);
	// 						$count++;
	// 					}
	// 				}
	// 			}
	// 		}
			
	// 	}
	// 	$this->excel->save(getcwd().'/application/static/input2.xls');
	// 	exit();
	// 	// $this->excel->getActiveSheet()->SetCellValue('B2', "whatever");
		
		
	// }


	function cron()
	{
		$this->load->model('cronjobs');
		$this->cronjobs->cronJob();
	}
}