<?php

class Category_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * 新增分類
	 *
	 * @return void
	 */
	public function create_category()
	{
		$data = array(
			'name' => $this->db->escape($this->input->post('name'))
		);

		return $this->db->insert('categories', $data);
	}

	/**
	 * 取得分類列表
	 *
	 * @return void
	 */
	public function get_categories()
	{
		$this->db->order_by('name');
		$query = $this->db->get('categories');
		return $query->result_array();
	}

	/**
	 * 取得特定分類所有文章
	 *
	 * @param int $id
	 * @return void
	 */
	public function get_category($id)
	{
		$this->db->order_by('posts.id', 'DESC');
		$this->db->join('categories', 'posts.category_id = categories.id');
		// $query = $this->db->get_where('posts', 'category_id = ' . $id);
		$query = $this->db->get_where('posts', array('category_id' => $id));

		return $query->result_array();
	}

	/**
	 * 取得分類名稱
	 *
	 * @param int $id
	 * @return void
	 */
	public function get_category_name($id)
	{
		$categoryName = $this->db->get_where('categories', array('id' => $id))->row()->name;

		return $categoryName;
	}
}
