<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Controller {

	public function wall($id) {
		//based on the user ID, create his own wall


		$this->load->model('show_model');

		$posts = array('posts' => $this->show_model->getcomments() );

		// var_dump($posts);
		// die();





		$messages = array('messages' => $this->show_model->getposts($id));

		// var_dump($messages);
		// die();

		$user = array('user' => $this->show_model->get_user_info($id));
		$combined = array_merge($messages, $user, $posts);
		// var_dump($combined);


		$this->load->view("messages", $combined);



	
		// die();
	}

	public function post_message($id) {
		// var_dump($this->input->post());

		//if user is not logged in send them back to home page
		if(!$this->session->userdata('is_logged_in')) {
			redirect('default_controller');
		}

		$this->load->model('show_model');
		$message = $this->input->post('message');

		$date = date('Y-m-d h:i:s');

		$message_array = array(
			"message" => $message,
			"to_user" => $id,
			"created_at" => $date,
			"updated_at" => $date,
			"users_id" => $this->session->userdata('id')

			);

		//var_dump($message_array);

		//run the query to insert data
		$this->show_model->add_message($message_array);

		redirect("show/wall/$id");

	}



}
