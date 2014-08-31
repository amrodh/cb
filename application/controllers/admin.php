<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function index()
	{
		$data['error'] = 0;
		if($this->session->flashdata('login')){
			$login = $this->session->flashdata('login');
			$login = $login['login'];
			if($login == 0)
				$data['error'] = 1;
		}
		if(isset($this->session->userdata['id'])){
				
			if($this->session->userdata['id'] != 1){
				$data['error'] = 0;
			}else{
				redirect('admin/dashboard');
			}
		}

		$this->load->view('admin/home',$data);
	}

	public function authenticate()
	{
		if(!isset($_POST['username']))
			redirect('admin');

		$this->load->model('user');
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user = $this->user->getRootByUsername($username);

		if($user){

			$login = $this->user->logIn($username,$password);
			if($login){
				$this->startSession($user);
				redirect('admin/dashboard');
				exit();
			}

		}

		$data['login'] = 0;
		$this->session->set_flashdata('login',$data);
		redirect('admin');

	}

	public function dashboard()
	{	
		$this->load->view('admin/dashboard');
	}

	public function users()
	{
		$this->load->model('user');
		$data['users'] = $this->user->getAllUsers();
		$this->load->view('admin/users',$data);
	}


	public function userProfile()
	{
		$username = $this->uri->uri_string;
		$username = explode('users/', $username);
		$username = $username[1];
		$this->load->model('user');
		$this->load->model('property');
		$this->load->model('favorites');
		$data['user'] = $this->user->getUserByUsername($username);
		$data['properties'] = $this->property->getUserProperties($data['user']->id);
		$data['favorites'] = $this->favorites->getUserFavorites($data['user']->id);
		if(is_array($data['favorites'])){
			foreach ($data['favorites'] as $favorite ) {
				$favorite->property = $this->property->getPropertyByID($favorite->property_id)[0];
			}
		}
		
		// printme($data['favorites']);exit();
		$this->load->view('admin/userprofile', $data);

	}


	public function propertyalert()
	{
		$alerts = $this->property->getPropertiesAlert();
		if(is_array($alerts)){
			foreach ($alerts as $alert) {
				if(!checkmail($alert->user_identifier)){
					$alert->user_identifier = $this->user->getUserByID($alert->user_identifier);
				}

				$data = explode(',',$alert->property_data );
				$data_output = array();
				foreach ($data as $i) {
					$i = explode('=', $i);
					$data_output[$i[0]] = str_replace("'", "", $i[1]);
				}
				$alert->property_data = $data_output;
			}

		}
		$data['alerts'] = $alerts;
		$this->load->view('admin/propertyalert',$data);
	}


	public function newsletter()
	{	
		$data = array();
		$users = $this->user->getSubscribedUsers();
		
		if(is_array($users)){
			foreach ($users as $user) {
			
			}
		}
		
		printme($users);exit();
		$this->load->view('admin/newsletter', $data);
	}


	public function checkpasswordchange()
	{
		//$this->load->model('user');

		printme($_GET);exit();
		$userID = $_POST['id'];
		$changePassword = $this->user->changePassword($userID,$_POST['current'],$_POST['new_1']);
		printme($user);
	}


	


	public function properties()
	{
		$this->load->model('property');
		$this->load->model('user');
		$data['properties'] = $this->property->getAllProperties();
		foreach ($data['properties'] as $property) {
			$property->user = $this->user->getUserByID($property->user_id);
		}
		$this->load->view('admin/properties',$data);
	}

	function createUser()
	{	
		$data = array();

		if(isset($_POST['submit'])){
			$this->load->model('user');
			$user = $this->user->getUserByUsername($_POST['username']);
			if($user){
				$data['error'] = 'Username not available';
				$data['params'] = $_POST;
			}else{
				$user = $this->user->getUserByEmail($_POST['email']);
				if($user){
					$data['error'] = 'Email not available';
					$data['params'] = $_POST;
				}else{
					if($_POST['password'] != $_POST['confirm']){
						$data['error'] = 'Password not confirmed correctly';
						$data['params'] = $_POST;
					}else{
						unset($_POST['confirm']);
						unset($_POST['submit']);
						$insert = $this->user->insertUser($_POST);
						if($insert){
							redirect('admin/users/'.$_POST['username']);
						}else{
							$data['error'] = 'Process Failed, Try again';
							$data['params'] = $_POST;
						}

					}
				}	
			}
			
			
		}

		$this->load->view('admin/newuser',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata();
	}

	public function startSession($user)
	{
		$this->session->set_userdata($user);
	}

	public function script()
	{
		// $this->load->model('favorites');
		// $this->favorites->test();
		//tokenGenerator();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */