<?php

class User_model extends CI_Model
{

	public function register($encrypt_password)
	{

		// User data array
		$data = array(
			'name' => $this->input->post('name'),
			'zipcode' => $this->input->post('zipcode'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $encrypt_password
		);

		return $this->db->insert('users', $data);
	}

	// Check username exists
	public function check_username_exists($username)
	{
		$query = $this->db->get_where('users', array('username' => $username));

		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}

	// check email exists
	public function check_email_exists($email)
	{
		$query = $this->db->get_where('users', array('email' => $email));

		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}
}
