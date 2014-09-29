<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$data['session'] = $this->session;
		$tmp = $this->session->flashdata('loginError');

		if($tmp){
			$data['loginError'] = $this->session->flashdata('loginError');
			$data['login_username'] = $this->session->flashdata('login_username');
			$data['loginErrorType'] = $this->session->flashdata('loginErrorType');
		}

			$data = $this->init();

		$this->load->model('service');
		$this->load->model('content');

		$data['slides'] = $this->content->getActiveSliders();
		$data['cities'] = $this->service->getCities();
		// printme($this->service->Search());
		$data['serviceTypes'] = $this->service->getServiceType();
		$data['propertyType1'] = $this->service->Getpropertytypes(1);
		$data['propertyType2'] = $this->service->Getpropertytypes(2);

		// printme($data['propertyType1']);exit();


		$this->load->view($data['languagePath'].'home',$data);
	}

	public function authenticate()
	{
		$this->load->model('user');
		$username = $_POST['username'];
		$password = $_POST['password'];
		$currentUrl = $_POST['currentUrl'];
		$user = $this->user->getUserByUsername($username);
		if($user){
			$login = $this->user->login($user->username,$password);
			if($login){
				$this->startSession($user);
				redirect($currentUrl);
				exit();
			}else{
				// $data['loginError'] = 'Password is not correct';
				// $data['loginErrorType'] = '1';
				 $this->session->set_flashdata('loginError', 'Password is not correct');
				 $this->session->set_flashdata('loginErrorType', '1');
			}
		}else{
			// $data['loginError'] = 'Username does not exsist';
			// $data['loginErrorType'] = '2';
			 $this->session->set_flashdata('loginError', 'Username does not exist');
			 $this->session->set_flashdata('loginErrorType', '2');

		}
		//printme($currentUrl);exit();
		$this->session->set_flashdata('login_username', $username);
		redirect($currentUrl);

	}



	public function startSession($user)
	{
		$this->session->set_userdata($user);
		// printme($user->id);exit();
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
		redirect($_POST['currentUrl']);
	}

	public function register ()
	{

		$this->load->model('user');
		$data = $this->init();
		// printme(base_url().$data['language']);exit();
		if(isset($_POST['submit'])){
		
			$firstname = $_POST['first_name'];
			$lastname = $_POST['last_name'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$location	 = $_POST['location'];
			$phone	 = $_POST['phone'];
			$password = $_POST['password'];
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
						'phone' => $_POST['phone'],
						'password' => $_POST['password'],
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
		$this->smtpmailer('Welcome To ColdWell Banker',$body,$token->email);
	}

	public function emailUpdateValidation($id)
	{	
		$token = $this->user->getToken($id);
		//printme($token);exit();
		$body = '
		Please Validate updating your email by clicking on the following link 
		</br>
		 <a href="'.base_url().'validate/'.$token->token.'"> Verify Email Update</a>
		';
		$this->smtpmailer('Email Update Verification',$body,$token->email);
	}

	public function forgotPasswordValidation($id, $language)
	{
		$token = $this->user->getToken($id);
		// printme($token);exit();
		$body = '
		Please click on the following link to reset your password.
		</br>
		 <a href="'.base_url().$language.'/resetpassword/'.$token->token.'"> Reset Password</a>
		';
		$this->smtpmailer('Reset Password',$body,$token->email);
	}

	public function profile()
	{
		$this->load->model('user');
		$username = $this->session->userdata('username');
		$data = $this->init();
		if(!isset($data['user']))
			redirect('home');

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
							// printme($data['user']->id);exit();

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
		$this->load->model('user');
		$this->load->model('property');
		$this->load->model('service');
		$username = $this->session->userdata('username');
		$data = $this->init();

		
		if (isset($_POST['submit'])){
			$data['params'] = $_POST;
			// printme($_FILES);exit();
			if (empty($_POST['area']) || $_POST['area'] == 'Select Area'){
				$data['insertError'] = $this->lang->line('shareProperty_missing_area');
			}elseif (empty($_POST['type']) || $_POST['type'] == 'Select Type') {
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

				
				// $city = $this->service->getCityByID($_POST['city']);
				// $district = $this->service->getDistrictByID($_POST['city'],$_POST['district']);


				$params = array ('user_id' => $data['user']->id,
					'area' => $_POST['area'],
					'type' => $_POST['type'],
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
							
							// printme($_FILES);exit();

							foreach ($images as $image) {
								$fileExtension = explode('.',$image['name']);
								$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
								$_FILES['userfile']['tmp_name'] = $image['tmp_name'];
								$_FILES['userfile']['size'] = $image['size'];
								$params['image_url'] = $_FILES['userfile']['name'];
								if (!isset($data['imageFlag'])){
									$upload = uploadme($this);
									if(!isset($upload['error'])){
										$this->load->model('property');
										$this->property->insertImage($params);
										$data['insertProcess'] = true;
									}else{
										$this->property->deleteProperty($params['property_id']);
										$data['insertProcess'] = false;
										$data['imageFlag'] = true; 
									}
								}
								
							}
						}
						// $data['insertProcess'] = true;
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
			$params['user_identifier'];
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

	public function viewAllProperties ()
	{
		$data = $this->init();
		$this->load->model('property');
		$this->load->model('service');
		$data['cities'] = $this->service->getCities();

		// printme($_POST);

		if (isset($_POST))
		{
			if ($_POST['type'] == 0)
			{
				$type = '';
			}else{
				$type = $_POST['type'];
				// $type = $this->service->getPropertyTypeByID($_POST['lob'], $_POST['type']);
			}

			if ($_POST['city'] == 0)
			{
				$boxLocation = '';
			}
			else{
				if ($_POST['districtName'] == 0)
				{
					$boxLocation = $this->service->getCityByID($_POST['city']);
				}
				else{
					$boxLocation = $this->service->getDistrictByID($_POST['city'], $_POST['districtName']);
				}
			}

			if ($_POST['contractType'] == 0)
			{
				$propertyFor = '';

			}else{
				$propertyFor = $this->service->getServiceTypeByID($_POST['contractType']);
			}

			if ($_POST['price'] == 0)
			{
				$priceLowerLimit = 1;
				$priceUpperLimit = 1000000000000000;
			}else{
				$price = explode(' - ', $_POST['price']);
				$priceLowerLimit = $price[0];
				$priceUpperLimit = $price[1];
			}

			if ($_POST['area'] == 0)
			{
				$areaLowerLimit = 1;
				$areaUpperLimit = 100000000;
			}else{
				$area = explode(' - ', $_POST['area']);
				$areaLowerLimit = $area[0];
				$areaUpperLimit = $area[1];
			}

			$searchParams = array(
				'PropertyType' => $type,
				'BoxLocation' => $boxLocation,
				'PropertyFor' => $propertyFor,
				'PriceLowerLimit' => $priceLowerLimit,
				'PriceUpperLimit' => $priceUpperLimit,
				'AreaLowerLimit' => $areaLowerLimit,
				'AreaUpperLimit' => $areaUpperLimit
			);

			$data['searchResults'] = $this->service->Search($searchParams);
			$data['searchResults'] = $data['searchResults'][0];
			printme($data['searchResults']);exit();
		}

		$this->load->view($data['languagePath'].'view_all_properties',$data);
	}

	public function compareProperties ()
	{
		$data = $this->init();
		$this->load->model('property');
		$this->load->model('service');
		$this->load->view($data['languagePath'].'compare_properties',$data);
	}

	public function propertyDetails ()
	{
		$data = $this->init();
		$this->load->model('property');
		$this->load->view($data['languagePath'].'property_details',$data);
	}

	public function careers ()
	{
		$data = $this->init();
		$this->load->view($data['languagePath'].'careers',$data);
	}

	public function uploadCV ()
	{
		$data = $this->init();
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
				}
			}else{
				$uploadError = uploadme($this);
				$data['uploadError'] = $uploadError['error'];
			}

			
			
		}

		$this->load->view($data['languagePath'].'upload_cv',$data);
	}

	public function joinUs ()
	{
		$data = $this->init();
		$this->load->model('vacancy');
		$data['vacancies'] = $this->vacancy->getVacancies();
		$this->load->view($data['languagePath'].'join_us',$data);
	}

	public function marketIndex ()
	{
		$data = $this->init();
		$this->load->view($data['languagePath'].'market_index',$data);
	}

	public function auction ()
	{
		$data = $this->init();
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
			$this->load->model('service');
			// $data['cities'] = $this->service->getCities();
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
						$data['uri'] = '';
					}
				}
				elseif ($explodeEn[0] == $uri){
					$data['uri'] = explode('ar/', $uri);
					if(isset($data['uri'][1])){
						$data['uri'] = $data['uri'][1];
					}else{
						$data['uri'] = '';
					}
				}
			}
			else{
				$data['uri'] = explode('en/', $uri);
				if(isset($data['uri'][1])){
					$data['uri'] = $data['uri'][1];
				}else{
					$data['uri'] = '';
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
						$data['uri'] = '';
					}
				}
				elseif ($explodeAr[0] == $uri){
					$data['uri'] = explode('en/', $uri);
					if(isset($data['uri'][1])){
						$data['uri'] = $data['uri'][1];
					}else{
						$data['uri'] = '';
					}
				}



				// $data['uri'] = explode('ar/', $uri);
				// if(isset($data['uri'][1])){
				// 	$data['uri'] = $data['uri'][1];
				// }else{
				// 	$data['uri'] = '';
				// }
			}
			else{
				$data['uri'] = explode('en/', $uri);
				if(isset($data['uri'][1])){
					$data['uri'] = $data['uri'][1];
				}else{
					$data['uri'] = '';
				}
			}
		}
		else{
			$data['uri'] = '';
		}


		$data['language'] = $this->uri->segment(1);
		$data['languagePath'] = '';
		if($data['language'] == 'ar')
			$data['languagePath'] = 'arabic/';

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
		// $this->lang->load('viewallproperties', $lang);
		// $this->lang->load('viewallproperties', $lang);
	}

	public function insertPropertyAlert()
	{
		printme($_POST);
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
	    if($insertProcess)
	    	echo 'true';
	    else
	    	echo 'false';
	    
			exit();
	}

	public function getDistricts()
	{
		$this->load->model('service');
		$data = $this->init();
		$data['districts'] = $this->service->getDistricts($_POST['id']);
		$data['key'] = $_POST['key'];

		if ($data['districts'] != 0)
		{
			$this->load->view('districtselect', $data);
		}
	}


		function checkmail($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
	       return true;
	   else
	   	return false;
	    
	}


function smtpmailer($subject,$body,$to) { 

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


		  if($this->email->send())
			return true;
		 else
			{
			 show_error($this->email->print_debugger());
			}
}

function trainingCenter()
{
	$data = $this->init();
	$this->load->view($data['languagePath'].'training_center', $data);
}

function forgotPassword()
{
	$this->load->model('user');
	$data = $this->init();
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

	function offices()
	{
		$data = $this->init();
		$this->load->model('office');
		$data['offices'] = $this->office->getOffices();
		$this->load->view($data['languagePath'].'offices', $data);
	}

	function displayOffice()
	{
		$data = $this->init();
		$this->load->model('office');
		$data['currentLang'] = $_POST['lang'];
		$data['officeInfo'] = $this->office->getOfficeByID($_POST['id']);
		$this->load->view('displayOffice', $data);
	}

	function displayMap()
	{
		$data = $this->init();
		$this->load->model('office');
		$data['officeInfo'] = $this->office->getOfficeByID($_POST['id']);
		echo $data['officeInfo']->address_en;
		//printme($data['officeInfo']->address_en);exit();
		//$this->load->view('displayMap', $data);
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
}