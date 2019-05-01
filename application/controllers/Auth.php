	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('M_login');
		}

		public function index()
		{
			if ($this->session->userdata('login') == false) {
				$data['title'] = "Form Login | Pemilihan UPD dan SENDBUD";

				$this->load->view('template/header', $data);
				$this->load->view('v_login');
				$this->load->view('template/footer');
			} else {
				redirect('Dashboard','refresh');
			}
		}

		public function Admin()
		{
			if ($this->session->userdata('login') == false) {
				$data['title'] = "Form Login | Pemilihan UPD dan SENDBUD";

				$this->load->view('template/header', $data);
				$this->load->view('v_loginadmin');
				$this->load->view('template/footer');
			} else {
				redirect('Dashboard','refresh');
			}
		}

		public function login_admin()
		{
			$cek = 	$this->M_login->login("admin", $this->input->post('username'), $this->input->post('password'));
			if ($cek) {
				echo "<script>alert('Berhasil Login')</script>";
				redirect('Dashboard','refresh');
			}else{
				echo "<script>alert('Gagal Login')</script>";
				redirect('Auth','refresh');
			}
		}

		public function login()
		{
			$cek = 	$this->M_login->login("siswa", $this->input->post('username'), $this->input->post('password'));
			if ($cek) {
				echo "<script>alert('Berhasil Login')</script>";
				redirect('Dashboard','refresh');
			}else{
				echo "<script>alert('Gagal Login')</script>";
				redirect('Auth','refresh');
			}
		}

		public function logout($level)
		{
			if ($level == "admin") {
				$this->session->sess_destroy();
				redirect('Auth/admin','refresh');
			} else {
				$this->session->sess_destroy();
				redirect('Auth','refresh');
			}
		}

	}

	/* End of file Auth.php */
	/* Location: ./application/controllers/Auth.php */
 ?>
