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
		// printme ($username);
		$userData = $this->user->getUserByUsername($username);
		// printme($userData);
		// exit();
		$this->load->view('profile', $userData);
	}	
}

