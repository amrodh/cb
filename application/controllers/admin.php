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
		$data = $this->init();
		$this->load->view('admin/dashboard',$data);
	}

	public function users()
	{
		$data = $this->init();
		$this->load->model('user');
		$data['users'] = $this->user->getAllUsers();
		$this->load->view('admin/users',$data);
	}


	public function userProfile()
	{
		$data = $this->init();

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


		if(isset($_POST['id'])){
			
			if(isset($_POST['confirmdelete'])){
				$this->user->deleteUser($username);
				redirect('admin/users');
			}

			if(isset($_POST['confirmedit'])){
				$userId = $data['user']->id;
				
				printme($userId);
				exit();
				printme($_POST);exit();
			}
			
		}


		if(isset($_POST['username'])){
			if(isset($_POST['delete'])){
				$this->load->view('admin/userdelete', $data);
				return;
			}
			if(isset($_POST['edit'])){
				$data['params'] = $this->user->getUserArray($username);
				$this->load->view('admin/useredit', $data);
				return;
			}
		}
		
		$this->load->view('admin/userprofile', $data);

	}





	public function propertyalert()
	{
		$data = $this->init();

		$alerts = $this->property->getPropertiesAlert();
		if(is_array($alerts)){
			foreach ($alerts as $alert) {
				if(!$this->checkmail($alert->user_identifier)){
					$alert->user_identifier = $this->user->getUserByID($alert->user_identifier);
				}

				$data_tmp = explode(',',$alert->property_data );
				$data_output = array();
				foreach ($data_tmp as $i) {
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
		$data = $this->init();
		$users = $this->user->getSubscribedUsers();
		
		if(is_array($users)){
			foreach ($users as $user) {
				if(!$this->checkmail($user->user_identifier))
					$user->user_identifier = $this->user->getUserByID($user->user_identifier);
			}
		}
		
		$data['users'] = $users;
		$this->load->view('admin/newsletter', $data);
	}


	public function newsletterSend()
	{
		$data = $this->init();
		$users = $this->user->getSubscribedUsers();
		if(is_array($users)){
			foreach ($users as $user) {
				$identifier = $user->user_identifier;
				if(!$this->checkmail($identifier)){
					$tmp = $this->user->getUserByID($identifier);
					$user->user_identifier = $tmp->email;
				}
			}
		}


		$min = 0;
		$max = count($users);
		$mails = "";
		foreach ($users as $user ) {
			if($min == 0)
				$mails .= $user->user_identifier;
			else
				$mails .= ','.$user->user_identifier;

			$min++;
		}


		//$this->smtpmailer($subject,$body,$mails);
		
	}


	public function checkpasswordchange()
	{
		$data = $this->init();
		
		$userID = $_POST['id'];
		$changePassword = $this->user->changePassword($userID,$_POST['current'],$_POST['new_1']);
		//printme($user);
	}


	public function vacancies()
	{
		$data = $this->init();
		
		$data['vacancies'] = $this->vacancy->getAllVacancies();
		$this->load->view('admin/vacancies', $data);
	}

	

	public function showVacancy()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('vacancies/', $id);
		$id = $id[1];

		$data['vacancy'] = $this->vacancy->getVacancyById($id);
		$data['users'] = $this->vacancy->getUsersEnrolled($id);
		if(is_array($data['users'])){
			foreach ($data['users'] as $user) {
				if(!$this->checkmail($user->user_identifier)){
					$user->user_identifier = $this->user->getUserByID($user->user_identifier);
				}
			}
		}
		$this->load->view('admin/vacancyprofile', $data);
	}

	public function downloadcv()
	{
		$data = $this->init();

		$name = $this->uri->uri_string;
		$name = explode('download/', $name);
		$name = $name[1];
		$path = base_url().'application/static/upload/careers/'.$name;
		header("Content-disposition: attachment; filename=".$name);
		header("Content-type: application/pdf");
		readfile($path);

	}

	public function auction()
	{	
		
		$data = $this->init();

		$data['auctions'] = $this->property->getAuctions();
		$this->load->view('admin/auction', $data);

	}


	public function courses()
	{	
		$data = $this->init();
		
		$data['courses'] = $this->course->getCourses();
		$this->load->view('admin/courses', $data);

	}


	public function showAuction()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('auctions/', $id);
		$id = $id[1];

		$data['auction'] = $this->property->getAuctionById($id);
		$this->load->view('admin/auctionprofile', $data);
	}


	public function showCourse()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('courses/', $id);
		$id = $id[1];


		$data['course'] = $this->course->getCourseByID($id);

		$this->load->view('admin/courseprofile', $data);
	}


	public function showProperty()
	{
		$data = $this->init();
		
		$id = $this->uri->uri_string;
		$id = explode('properties/', $id);
		$id = $id[1];

		
		$data['property'] = $this->property->getPropertyById($id);
		$data['images']   = $this->property->getPropertyImages($id);
		$this->load->view('admin/propertyprofile', $data);
	}


	public function newCourse()
	{
		$data = $this->init();
		

			if(isset($_POST['submit']))
		{

			$fileExtension = explode('.',$_FILES['userfile']['name']);
			$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
			$path = $this->config->config['upload_path'];
			$this->config->set_item('upload_path',$path.'/courses');

			unset($_POST['submit']);
			$_POST['image'] = $_FILES['userfile']['name'];
			$insert = $this->course->insertCourse($_POST);
			if($insert){

				$upload = uploadme($this);
				if($upload){
					redirect('admin/courses/'.$this->db->insert_id());
				}else{
					$data['error'] = true;
					$data['errorMsg'] = 'Upload Failed, Try again';
				}

			}
		}

		$this->load->view('admin/newcourse', $data);
	}


	public function NewAuction()
	{	
		$data = $this->init();
		

		if(isset($_POST['submit']))
		{

			$fileExtension = explode('.',$_FILES['userfile']['name']);
			$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
			$path = $this->config->config['upload_path'];
			$this->config->set_item('upload_path',$path.'/auctions');

			unset($_POST['submit']);
			$_POST['image'] = $_FILES['userfile']['name'];
			// printme($_POST);exit();
			$insert = $this->property->insertAuction($_POST);
			if($insert){

				$upload = uploadme($this);
				if($upload){
					redirect('admin/auctions/'.$this->db->insert_id());
				}else{
					$data['error'] = true;
					$data['errorMsg'] = 'Upload Failed, Try again';
				}

			}
		}

		$this->load->view('admin/newauction', $data);
	}


	public function NewVacancy()
	{	
		$data = $this->init();
		

		if(isset($_POST['submit']))
		{

			

			unset($_POST['submit']);
			//printme($_POST);exit();
			$insert = $this->vacancy->insertVacancy($_POST);
			if($insert){

					redirect('admin/vacancies/'.$this->db->insert_id());

			}
		}

		$this->load->view('admin/newvacancy', $data);
	}




	


	public function properties()
	{
		
		
		$data = $this->init();


		$data['properties'] = $this->property->getAllProperties();
		if(is_array($data['properties'])){
			foreach ($data['properties'] as $property){
			$property->user = $this->user->getUserByID($property->user_id);
			}
		}
		
		$this->load->view('admin/properties',$data);
	}

	function createUser()
	{	
		$data = $this->init();

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

	function content()
	{	
		$data = $this->init();
		$data['slides'] = $this->content->getSliderContent();
		$this->load->view('admin/content',$data);
	}


	public function deleteContent()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('deletecontent/', $id);
		$data['id'] = $id[1];

		if(isset($_POST['id'])){
			if(isset($_POST['cancel'])){
				redirect('admin/content');
			}
			
			$this->content->deleteSlide($_POST['id']);
			redirect('admin/content');

		}

		$this->load->view('admin/deletecontent',$data);
	}


	public function editContent()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('editcontent/', $id);
		$data['id'] = $id[1];

		if(isset($_POST['id'])){

			if(isset($_POST['cancel'])){
				redirect('admin/content');
			}

			$tmp = $_FILES;
			$images = array("'image'","'logo'","'alt_logo'");

			foreach ($images as $image) {

				if( ($tmp['userfile']['error'][$image]) == 0){

					$path = $this->config->config['upload_path'];
					$this->config->set_item('upload_path',$path.'/slider');

					$_FILES['userfile']['name']     = $tmp['userfile']['name'][$image];
					$_FILES['userfile']['type']     = $tmp['userfile']['type'][$image];
					$_FILES['userfile']['tmp_name'] = $tmp['userfile']['tmp_name'][$image];
					$_FILES['userfile']['error']    = $tmp['userfile']['error'][$image];
					$_FILES['userfile']['size']     = $tmp['userfile']['size'][$image];
					$fileExtension = explode('.',$_FILES['userfile']['name']);

					if($image == "'image'")
					$_POST['image'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
					if($image == "'logo'")
					$_POST['logo'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
					if($image == "'alt_logo'")
					$_POST['alt_logo'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];

					if($image == "'image'")
					$_FILES['userfile']['name'] = $_POST['image'];
					if($image == "'logo'")
					$_FILES['userfile']['name'] = $_POST['logo'];
					if($image == "'alt_logo'")
					$_FILES['userfile']['name'] = $_POST['alt_logo'];
					
					$upload = uploadme($this);
					if(isset($upload['error'])){
						$data['error'] = 'Upload Failed, Please try again';
						$data['params'] = $_POST;
						$data['old_params'] = $this->content->getSliderByIDArray($data['id']);
						$this->load->view('admin/editcontent',$data);
						return;
					}
				}
			}

			unset($_POST['submit']);
			$this->content->updateSlide($data['id'],$_POST);
			redirect('admin/content');
		}

		$data['params'] = $this->content->getSliderByIDArray($data['id']);
		$this->load->view('admin/editcontent',$data);
	}

	public function addContent()
	{
		$data = $this->init();

		if(isset($_POST['submit'])){

			$data['params'] = $_POST;
			$activeSlides = $this->content->getActiveSliders();
			if(!$activeSlides){
				$_POST['order'] = 1;
			}else{
				$count = count($activeSlides);
				$_POST['order']  = $count+1;
			}

			if(isset($_FILES)){
				$path = $this->config->config['upload_path'];
				$this->config->set_item('upload_path',$path.'/slider');
				
				$tmp = $_FILES;
				$_FILES['userfile']['name']     = $tmp['userfile']['name']["'image'"];
				$_FILES['userfile']['type']     = $tmp['userfile']['type']["'image'"];
				$_FILES['userfile']['tmp_name'] = $tmp['userfile']['tmp_name']["'image'"];
				$_FILES['userfile']['error']    = $tmp['userfile']['error']["'image'"];
				$_FILES['userfile']['size']     = $tmp['userfile']['size']["'image'"];
				$fileExtension = explode('.',$_FILES['userfile']['name']);
				$_POST['image'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
				$_FILES['userfile']['name'] = $_POST['image'];
				
				$upload = uploadme($this);
				if(isset($upload['error'])){
					echo 'yes';
					$data['error'] = 'Upload Failed, Please try again';
					$this->load->view('admin/newcontent',$data);
					return;
				}

				$_FILES['userfile']['name']     = $tmp['userfile']['name']["'logo'"];
				$_FILES['userfile']['type']     = $tmp['userfile']['type']["'logo'"];
				$_FILES['userfile']['tmp_name'] = $tmp['userfile']['tmp_name']["'logo'"];
				$_FILES['userfile']['error']    = $tmp['userfile']['error']["'logo'"];
				$_FILES['userfile']['size']     = $tmp['userfile']['size']["'logo'"];
				$fileExtension = explode('.',$_FILES['userfile']['name']);
				$_POST['logo'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
				$_FILES['userfile']['name'] = $_POST['logo'];

				

				$upload = uploadme($this);
				if(isset($upload['error'])){
					echo 'yes';
					$data['error'] = 'Upload Failed, Please try again';
					$this->load->view('admin/newcontent',$data);
					return;
				}

				$_FILES['userfile']['name']     = $tmp['userfile']['name']["'alt_logo'"];
				$_FILES['userfile']['type']     = $tmp['userfile']['type']["'alt_logo'"];
				$_FILES['userfile']['tmp_name'] = $tmp['userfile']['tmp_name']["'alt_logo'"];
				$_FILES['userfile']['error']    = $tmp['userfile']['error']["'alt_logo'"];
				$_FILES['userfile']['size']     = $tmp['userfile']['size']["'alt_logo'"];
				$fileExtension = explode('.',$_FILES['userfile']['name']);
				$_POST['alt_logo'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
				$_FILES['userfile']['name'] = $_POST['alt_logo'];

				

				$upload = uploadme($this);
				if(isset($upload['error'])){
					echo 'yes';
					$data['error'] = 'Upload Failed, Please try again';
					$this->load->view('admin/newcontent',$data);
					return;
				}

				unset($_POST['submit']);
				$_POST['is_active'] = 1;
				//printme($_POST);exit();
				$this->content->insertSlide($_POST);
			}

			
		}
		$this->load->view('admin/newcontent',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata();
		redirect(base_url());
	}

	public function startSession($user)
	{
		$this->session->set_userdata($user);
	}

	public function script()
	{	
		 $this->load->model('service');
		 // $this->vacancy->populateDB();
		// $this->service->getProperty(199876);
		//$this->service->importDistrictsIntoDB();

	}


		function checkmail($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
	       return true;
	   else
	   	return false;
	    
	}






	public function init()
	{	
		$data = array();

		if(isset($this->session->userdata['id'])){
			$this->load->model('user');
			$data['loggedIn'] = true;
			$data['loggedUser'] = $this->user->getUserByUsername($this->session->userdata['username']);
			if($data['loggedUser']->id != 1)
				redirect('admin');
		}else{
			redirect('admin');
		}

		$request = $this->uri->uri_string;
		$request = explode('admin/', $request);
		$data['request'] = explode('/', $request[1]);
		$data['request'] = $data['request'][0];


		return $data;
		
	}

	public function checkPropertyAlert()
	{
		$alerts = $this->property->getPropertiesAlert();
		foreach ($alerts as $alert ) {
			$propertyData = explode(',', $alert->property_data);
			$max = count($propertyData);
			$min = 0;
			$where='';
			foreach ($propertyData as $x) {
				if($min == 0)
					$where .= $x;
				else
					$where .= ' && '.$x;

				$min++;
			}
			$checkNewProperty = $this->property->checkNewProperty($where,$alert->date_joined);
			//printme($checkNewProperty);
			// wait for the response from the service, then check the result set and send the email
		}
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */