<?php

class Users extends CI_Controller
{
	public function register()
	{
		$data['title'] = 'Sign up';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		} else {

			// Encrypt password
			$encrypt_password = md5($this->input->post('password'));

			$this->User_model->register($encrypt_password);

			// Set message
			$this->session->set_flashdata('user_registered', 'You are now register and can login.');

			redirect('posts');
		}
	}

	// Check if username exists
	function check_username_exists($username)
	{

		$this->form_validation->set_message('check_username_exists', 'The username is taken. Please choose a different one.');

		return $this->User_model->check_username_exists($username);
	}

	// Check if email exists
	function check_email_exists($email)
	{
		$this->form_validation->set_message('check_email_exists', 'The email is taken. Please choose a different one.');
		return $this->User_model->check_email_exists($email);
	}
}