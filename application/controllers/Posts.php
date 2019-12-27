<?php

class Posts extends CI_Controller
{
	public function index()
	{

		$data['title'] = 'Latest Posts';

		$total_rows = $this->db->count_all('posts');
		$limit = 1;
		$offset = (int) $this->input->get('offset') ?? 1;

		// 分頁設定
		$this->pagination->initialize(
			[
				'base_url' => base_url() . 'posts/index/page',
				'total_rows' => $total_rows,
				'per_page' => $limit,
				'num_links' => $total_rows
			]
		);

		$data['posts'] = $this->Post_model->get_posts(FALSE, $limit, $offset);

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL)
	{
		$data['post'] = $this->Post_model->get_posts($slug);
		$post_id = $data['post']['id'];
		$data['comments'] = $this->Comment_model->get_comments($post_id);

		if (empty($data['post']))
		{
			show_404();
		}

		$data['title'] = $data['post']['title'];

		$this->load->view('templates/header');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{

		if (!$this->session->userdata('logged_in'))
		{
			redirect('/users/login');
		}

		$data['title'] = 'Create Post';

		$data['categories'] = $this->Post_model->get_categories();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');

		$params = $this->security->xss_clean($this->input->post());

		// 表單驗證失敗
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
		}
		// 表單驗證通過
		else
		{
			// upload image
			$config['upload_path'] = './assets/images/posts/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10024';
			$config['max_width'] = '6000';
			$config['max_height'] = '6000';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload())
			{ // 上傳失敗
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noImage.jpg';
			}
			// 上傳成功
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}

			$this->Post_model->create_post($params, $post_image);

			// Set message
			$this->session->set_flashdata('post_created', 'Your post has been created.');

			redirect('posts');
		}
	}

	public function delete($id)
	{

		if (!$this->session->userdata('logged_in'))
		{
			redirect('/users/login');
		}

		$this->Post_model->delete_post($id);

		$this->session->set_flashdata('post_deleted', 'Your post has been deleted.');

		redirect('posts');
	}

	public function edit($slug)
	{

		// 檢查使用者是否登入
		if (!$this->session->userdata('logged_in')) {
			redirect('/users/login');
		}

		$data['post'] = $this->Post_model->get_posts($slug);

		// 檢查登入者是否為文章作者
		if ($this->session->userdata('user_id') !== $data['post']['user_id']) {
			redirect('posts');
		}

		$data['categories'] = $this->Post_model->get_categories();

		if (empty($data['post']))
		{
			show_404();
		}

		$data['title'] = 'Edit Post';
		$this->load->view('templates/header');
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{

		if (!$this->session->userdata('logged_in'))
		{
			redirect('/users/login');
		}

		$params = $this->security->xss_clean($this->input->post());

		$this->Post_model->update_post($params);

		// Set message
		$this->session->set_flashdata('post_updated', 'Your post has been updated.');

		redirect('posts');
	}
}
