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
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('posts');
			return $query->result_array();
		}

		$this->db->order_by('id', 'DESC');
		$query = $this->db->get_where('posts', array('slug' => $slug));
		return $query->row_array();
	}

	public function create_post()
	{
		$slug = url_title($this->input->post('title'));

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'body' => $this->input->post('body')
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
		$data = array(
			'title' => $this->input->post('title'),
			'slug' => url_title($this->input->post('title')),
			'body' => $this->input->post('body')
		);

		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('posts', $data);
	}
}
