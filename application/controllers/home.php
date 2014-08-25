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
}

