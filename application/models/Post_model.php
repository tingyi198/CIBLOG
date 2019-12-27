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
			categories.name
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

		// show a specific post
		if ($slug)
		{
			return $query->row_array();
		}
		// show all posts
		else
		{
			return $query->result_array();
		}
	}

	public function create_post($params, $post_image)
	{

		$this->db->trans_start();

		$slug = url_title($this->input->post('title'));

		$binds = array(
			'category_id' => $params['category_id'],
			'user_id' => $this->session->userdata('user_id'),
			'title' => $params['title'],
			'slug' => $slug,
			'body' => $params['body'],
			'post_image' => $post_image
		);

		$sql = "
		INSERT INTO `posts`
		(category_id, user_id, title, slug, body, post_image)
		VALUES (?, ?, ?, ?, ?, ?)
		";

		$this->db->query($sql, $binds);

		$this->db->trans_complete();
	}

	public function delete_post($id)
	{

		 $sql = "
		 DELETE
		 FROM `posts`
		 WHERE id = ?
		 ";

		 $binds = array($id);

		 $this->db->query($sql, $binds);

		return true;
	}

	public function update_post($params)
	{

		$slug = url_title($params['title']);

		$binds = array(
			'title' => $params['title'],
			'slug' => $slug,
			'body' => $params['body'],
			'category_id' => $params['category_id'],
			'id' => $params['id']
		);

		$sql = "
		UPDATE `posts`
		SET title = ?,
		slug = ?,
		body = ?,
		category_id = ?,
		created_at = NOW()
		WHERE id = ?
		";

		$this->db->query($sql, $binds);

	}

	public function get_categories()
	{

		$sql = "
		SELECT * FROM categories
		ORDER BY name
		";

		$query = $this->db->query($sql);

		return $query->result_array();

	}
}
