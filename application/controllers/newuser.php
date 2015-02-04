<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newuser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index() {
		$this->load->view('signin');
	}

	public function register() {
		// var_dump($this->input->post());

		//register the user have the validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules("first", "First Name", "required|min_length[2]|alpha");
		$this->form_validation->set_rules("last", "Last Name", "required|min_length[2]|alpha");
		$this->form_validation->set_rules("email", "Email", "required|valid_email");
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");
		$this->form_validation->set_rules("confirm", "Password confirmation", "matches[password]");

		if($this->form_validation->run() === FALSE)
		{
			$errors = $this->view_data['errors'] = validation_errors();
			// var_dump($errors);

			//make these errors show up
			$this->session->set_userdata(array('errors' => $errors));
			$this->load->view('register');

		}
		else
		{
			//clean data
			$data = $this->input->post();
			date_default_timezone_set('America/Los_Angeles');
			$date = date('Y-m-d h:i:s');

			$userArray = array(
				"first" => $data['first'],
				"last" => $data['last'],
				"email" => $data['email'],
				"password" => md5($data['password']),
				"created_at" => $date,
				"updated_at" => $date
				);

			// var_dump($userArray);
			// $addUser = $this->login->newUser($userArray);
			//load model
			$this->load->model('login_reg');

			//put into mysql model
			$this->login_reg->adduser($userArray);

			$success_string = "<p class='green'>Hello {$data['first']}. Registration successful. Please login!</p>";
			$this->session->set_userdata(array('reg_success' => $success_string));	
		}
		redirect('/new');
	}

	public function signin() {
		$this->load->model('login_reg');

		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

		

		//send over to signin method which checks if the email and password pass any in db

		$info = $this->login_reg->get_user_by_email($email);
		// var_dump($info);
	
		if($info && $info['password'] == $password)
		{
			$user = array(
				'id' => $info['id'],
				'first' => $info['first_name'],
				'last' => $info['last_name'],
				'email' => $info['email'],
				'is_logged_in' => true
				);
			$this->session->set_userdata($user);

			$user_data = array('data' => $this->login_reg->get_all_users());
			// var_dump($user_data);
			// die();


			$this->load->view('adminDashboard',$user_data);
		}
		else
		{
			$error_string = "<p class='red'>Incorrect username or password</p>";
			$this->session->set_userdata(array('errors' => $error_string));

			//go back to sign page and display error
			redirect('/new');

		}

		//check if email is on the database

	}


}

//end of user controller