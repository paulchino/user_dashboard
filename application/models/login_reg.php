<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//MODEL FILE
class login_reg extends CI_Controller {

	public function adduser($data) {

		// var_dump($data);
		// echo 'hello';



		//go back to admin right later

		$query = "INSERT INTO user_dashboard.users (first_name, last_name, email, password, created_at, updated_at, access_rights_id)
				VALUE (?, ?, ?, ?, ?, ?, ? );";

		$values = array($data['first'], $data['last'], $data['email'], $data['password'], $data['created_at'], $data['updated_at'], '1');

		return $this->db->query($query, $values);	

	}

	public function get_user_by_email($email) {

		$query = "SELECT * FROM users WHERE email = '$email';";
		return $this->db->query($query)->row_array();

	}

	public function get_all_users() {
		$query = "SELECT * FROM users";
		return $this->db->query($query) ->result_array();
	}




}