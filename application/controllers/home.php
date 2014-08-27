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

		if(isset($this->session->userdata['id'])){
			$data['loggedIn'] = true;
			$this->load->model('user');
			$data['user'] = $this->user->getUserByUsername($this->session->userdata['username']);
		}

		$this->load->view('home',$data);
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
		if(isset($username)){
			$data['loggedIn'] = 1;
		}

		$data['user'] = $this->user->getUserByUsername($username);

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
		$username = $this->session->userdata('username');
		if(isset($username)){
			$data['loggedIn'] = 1;
		}

		$data['user'] = $this->user->getUserByUsername($username);
		// printme($data['user']->id);
		
		if (isset($_POST['submit'])){
			$data['params'] = $_POST;
			if (empty($_POST['area']) || $_POST['area'] == 'Select Area'){
				$data['areaError'] = 'Please select area';
			}elseif (empty($_POST['type']) || $_POST['type'] == 'Select Type') {
				$data['typeError'] = 'Please select type';
			}elseif (empty($_POST['price']) || $_POST['price'] == 'Select Price') {
				$data['priceError'] = 'Please select price';
			}elseif (empty($_POST['city']) || $_POST['city'] == 'Select City') {
				$data['cityError'] = 'Please select city';
			}elseif (empty($_POST['district']) || $_POST['district'] == 'Select District') {
				$data['districtError'] = 'Please select district';
			}elseif (empty($_POST['address'])) {
				$data['addressError'] = 'Please enter property address';
			}elseif (empty($_POST['features'])) {
				$data['featuresError'] = 'Please enter property features';
			}else{
				
				$params = array ('user_id' => $data['user']->id,
					'area' => $_POST['area'],
					'type' => $_POST['type'],
					'price' => $_POST['price'],
					'district' => $_POST['district'],
					'features' => $_POST['features'],
					'address' => $_POST['address'],
					'city' => $_POST['city']);
				// printme ($params);
				$this->property->insertProperty($params);
			}
		}
		$this->load->view('share_property', $data);
	}
}