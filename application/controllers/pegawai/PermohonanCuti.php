<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PermohonanCuti extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai/M_Permohonan');
		$this->load->model('User_model');
		// $this->load->library('form_validation');
		// $this->load->helper('url', 'form');
	}

	public function cutiSakit()
	{
		$this->form_validation->set_rules('mulai', 'mulai', 'required');
		$data['jenis'] = $this->M_Permohonan->selectKetCuti();
		$data['select'] = $this->M_Permohonan->selectIdCuti();
		$data['ket'] = $this->M_Permohonan->getAllKeterangan();

		if ($this->form_validation->run() == FALSE) {
			$data['title']  = 'Permohonan Cuti Sakit';
			$data['session'] = $this->session->userdata('nama');
			// $data['project']=$this->Feedback_Model->selectIdProject();
			// get data nama user (untuk tampil di sidebar dan navbar)
			$data['user']   = $this->db->query('select * from user where nama = "' . $_SESSION['nama'] . '"')->row();
			$this->load->view('theme_pegawai/header', $data);
			$this->load->view('pegawai/permohonan_cuti/cuti_sakit', $data);
			$this->load->view('theme_pegawai/footer', $data);
		} else {
			$id_cuti = $this->input->post('id_cuti');
			$cuti = $this->M_Permohonan->getDataCutiDetail($id_cuti);

			$id = $this->input->post('kode_pegawai');
			$pegawai = $this->M_Permohonan->getDataPegawaiDetail($id);

			$id_pegawai = $this->User_model->getIdPegawai();

			$config['upload_path'] = './assets/data';
			$config['allowed_types'] = 'pdf';
			$config['file_name']    = 'surat-dokter' . $id_pegawai . '-' . date('d-m-Y');

			$this->load->library('upload', $config, 'surat_pengantar');
			$this->surat_pengantar->initialize($config);
			$upload_surat_pengantar = $this->surat_pengantar->do_upload('surat_pengantar');

			if ($upload_surat_pengantar == TRUE) {
				date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
				$now = date('Y-m-d H:i:s');
				$data = array(
					'kode_pegawai'  => $this->input->post('kode_pegawai'),
					'nama'  		=> $pegawai['nama'],
					'perihal'		=> $this->input->post('perihal'),
					'tanggal_pengajuan' => $now,
					'mulai_cuti'    => $this->input->post('mulai'),
					'akhir_cuti'    => $this->input->post('berakhir'),
					'surat_dokter' 	=> $this->surat_pengantar->data("file_name"),
					'keterangan'    => "Cuti Sakit",
					'verifikasi' 	=> 3,
				);
				$this->db->insert('permohonan_cuti', $data);

				// // Set message
				$this->session->set_flashdata('message', '<div class="alert alert-success" style="color:green;" role="success">Data berhasil</div>');

				redirect('pegawai/PermohonanCuti/cutiSakit', $data);
				// var_dump($data);
			}
			// else {
			// 	var_dump($data);
			// }
		}
	}

	public function cutiMelahirkan()
	{
		$this->form_validation->set_rules('mulai', 'mulai', 'required');
		$data['jenis'] = $this->M_Permohonan->selectKetCuti();
		$data['select'] = $this->M_Permohonan->selectIdCuti();
		$data['ket'] = $this->M_Permohonan->getAllKeterangan();

		if ($this->form_validation->run() == FALSE) {
			$data['title']  = 'Permohonan Cuti Melahirkan';
			$data['session'] = $this->session->userdata('nama');
			// $data['project']=$this->Feedback_Model->selectIdProject();
			// get data nama user (untuk tampil di sidebar dan navbar)
			$data['user']   = $this->db->query('select * from user where nama = "' . $_SESSION['nama'] . '"')->row();
			$this->load->view('theme_pegawai/header', $data);
			$this->load->view('pegawai/permohonan_cuti/cuti_melahirkan', $data);
			$this->load->view('theme_pegawai/footer', $data);
		} else {
			$id_cuti = $this->input->post('id_cuti');
			$cuti = $this->M_Permohonan->getDataCutiDetail($id_cuti);

			$id = $this->input->post('kode_pegawai');
			$pegawai = $this->M_Permohonan->getDataPegawaiDetail($id);

			$id_pegawai = $this->User_model->getIdPegawai();

			$config['upload_path'] = './assets/data';
			$config['allowed_types'] = 'pdf';
			$config['file_name']    = 'surat-melahirkan' . $id_pegawai . '-' . date('d-m-Y');

			$this->load->library('upload', $config, 'surat_pengantar');
			$this->surat_pengantar->initialize($config);
			$upload_surat_pengantar = $this->surat_pengantar->do_upload('surat_pengantar');

			if ($upload_surat_pengantar == TRUE) {
				date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
				$now = date('Y-m-d H:i:s');
				$data = array(
					'kode_pegawai'  => $this->input->post('kode_pegawai'),
					'nama'  		=> $pegawai['nama'],
					'tanggal_pengajuan' => $now,
					'mulai_cuti'    => $this->input->post('mulai'),
					'akhir_cuti'    => $this->input->post('berakhir'),
					'surat_melahirkan' 	=> $this->surat_pengantar->data("file_name"),
					'keterangan'    => "Cuti Melahirkan",
					'verifikasi' 	=> 3,
				);
				$this->db->insert('permohonan_cuti', $data);

				// // Set message
				$this->session->set_flashdata('data_ditambahkan', 'Data berhasil ditambah');

				redirect('pegawai/PermohonanCuti/cutiMelahirkan', $data);
				// var_dump($data);
			}
			// else {
			// 	var_dump($data);
			// }
		}
	}

	public function cutiAlasanPenting()
	{
		$this->form_validation->set_rules('mulai', 'mulai', 'required');
		$data['jenis'] = $this->M_Permohonan->selectKetCuti();
		$data['select'] = $this->M_Permohonan->selectIdCuti();
		$data['ket'] = $this->M_Permohonan->getAllKeterangan();

		if ($this->form_validation->run() == FALSE) {
			$data['title']  = 'Permohonan Cuti Alasan Penting';
			$data['session'] = $this->session->userdata('nama');
			// $data['project']=$this->Feedback_Model->selectIdProject();
			// get data nama user (untuk tampil di sidebar dan navbar)
			$data['user']   = $this->db->query('select * from user where nama = "' . $_SESSION['nama'] . '"')->row();
			$this->load->view('theme_pegawai/header', $data);
			$this->load->view('pegawai/permohonan_cuti/cuti_alasanpenting', $data);
			$this->load->view('theme_pegawai/footer', $data);
		} else {
			$id_cuti = $this->input->post('id_cuti');
			$cuti = $this->M_Permohonan->getDataCutiDetail($id_cuti);

			$id = $this->input->post('kode_pegawai');
			$pegawai = $this->M_Permohonan->getDataPegawaiDetail($id);

			$id_pegawai = $this->User_model->getIdPegawai();

			$config['upload_path'] = './assets/data';
			$config['allowed_types'] = 'pdf';
			$config['file_name']    = 'surat-alasanpenting' . $id_pegawai . '-' . date('d-m-Y');

			$this->load->library('upload', $config, 'surat_pengantar');
			$this->surat_pengantar->initialize($config);
			$upload_surat_pengantar = $this->surat_pengantar->do_upload('surat_pengantar');

			if ($upload_surat_pengantar == TRUE) {
				date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
				$now = date('Y-m-d H:i:s');
				$data = array(
					'kode_pegawai'  => $this->input->post('kode_pegawai'),
					'nama'  		=> $pegawai['nama'],
					'perihal'		=> $this->input->post('perihal'),
					'tanggal_pengajuan' => $now,
					'mulai_cuti'    => $this->input->post('mulai'),
					'akhir_cuti'    => $this->input->post('berakhir'),
					'surat_alasanpenting' 	=> $this->surat_pengantar->data("file_name"),
					'keterangan'    => "Cuti Alasan Penting",
					'verifikasi' 	=> 3,

				);
				$this->db->insert('permohonan_cuti', $data);

				// // Set message
				$this->session->set_flashdata('data_ditambahkan', 'Data berhasil ditambah');

				redirect('pegawai/PermohonanCuti/cutiAlasanPenting', $data);
				// var_dump($data);
			}
			// else {
			// 	var_dump($data);
			// }
		}
	}

	public function cutiBesar()
	{
		$this->form_validation->set_rules('mulai', 'mulai', 'required');
		$data['jenis'] = $this->M_Permohonan->selectKetCuti();
		$data['select'] = $this->M_Permohonan->selectIdCuti();
		$data['ket'] = $this->M_Permohonan->getAllKeterangan();

		if ($this->form_validation->run() == FALSE) {
			$data['title']  = 'Permohonan Cuti Besar';
			$data['session'] = $this->session->userdata('nama');
			// $data['project']=$this->Feedback_Model->selectIdProject();
			// get data nama user (untuk tampil di sidebar dan navbar)
			$data['user']   = $this->db->query('select * from user where nama = "' . $_SESSION['nama'] . '"')->row();
			$this->load->view('theme_pegawai/header', $data);
			$this->load->view('pegawai/permohonan_cuti/cuti_besar', $data);
			$this->load->view('theme_pegawai/footer', $data);
		} else {
			$id_cuti = $this->input->post('id_cuti');
			$cuti = $this->M_Permohonan->getDataCutiDetail($id_cuti);

			$id = $this->input->post('kode_pegawai');
			$pegawai = $this->M_Permohonan->getDataPegawaiDetail($id);

			$id_pegawai = $this->User_model->getIdPegawai();

			$config['upload_path'] = './assets/data';
			$config['allowed_types'] = 'pdf';
			$config['file_name']    = 'surat-besar' . $id_pegawai . '-' . date('d-m-Y');

			$this->load->library('upload', $config, 'surat_pengantar');
			$this->surat_pengantar->initialize($config);
			$upload_surat_pengantar = $this->surat_pengantar->do_upload('surat_pengantar');

			if ($upload_surat_pengantar == TRUE) {
				date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
				$now = date('Y-m-d H:i:s');
				$data = array(
					'kode_pegawai'  => $this->input->post('kode_pegawai'),
					'nama'  		=> $pegawai['nama'],
					'perihal'		=> $this->input->post('perihal'),
					'tanggal_pengajuan' => $now,
					'mulai_cuti'    => $this->input->post('mulai'),
					'akhir_cuti'    => $this->input->post('berakhir'),
					'surat_besar' 	=> $this->surat_pengantar->data("file_name"),
					'keterangan'    => "Cuti Besar",
					'verifikasi' 	=> 3,
				);
				$this->db->insert('permohonan_cuti', $data);

				// // Set message
				$this->session->set_flashdata('data_ditambahkan', 'Data berhasil ditambah');

				redirect('pegawai/PermohonanCuti/cutiBesar', $data);
				// var_dump($data);
			}
			// else {
			// 	var_dump($data);
			// }
		}
	}

	public function cutiTahunan()
	{
		$this->form_validation->set_rules('mulai', 'mulai', 'required');
		$data['jenis'] = $this->M_Permohonan->selectKetCuti();
		$data['select'] = $this->M_Permohonan->selectIdCuti();
		$data['ket'] = $this->M_Permohonan->getAllKeterangan();

		if ($this->form_validation->run() == FALSE) {
			$data['title']  = 'Permohonan Cuti Tahunan';
			$data['session'] = $this->session->userdata('nama');
			// $data['project']=$this->Feedback_Model->selectIdProject();
			// get data nama user (untuk tampil di sidebar dan navbar)
			$data['user']   = $this->db->query('select * from user where nama = "' . $_SESSION['nama'] . '"')->row();
			$this->load->view('theme_pegawai/header', $data);
			$this->load->view('pegawai/permohonan_cuti/cuti_tahunan', $data);
			$this->load->view('theme_pegawai/footer', $data);
		} else {
			$id_cuti = $this->input->post('id_cuti');
			$cuti = $this->M_Permohonan->getDataCutiDetail($id_cuti);

			$id = $this->input->post('kode_pegawai');
			$pegawai = $this->M_Permohonan->getDataPegawaiDetail($id);

			$id_pegawai = $this->User_model->getIdPegawai();

			$config['upload_path'] = './assets/data';
			$config['allowed_types'] = 'pdf';
			$config['file_name']    = 'surat-tahunan' . $id_pegawai . '-' . date('d-m-Y');

			$this->load->library('upload', $config, 'surat_pengantar');
			$this->surat_pengantar->initialize($config);
			$upload_surat_pengantar = $this->surat_pengantar->do_upload('surat_pengantar');

			if ($upload_surat_pengantar == TRUE) {
				date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
				$now = date('Y-m-d H:i:s');
				$data = array(
					'kode_pegawai'  => $this->input->post('kode_pegawai'),
					'nama'  		=> $pegawai['nama'],
					'perihal'		=> $this->input->post('perihal'),
					'tanggal_pengajuan' => $now,
					'mulai_cuti'    => $this->input->post('mulai'),
					'akhir_cuti'    => $this->input->post('berakhir'),
					'surat_tahunan' 	=> $this->surat_pengantar->data("file_name"),
					'keterangan'    => "Cuti Tahunan",
					'verifikasi' 	=> 3,
				);
				$this->db->insert('permohonan_cuti', $data);

				// // Set message
				$this->session->set_flashdata('data_ditambahkan', 'Data berhasil ditambah');

				redirect('pegawai/PermohonanCuti/cutiTahunan', $data);
				// var_dump($data);
			}
			// else {
			// 	var_dump($data);
			// }
		}
	}

	public function cutiDiluarTN()
	{
		$this->form_validation->set_rules('mulai', 'mulai', 'required');
		$data['jenis'] = $this->M_Permohonan->selectKetCuti();
		$data['select'] = $this->M_Permohonan->selectIdCuti();
		$data['ket'] = $this->M_Permohonan->getAllKeterangan();

		if ($this->form_validation->run() == FALSE) {
			$data['title']  = 'Permohonan Cuti Diluar Tanggungan Negara';
			$data['session'] = $this->session->userdata('nama');
			// $data['project']=$this->Feedback_Model->selectIdProject();
			// get data nama user (untuk tampil di sidebar dan navbar)
			$data['user']   = $this->db->query('select * from user where nama = "' . $_SESSION['nama'] . '"')->row();
			$this->load->view('theme_pegawai/header', $data);
			$this->load->view('pegawai/permohonan_cuti/cuti_diluartn', $data);
			$this->load->view('theme_pegawai/footer', $data);
		} else {
			$id_cuti = $this->input->post('id_cuti');
			$cuti = $this->M_Permohonan->getDataCutiDetail($id_cuti);

			$id = $this->input->post('kode_pegawai');
			$pegawai = $this->M_Permohonan->getDataPegawaiDetail($id);

			$id_pegawai = $this->User_model->getIdPegawai();

			$config['upload_path'] = './assets/data';
			$config['allowed_types'] = 'pdf';
			$config['file_name']    = 'surat-diluartn' . $id_pegawai . '-' . date('d-m-Y');

			$this->load->library('upload', $config, 'surat_pengantar');
			$this->surat_pengantar->initialize($config);
			$upload_surat_pengantar = $this->surat_pengantar->do_upload('surat_pengantar');

			if ($upload_surat_pengantar == TRUE) {
				date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
				$now = date('Y-m-d H:i:s');
				$data = array(
					'kode_pegawai'  => $this->input->post('kode_pegawai'),
					'nama'  		=> $pegawai['nama'],
					'perihal'		=> $this->input->post('perihal'),
					'tanggal_pengajuan' => $now,
					'mulai_cuti'    => $this->input->post('mulai'),
					'akhir_cuti'    => $this->input->post('berakhir'),
					'surat_diluartn' 	=> $this->surat_pengantar->data("file_name"),
					'keterangan'    => "Cuti Diluar Tanggungan Negara",
					'verifikasi' 	=> 3,
				);
				$this->db->insert('permohonan_cuti', $data);

				// // Set message
				$this->session->set_flashdata('data_ditambahkan', 'Data berhasil ditambah');

				redirect('pegawai/PermohonanCuti/cutiDiluarTN', $data);
				// var_dump($data);
			}
			// else {
			// 	var_dump($data);
			// }
		}
	}
}

