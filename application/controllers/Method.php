<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Method extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('M_crud');
		}

		################################################### Save ###################################################

		public function saveupd()
		{
			$field = array(
				'kd_upd' 		=> $this->input->post('kd_upd'),
				'upd' 			=> $this->input->post('upd'),
				'instruktur'	=> $this->input->post('instruktur'),
				'hari' 			=> $this->input->post('hari'),
				'kuota' 		=> $this->input->post('kuota')
			);

			$cek = $this->M_crud->save($field, "upd");

			if ($cek) {
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Berhasil Disimpan!',
						'code'		=> true,
						'result'	=> true
					)
				);
				redirect('Dashboard/dataUpd','refresh');
			}else{
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Gagal Menyimpan Data!',
						'code'		=> true,
						'result'	=> false
					)
				);
				redirect('Dashboard/dataUpd','refresh');
			}
		}

		public function savesenbud()
		{
			$field = array(
				'kd_senbud' 				=> $this->input->post('kd_senbud'),
				'senbud' 						=> $this->input->post('senbud'),
				'instruktur_senbud'	=> $this->input->post('instruktur_senbud'),
				'hari_senbud' 			=> $this->input->post('hari_senbud'),
				'kuota_senbud' 			=> $this->input->post('kuota_senbud')
			);

			$cek = $this->M_crud->save($field, "senbud");

			if ($cek) {
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Berhasil Disimpan!',
						'code'		=> true,
						'result'	=> true
					)
				);
				redirect('Dashboard/dataSenbud','refresh');
			}else{
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Gagal Menyimpan Data!',
						'code'		=> true,
						'result'	=> false
					)
				);
				redirect('Dashboard/dataSenbud','refresh');
			}
		}

		public function savepeserta()
		{
			$field = array(
				'nis' 			=> $this->input->post('nis'),
				'nama' 			=> $this->input->post('nama'),
				'jk' 				=> $this->input->post('jk'),
				'rayon' 		=> $this->input->post('rayon'),
				'rombel' 		=> $this->input->post('rombel'),
				'email' 		=> $this->input->post('email'),
				'username' 	=> $this->input->post('username'),
				'password' 	=> $this->input->post('password'),
				'code'			=> 0
			);

			$cek = $this->M_crud->save($field, "siswa");

			if ($cek) {
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Berhasil Disimpan!',
						'code'		=> true,
						'result'	=> true
					)
				);
				redirect('Dashboard/dataPeserta','refresh');
			}else{
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Gagal Menyimpan!',
						'code'		=> true,
						'result'	=> false
					)
				);
				redirect('Dashboard/dataPeserta','refresh');
			}
		}

		public function savepemilihan()
		{
			date_default_timezone_set('asia/jakarta');
			$tanggal = date('Y-m-d');

			$field = array(
				'kd_pemilihan'	=> $this->input->post('kd_pilih'),
				'nis' 					=> $this->session->userdata('nis'),
				'kd_upd' 				=> $this->input->post('upd'),
				'kd_senbud' 		=> $this->input->post('senbud'),
				'tgl_pemilihan' => $tanggal
			);

			$cek = $this->M_crud->save($field, "pemilihan");
			$this->M_crud->update(array('code' => 1), 'siswa', 'nis', $this->session->userdata('nis'));

			if ($cek) {
				echo "<script>alert('Berhasil Disimpan!')</script>";
				$array = array(
					'pilih' => true
				);
				$this->session->set_userdata( $array );
				redirect('Dashboard/pilihsenbudupd','refresh');
			}else{
				echo "<script>alert('Gagal Disimpan!')</script>";
				redirect('Dashboard/pilihsenbudupd','refresh');
			}
		}

		################################################### End Save ###################################################


		################################################### Update ###################################################

		public function updatepeserta($id)
		{
			$field = array(
				'nama_siswa' 	=> $this->input->post('nama'),
				'jk' 			=> $this->input->post('jk'),
				'rayon' 		=> $this->input->post('rayon'),
				'rombel' 		=> $this->input->post('rombel'),
				'email' 		=> $this->input->post('email'),
				'username' 		=> $this->input->post('username'),
				'password' 		=> $this->input->post('password')
			);

			$cek = $this->M_crud->update($field, "siswa", "nis", $id);

			if ($cek) {
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Berhasil Diperbarui!',
						'code'		=> true,
						'result'	=> true
					)
				);
				redirect('Dashboard/dataPeserta','refresh');
			}else{
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Gagal Memperbarui!',
						'code'		=> true,
						'result'	=> false
					)
				);
				redirect('Dashboard/dataPeserta','refresh');
			}
		}

		public function updatepassword($id)
		{
			$field = array(
				'password' 		=> $this->input->post('password')
			);

			$cek = $this->M_crud->update($field, "siswa", "nis", $id);

			if ($cek) {
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Berhasil Diperbarui!',
						'code'		=> true,
						'result'	=> true
					)
				);
				redirect('Dashboard/profile','refresh');
			}else{
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Gagal Memperbarui!',
						'code'		=> true,
						'result'	=> false
					)
				);
				redirect('Dashboard/profile','refresh');
			}
		}

		################################################### End Update ###################################################


		################################################### Delete ###################################################

		public function deletepeserta($id)
		{
			$cek = $this->M_crud->delete("siswa", "nis",$id);

			if ($cek) {
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Berhasil Dihapus!',
						'code'		=> true,
						'result'	=> true
					)
				);
				redirect('Dashboard/dataPeserta','refresh');
			}else{
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Gagal Menghapus!',
						'code'		=> true,
						'result'	=> false
					)
				);
				redirect('Dashboard/dataPeserta','refresh');
			}
		}

		public function deleteupd($id)
		{
			$cek = $this->M_crud->delete("upd", "kd_upd",$id);

			if ($cek) {
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Berhasil Dihapus!',
						'code'		=> true,
						'result'	=> true
					)
				);
				redirect('Dashboard/dataUpd','refresh');
			}else{
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Gagal Menghapus!',
						'code'		=> true,
						'result'	=> false
					)
				);
				redirect('Dashboard/dataUpd','refresh');
			}
		}

		public function deletesenbud($id)
		{
			$cek = $this->M_crud->delete("senbud", "kd_senbud",$id);

			if ($cek) {
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Berhasil Dihapus!',
						'code'		=> true,
						'result'	=> true
					)
				);
				redirect('Dashboard/dataSenbud','refresh');
			}else{
				$this->session->set_flashdata(
					array(
						'pesan'		=> 'Gagal Menghapus!',
						'code'		=> true,
						'result'	=> false
					)
				);
				redirect('Dashboard/dataSenbud','refresh');
			}
		}

		################################################### End Delete ###################################################


		################################################### Start Get Data ###################################################

		public function getsenbud($id)
		{
			return $data['senbud'] = $this->M_crud->getById('senbud', 'kd_senbud', $id);

			$this->load->view('siswa/v_pemilihan', $data);
		}

		################################################### End Get Data ###################################################

	}

	/* End of file Method.php */
	/* Location: ./application/controllers/Method.php */
 ?>
