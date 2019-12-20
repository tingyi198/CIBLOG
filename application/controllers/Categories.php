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
		$data['title'] = 'Create Category';

		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('categories/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Category_model->create_category();
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