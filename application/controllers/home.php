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
		$data['cities'] = $this->service->getCities();
		// printme($data);exit();
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
			 $this->session->set_flashdata('loginError', 'Username does not exsist');
			 $this->session->set_flashdata('loginErrorType', '2');

		}
		//printme($currentUrl);exit();
		$this->session->set_flashdata('login_username', $username);
		redirect($currentUrl);

	}



	public function startSession($user)
	{
		$this->session->set_userdata($user);
	}


	public function logout()
	{	
		$this->session->sess_destroy();
		$this->session->unset_userdata();
		redirect($_POST['currentUrl']);
	}

	public function register ()
	{

		$this->load->model('user');
		$data = $this->init();
		// printme($data);exit();
		

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
						
						redirect(base_url().$data['language']);
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

	public function forgotPasswordValidation($id)
	{
		$token = $this->user->getToken($id);
		// printme($token);exit();
		$body = '
		Please click on the following link to reset your password.
		</br>
		 <a href="'.base_url().'resetpassword/'.$token->token.'"> Reset Password</a>
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
		// printme($data['languagePath']);exit();
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
			$vacancy_id = explode('uploadCV/', $vacancy_id)[1];

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
			$this->load->model('service');
			$data['cities'] = $this->service->getCities();
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
		if(strpos($uri, 'ar') !== false || strpos($uri, 'en') !== false ){
				
			if(strpos($uri, 'ar')!== false)
				$data['uri'] = explode('ar/', $uri);
			else
				$data['uri'] = explode('en/', $uri);

			if(isset($data['uri'][1]))
				$data['uri'] = $data['uri'][1];
			else
				$data['uri'] = $data['uri'][0];

		}else{
			$data['uri'] = $this->uri->uri_string;
		}
		

		//printme($data['uri']);exit();

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

function forgotPassword()
{
	$this->load->model('user');

	if(isset($_POST['submit'])){
		$email =$this->user->getUserByEmail($_POST['email']);
		if ($email){

			if ($this->user->insertTempEmail($email->id,$_POST['email'],3))
			{
				$this->forgotPasswordValidation($this->db->insert_id());
				$data['resetPasswordMessage'] = 'Please login to your email to reset password.';	
				// printme($email);exit();
			}
			
		}
	}
	$this->load->view('forgot_password');
}

function resetpassword()
{
	$this->load->model('user');
	$token = $this->uri->uri_string;
	$token = explode('resetpassword/', $token)[1];
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
	$this->load->view('reset_password', $data);
}

}