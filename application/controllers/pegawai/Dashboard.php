<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// check_login();
		$this->load->model('pegawai/M_Cuti');
		$this->load->model('pegawai/M_Pegawai');

		// if(!$this->session->userdata('pegawai') == true){
		//     redirect('User');
		// }
	}

	public function index()
	{
		$data['title']  = 'Dashboard';
		$user = $this->db->query('select * from user where nama = "' . $_SESSION['nama'] . '"')->row();
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['jenis_kelamin'] = $this->db->query('select * from user where kode_pegawai = "' . $_SESSION['userid'] . '"')->row_array();

		$data['total_pegawai'] = $this->db->get("user")->num_rows();
		$data['cuti_sakit'] = $this->M_Cuti->dataCutiSakit($id);
		$data['cuti_melahirkan'] = $this->M_Cuti->dataCutiMelahirkan($id);
		$data['cuti_alasanpenting'] = $this->M_Cuti->dataCutiAlasanPenting($id);
		$data['cuti_besar'] = $this->M_Cuti->dataCutiBesar($id);
		$data['cuti_tahunan'] = $this->M_Cuti->dataCutiTahunan($id);
		$data['cuti_diluartn'] = $this->M_Cuti->dataCutiDiluarTN($id);

		// get data nama user (untuk tampil di sidebar dan navbar)
		$data['user']   = $this->db->query('select * from user where nama = "' . $_SESSION['nama'] . '"')->row();

		$this->load->view('theme_pegawai/header', $data);
		$this->load->view('pegawai/dashboard', $data);
		$this->load->view('theme_pegawai/footer', $data);
	}
}
