<?php

class Posts extends CI_Controller
{
	public function index()
	{

		$data['title'] = 'Latest Posts';

		$data['posts'] = $this->Post_model->get_posts();

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL)
	{
		$data['post'] = $this->Post_model->get_posts($slug);

		if (empty($data['post'])) {
			show_404();
		}
		$data['title'] = $data['post']['title'];

		$this->load->view('templates/header');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$data['title'] = 'Create Post';

		$data['categories'] = $this->Post_model->get_categories();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');

		// 表單驗證失敗
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
		} else { // 表單驗證通過

			// upload image
			$config['upload_path'] = './assets/images/posts/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10024';
			$config['max_width'] = '6000';
			$config['max_height'] = '6000';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload()) { // 上傳失敗
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noImage.jpg';
			} else { // 上傳成功
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES ['userfile']['name'];
			}

			$this->Post_model->create_post($post_image);
			redirect('posts');
		}
	}

	public function delete($id)
	{
		$this->Post_model->delete_post($id);
		redirect('posts');
	}

	public function edit($slug)
	{
		$data['post'] = $this->Post_model->get_posts($slug);

		$data['categories'] = $this->Post_model->get_categories();

		if (empty($data['post'])) {
			show_404();
		}
		$data['title'] = 'Edit Post';
		$this->load->view('templates/header');
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$this->Post_model->update_post();
		redirect('posts');
	}
}
