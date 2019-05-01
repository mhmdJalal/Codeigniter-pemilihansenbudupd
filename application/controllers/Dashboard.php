<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->login = $this->session->userdata('login');
	}

	public function index()
	{
		if ($this->login == true) {
			if ($this->session->userdata('level') == "admin") {
				$data['title'] = "Dashboard | Pemilihan UPD dan SENBUD";

				$data['get_upd'] = $this->M_crud->getTable("upd")->num_rows();
				$data['get_senbud'] = $this->M_crud->getTable("senbud")->num_rows();
				$data['get_pilih'] = $this->M_crud->getTable("pemilihan")->num_rows();
				$data['belum_pilih'] = $this->M_crud->getTable("q_belumpilih");

				$this->load->view('template/header', $data);
				$this->load->view('template/headerAdmin');
				$this->load->view('admin/v_dashboard', $data);
				$this->load->view('template/footer');
			} else {
				$data['title'] = "Pemilihan UPD dan Seni Budaya";

				$this->load->view('template/header', $data);
				$this->load->view('template/HeaderSiswa');
				$this->load->view('siswa/v_dashboard');
				$this->load->view('template/footer');
			}
		} else {
			redirect('Auth','refresh');
		}
	}

	################################################### Start Admin ###################################################

	public function dataPeserta()
	{
		$data['title'] = "Data Peserta | Pemilihan UPD dan SENBUD";
		$data['peserta'] = $this->M_crud->getTable('q_siswa')->result_array();
		$data['rayon'] = $this->M_crud->getTable('rayon')->result_array();
		$data['rombel'] = $this->M_crud->getTable('rombel')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/headerAdmin');
		$this->load->view('admin/v_datapeserta', $data);
		$this->load->view('template/footer');
	}

	public function editpeserta($id)
		{
			$data['edit'] =  true;
			$data['title'] = "Edit Peserta";
			$data['peserta'] = $this->M_crud->getTable('siswa')->result_array();
			$data['datapeserta'] = $this->M_crud->getById('siswa', 'nis', $id)->row_array();
			$data['rayon'] = $this->M_crud->getTable('rayon')->result_array();
			$data['rombel'] = $this->M_crud->getTable('rombel')->result_array();
			
			$this->load->view('template/header', $data);
			$this->load->view('template/headerAdmin');
			$this->load->view('admin/v_datapeserta', $data);
			$this->load->view('template/footer');
		}

	public function dataUpd()
	{
		$data['title'] = "Data UPD | Pemilihan UPD dan SENBUD";
		$data['upd'] = $this->M_crud->getTable('upd')->result_array();
		$data['kode_upd'] = $this->M_crud->auto_code("kd_upd", "upd", "upd", "PD");

		$this->load->view('template/header', $data);
		$this->load->view('template/headerAdmin');
		$this->load->view('admin/v_dataupd', $data);
		$this->load->view('template/footer');
	}

	public function editupd($id)
		{
			$data['edit'] =  true;
			$data['title'] = "Edit UPD";
			$data['upd'] = $this->M_crud->getTable('upd')->result_array();
			$data['dataupd'] = $this->M_crud->getById('upd', 'kd_upd',$id)->row_array();
			$this->load->view('template/header', $data);
			$this->load->view('template/headerAdmin');
			$this->load->view('admin/v_dataupd', $data);
			$this->load->view('template/footer');
		}


	public function dataSenbud()
	{
		$data['title'] = "Data Seni Budaya | Pemilihan UPD dan SENBUD";
		$data['senbud'] = $this->M_crud->getTable('senbud')->result_array();
		$data['kode_senbud'] = $this->M_crud->auto_code("kd_senbud", "senbud", "senbud", "SB");

		$this->load->view('template/header', $data);
		$this->load->view('template/headerAdmin');
		$this->load->view('admin/v_datasenbud', $data);
		$this->load->view('template/footer');
	}

	public function editsenbud($id)
		{
			$data['edit'] =  true;
			$data['title'] = "Edit Seni Budaya";
			$data['senbud'] = $this->M_crud->getTable('senbud')->result_array();
			$data['datasenbud'] = $this->M_crud->getById('senbud', 'kd_senbud', $id)->row_array();

			$this->load->view('template/header', $data);
			$this->load->view('template/headerAdmin');
			$this->load->view('admin/v_datasenbud', $data);
			$this->load->view('template/footer');
		}

	public function hasilPemilihan()
	{
		$data['title'] = "Edit Seni Budaya";
		$data['pilih'] = $this->M_crud->getTable('q_pemilihan')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/headerAdmin');
		$this->load->view('admin/v_pemilihan', $data);
		$this->load->view('template/footer');
	}

	################################################### End Admin ###################################################


	################################################### Start User ###################################################

			public function pilihsenbudupd()
			{
				if ($this->session->userdata('login') == true) {
					$data['title'] = "Pemilihan UPD dan Seni Budaya";
					$data['senbud'] = $this->M_crud->getTable('senbud')->result_array();
					$data['upd'] = $this->M_crud->getTable('upd')->result_array();
					// $data['pilih'] = $this->M_crud->getTable('pemilihan')->row()->nis;
					$data['kode_pilih'] = $this->M_crud->auto_code('kd_pemilihan', 'pilih', 'pemilihan', 'PL');
					$data['pilihan'] = $this->M_crud->getById('q_pemilihan', 'nis', $this->session->userdata('nis'))->result_array();
					@$data['pilih'] = $this->M_crud->getById('q_pemilihan', 'nis', $this->session->userdata('nis'))->row()->nis;

					$this->load->view('template/header', $data);
					$this->load->view('template/HeaderSiswa');
					$this->load->view('siswa/v_pemilihan', $data);
					$this->load->view('template/footer');
				} else {
					redirect('Auth','refresh');
				}
			}

			public function informasisenbudupd()
			{
				if ($this->session->userdata('login') == true) {
					$data['title'] = "Pemilihan UPD dan Seni Budaya";
					$data['senbud'] = $this->M_crud->getTable('senbud')->result_array();
					$data['upd'] = $this->M_crud->getTable('upd')->result_array();

					$this->load->view('template/header', $data);
					$this->load->view('template/HeaderSiswa');
					$this->load->view('siswa/v_informasi', $data);
					$this->load->view('template/footer');
				} else {
					redirect('Auth','refresh');
				}
			}

			public function profile()
			{
				if ($this->session->userdata('login') == true) {
					$data['title'] = "Pemilihan UPD dan Seni Budaya";

					$this->load->view('template/header', $data);
					$this->load->view('template/HeaderSiswa');
					$this->load->view('siswa/v_profile');
					$this->load->view('template/footer');
				} else {
					redirect('Auth','refresh');
				}
			}

	################################################### End User ###################################################

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
 ?>
