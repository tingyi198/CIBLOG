<?php

class Users extends CI_Controller
{
	public function register()
	{
		$data['title'] = 'Sign up';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
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
}
