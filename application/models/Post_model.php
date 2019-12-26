<?php

class Post_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_posts($slug = FALSE, $limit = 1, $offset = 0)
	{

		$sql = "
			SELECT posts.id,
			category_id,
			user_id,
			title,
			slug,
			body,
			post_image,
			posts.created_at,
			categories.id as cid,
			categories.name,
			categories.created_at
			FROM `posts`
			JOIN `categories`
			ON categories.id = posts.category_id
			WHERE posts.slug = ?
			ORDER by posts.id DESC
			limit ?
			offset ?";

		$binds = array($slug, $limit, $offset);

		$query = $this->db->query($sql, $binds);

		if ($query === FALSE)
		{
			return FALSE;
		}

		if ($slug)
		{  // show a specific post
			return $query->row_array();
		}
		else
		{ // show all posts
			return $query->result_array();
		}
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
