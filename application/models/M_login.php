<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_login extends CI_Model {
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function login($table, $username, $password)
		{
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$row = $this->db->get($table);

			if ($table == "siswa") {
				if ($row->num_rows() > 0) {
					$data = $row->row_array();
					$session = array(
						'login' => True,
						'level'	=> 'siswa',
						'nis'		=> $data['nis'],
						'name' 	=> $data['nama'],
						'jk'		=> $data['jk']
					);
					$this->session->set_userdata( $session );
					return true;
				}else{
					return false;
				}
			} else {
				if ($row->num_rows() > 0) {
					$data = $row->row_array();
					$session = array(
						'login' => True,
						'level'	=> 'admin',
						'name' 	=> $data['nama']
					);
					$this->session->set_userdata( $session );
					return true;
				}else{
					return false;
				}
			}
		}

		public function loginadmin($username, $password)
		{
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$row = $this->db->get("admin");

			if ($row->num_rows() > 0) {
				$data = $row->row_array();
				$session = array(
					'login' => True,
					'level'	=> 'admin',
					'name' 	=> $data['nama']
				);
				$this->session->set_userdata( $session );
				return true;
			}else{
				return false;
			}
		}


	}

	/* End of file M_login.php */
	/* Location: ./application/models/M_login.php */
 ?>
