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
			redirect('admin/dashboard');
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
		$user = $this->user->getUserByUsername($username);

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
		$this->load->model('property');
		$this->property->test();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */