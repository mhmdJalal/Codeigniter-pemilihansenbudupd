<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_crud extends CI_Model {
		public function __construct()
		{
			parent::__construct();
		}

		public function auto_code($field, $as, $table, $kd){
			$kode = $kd;
			$this->db->select_max($field, $as);
			$query = $this->db->get($table);
			$row = $query->row_array();
			$auto_kd = $row[$as];
			$auto_kd1 = (int) substr($auto_kd, 3, 6);
			$auto_codes = $auto_kd1 + 1;
			$max_auto_code = $kode.sprintf("%04s", $auto_codes);
			return $max_auto_code;
		}

		public function getTable($table)
		{
			return $this->db->get($table);
		}

		public function getById($table, $primary, $value)
		{
			$this->db->where($primary, $value);
			return $this->db->get($table);
		}

		public function save($field, $table)
		{
			return $this->db->insert($table, $field);
		}

		public function delete($table, $key, $value)
		{
			$this->db->where($key, $value);
			return $this->db->delete($table);
		}

		public function update($field, $table, $primary, $value)
		{
			$this->db->where($primary, $value);
			return $this->db->update($table, $field);
		}

		public function sum($table, $field)
		{
			$this->db->select_sum($field, 'alias');
			$query = $this->db->get($table);
			return true;
		}

	}

	/* End of file M_crud.php */
	/* Location: ./application/models/M_crud.php */
 ?>
