<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Model
{
	public function get_records($table)
	{
		return $this->db->get($table)->result();
	}

	public function find_record_by_id($table, $id)
	{
		return $this->db->get_where($table, array('id' => $id))->row();
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function update($table, $data, $id)
	{
		// print_r("$$id");
		// exit;
		$this->db->where('id', $id);
		$this->db->update($table, $data);
	}

	public function delete($table, $id)
	{
		$this->db->where('id', $id);
		$this->db->delete($table);
	}

	// Additional CRUD operations for 'backend' table
	public function get_backend_records()
	{
		return $this->get_records('backend');
	}

	public function find_backend_record_by_id($id)
	{
		return $this->find_record_by_id('backend', $id);
	}

	public function insert_backend($data)
	{
		
		return $this->insert('backend', $data);
	}

	public function update_backend($data, $id)
	{
		$this->update('backend', $data, $id);
	}

	public function delete_backend($id)
	{
		$this->delete('backend', $id);
	}
}
?>