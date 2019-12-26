<?php

class Categories extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Categories';
		$data['categories'] = $this->Category_model->get_categories();

		$this->load->view('templates/header');
		$this->load->view('categories/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{

		if (!$this->session->userdata('logged_in')) {
			redirect('/users/login');
		}

		$data['title'] = 'Create Category';

		$this->form_validation->set_rules('name', 'Name', 'required');

		$params = $this->security->xss_clean($this->input->post());

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('categories/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Category_model->create_category($params);

			// Set message
			$this->session->set_flashdata('category_created', 'Your category has been created.');


			redirect('categories');
		}
	}

	public function posts($id)
	{

		$data['posts'] = $this->Category_model->get_category($id);
		$data['title'] = $this->Category_model->get_category_name($id);

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}
}
