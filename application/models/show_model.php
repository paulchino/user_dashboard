<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//MODEL FILE
class Show_model extends CI_Controller {

	public function getposts($id)
	{
		// echo 'hello Paul';
		// echo "$id";
		$query = "SELECT messages.id AS mess_id, message, to_user, messages.created_at, users_id, users.id, first_name, last_name FROM messages
				JOIN users on users.id = messages.users_id WHERE messages.to_user=$id
				ORDER BY messages.created_at DESC;";
		
		return $this->db->query($query) ->result_array();

	}

	public function get_user_info($id)
	{
		$query = "SELECT * FROM users WHERE users.id = $id";
		return $this->db->query($query) ->row_array();
	}

	public function add_message($message) {

		$query = "INSERT INTO user_dashboard.messages (message, to_user, created_at, updated_at, users_id)
				VALUE (?, ?, ?, ?, ?);";

		$values = array($message['message'], $message['to_user'], $message['created_at'], $message['updated_at'], $message['users_id'] );

		return $this->db->query($query, $values);	

	}

	public function getcomments() 
	{
		$query = "SELECT comments.*, messages.*, first_name, last_name  FROM comments
					JOIN messages ON comments.messages_id = messages.id
					JOIN users ON comments.users_id = users.id;";

		return $this->db->query($query)->result_array();

	}



}
