<?php

class Post_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_posts($slug = FALSE)
	{
		if ($slug === FALSE) {
			$this->db->select('posts.id, category_id, user_id, title, slug, body, post_image, posts.created_at, categories.id as cid, categories.name, categories.created_at', FALSE);
			$this->db->join('categories', 'categories.id = posts.category_id');
			$this->db->order_by('posts.id', 'DESC');
			$query = $this->db->get('posts');
			return $query->result_array();
		}

		$this->db->select('posts.id, category_id, user_id, title, slug, body, post_image, posts.created_at, categories.id as cid, categories.name, categories.created_at', FALSE);
		$this->db->order_by('posts.id', 'DESC');
		$this->db->join('categories', 'categories.id = posts.category_id');
		$query = $this->db->get_where('posts', array('slug' => $slug));
		return $query->row_array();
	}

	public function create_post($post_image)
	{
		$slug = url_title($this->input->post('title'));

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'body' => $this->input->post('body'),
			'category_id' => $this->input->post('category_id'),
			'user_id' => $this->session->userdata('user_id'),
			'post_image' => $post_image
		);

		return $this->db->insert('posts', $data);
	}

	public function delete_post($id)
	{
		/** 第一種作法 */
		$this->db->where('id', $id);
		$this->db->delete('posts');

		/**
		 * 第二種作法
		 * $this->db->delete('posts', array('id' => $id));
		 */

		return true;
	}

	public function update_post()
	{

		$slug = url_title($this->input->post('title'));

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'body' => $this->input->post('body'),
			'category_id' => $this->input->post('category_id')
		);

		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('posts', $data);
	}

	public function get_categories()
	{
		$this->db->order_by('name');
		$query = $this->db->get('categories');
		return $query->result_array();
	}
}
