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

		//if(isset($this->session->userdata['id'])){
			$data = $this->init();
		//}

		$this->load->model('service');
		$data['cities'] = $this->service->getCities();

		$this->load->view($data['languagePath'].'home',$data);
	}

	public function authenticate()
	{
		$this->load->model('user');
		$username = $_POST['username'];
		$password = $_POST['password'];

		$user = $this->user->getUserByUsername($username);
		if($user){
			$login = $this->user->login($user->username,$password);
			if($login){
				$this->startSession($user);
				redirect('home');
				exit();
			}else{
				$this->session->set_flashdata('loginError', 'Password is not correct');
				$this->session->set_flashdata('loginErrorType', '1');
			}
		}else{
			$this->session->set_flashdata('loginError', 'Username does not exsist');
			$this->session->set_flashdata('loginErrorType', '2');

		}

		$this->session->set_flashdata('login_username', $username);
		redirect('home');
	}



	public function startSession($user)
	{
		$this->session->set_userdata($user);
	}


	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata();
	}

	public function register ()
	{

		$this->load->model('user');
		$data = array();

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
						'password' => $_POST['password']
						);
					if ($this->user->insertUser($userData))
					{
						$user = $this->user->getUserByUsername($userData['username']);
						$this->startSession($user);

						if (isset($_POST['newsletter']))
						{	
							$params['user_identifier'] = $this->db->insert_id();
							$this->user->insertNewsletterData($params);
						}
						

						redirect('home');
					}
				}
			}
		}
		$this->load->view('register',$data);
	}

	public function profile()
	{
		$this->load->model('user');
		$username = $this->session->userdata('username');
		$data = $this->init();

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
					$update = $this->user->updateUser($data['user']->id, $params);
					$data['user'] = $this->user->getUserByUsername($username);
					$this->startSession($data['user']);
					if($update){
						$data['update'] = true;
					}else{
						$data['update'] = false;
					}
				}

				if ($_POST['email'] != $this->session->userdata('email'))
				{
					$this->user->insertTempEmail($this->session->userdata('id'),$_POST['email']);
					$data['emailUpdateMessage'] = 'Please login to your email to confirm email update.';
				}

			}
		}
		$this->load->view('profile', $data);
	}

	public function validateToken()
	{
		$this->load->model('user');
		$token = $this->uri->uri_string;
		$token = explode('validate/', $token)[1];
		$tokenInfo = $this->user->checkToken($token);
		if ($tokenInfo->is_valid == 1)
		{
			$date = explode(' ', $tokenInfo->date_joined);
			$date = explode('-', $date[0]);
			$today = date('j');

			$diff = $today - $date[2];
			if ($diff < 1)
			{
				$params = array('email' => $tokenInfo->email);
				$emailUpdate = $this->user->updateUser($tokenInfo->user_id, $params);
				redirect('home');
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
			
			if (empty($_POST['area']) || $_POST['area'] == 'Select Area'){
				$data['insertError'] = 'Please select area';
			}elseif (empty($_POST['type']) || $_POST['type'] == 'Select Type') {
				$data['insertError'] = 'Please select type';
			}elseif (empty($_POST['price']) || $_POST['price'] == 'Select Price') {
				$data['insertError'] = 'Please select price';
			}elseif (empty($_POST['city']) || $_POST['city'] == 'Select City') {
				$data['insertError'] = 'Please select city';
			}elseif (empty($_POST['district']) || $_POST['district'] == 'Select District') {
				$data['insertError'] = 'Please select district';
			}elseif (empty($_POST['address'])) {
				$data['insertError'] = 'Please enter property address';
			}elseif (empty($_POST['features'])) {
				$data['insertError'] = 'Please enter property features';
			}else{

				
				$city = $this->service->getCityByID($_POST['city']);
				$district = $this->service->getDistrictByID($_POST['city'],$_POST['district']);


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
							
							foreach ($images as $image) {
								$fileExtension = explode('.',$image['name']);
								$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
								$_FILES['userfile']['tmp_name'] = $image['tmp_name'];
								$_FILES['userfile']['size'] = $image['size'];
								$params['image_url'] = $_FILES['userfile']['name'];
								if(uploadme($this)){
									$this->load->model('property');
									$this->property->insertImage($params);
									$data['insertProcess'] = true;
								}else{
									$this->property->deleteProperty($params['property_id']);
									$data['insertProcess'] = false;
								}
							}
						}
						$data['insertProcess'] = true;
				}else{
					$data['insertError'] = "Error Inserting Property Data";
				}
				
			}
		}
		$this->load->view('share_property', $data);
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
		// printme($data);exit()
		$this->load->view('view_all_properties',$data);
	}

	public function propertyDetails ()
	{
		$data = $this->init();
		$this->load->model('property');
		$this->load->view('property_details',$data);
	}

	public function careers ()
	{
		$data = $this->init();
		$this->load->view('careers',$data);
	}

	public function uploadCV ()
	{
		$data = $this->init();
		$this->load->model('user');


		$vacancy_id = $this->uri->uri_string;
		if($vacancy_id == 'uploadCV'){
			$vacancy_id = 11;

		}else{
			$vacancy_id = explode('upload/', $vacancy_id)[1];
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
					$data['uploadError'] = 'Please insert first name';
				}elseif (empty($_POST['uploadcv_app_lastname'])) {
					$data['uploadError'] = 'Please insert last name';
				}elseif (empty($_POST['uploadcv_app_email'])) {
					$data['uploadError'] = 'Please insert email';
				}elseif (!isset($_FILES)){
					$data['uploadError'] = 'Please choose file to be uploaded';
				}else{
					$firstname = $_POST['uploadcv_app_firstname'];
					$lastname = $_POST['uploadcv_app_lastname'];
					$id = $_POST['uploadcv_app_email'];
					$data['params'] = $_POST;
				}
			}
			
			$filename = explode('.', $_FILES['userfile']['name'])[0];
			$ext = explode('.', $_FILES['userfile']['name'])[1];
			$_FILES['userfile']['name'] = $filename.'_'.time().'.'.$ext;
			$this->config->set_item('upload_path',getcwd().'/application/static/upload/careers');
			$this->config->set_item('allowed_types','pdf|doc|docx');
			
			if(isset(uploadme($this)['upload_data'])){
				$params = array('user_identifier' => $id,
				'first_name' => $firstname,
				'last_name' => $lastname,
				'vacancy_id' => $vacancy_id,
				'cv' => $_FILES['userfile']['name']
				);
				if ($this->vacancy->insertEnrollment($params))
				{
					$data['uploadSuccess'] = 'CV uploaded successfully';
				}
			}else{
				$data['uploadError'] = uploadme($this)['error'];
			}

			
			
		}

		$this->load->view('upload_cv',$data);
	}

	public function joinUs ()
	{
		$data = $this->init();
		$this->load->model('vacancy');
		$data['vacancies'] = $this->vacancy->getVacancies();
		$this->load->view('join_us',$data);
	}

	public function marketIndex ()
	{
		$data = $this->init();
		$this->load->view('market_index',$data);
	}

	public function auction ()
	{
		$data = $this->init();
		$data['auctions'] = $this->property->getAuctions();
		$data['recentAuctions'] = $this->property->getRecentAuctions();
		$data['upcomingAuctions'] = $this->property->getUpcomingAuctions();
		$this->load->view('auction',$data);
	}

	public function init()
	{	
		$data = array();
		if(isset($this->session->userdata['id'])){
			$this->load->model('user');
			$data['loggedIn'] = true;
			$data['user'] = $this->user->getUserByUsername($this->session->userdata['username']);
			$this->load->model('service');
			$data['cities'] = $this->service->getCities();
			if ($this->user->is_subscribed($data['user']->id))
			{
				$data['is_subscribed'] = true;
			}
			else{
				$data['is_subscribed'] = false;
			}
			return $data;
		}

		$data['language'] = $this->uri->segment(1);
		if($data['language'] == 'ar')
			$data['languagePath'] = 'arabic/';
		else
			$data['languagePath'] = '';

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
		$data['districts'] = $this->service->getDistricts($_POST['id']);
		$data['key'] = $_POST['key'];
		if ($data['districts'] != 0)
		{
			$this->load->view('districtselect', $data);
		}
	}



}