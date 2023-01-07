<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
    function __construct()
    { 
        parent::__construct();
		// check_login();
        $this->load->model('admin/M_Cuti');
        $this->load->model('admin/M_Pegawai');

        // if(!$this->session->userdata('admin') == true){
        //     redirect('User');
        // }
    }
 
    public function index()
    { 
        $data['title']  = 'Dashboard';
        $user = $this->db->query('select * from admin where nama = "'.$_SESSION['nama'].'"')->row();

        $data['total_pegawai'] = $this->db->get("user")->num_rows();
        $data['cuti_sakit'] = $this->M_Cuti->dataCutiSakit();
        $data['cuti_melahirkan'] = $this->M_Cuti->dataCutiMelahirkan();
        $data['cuti_alasanpenting'] = $this->M_Cuti->dataCutiAlasanPenting();
        $data['cuti_besar'] = $this->M_Cuti->dataCutiBesar();
        $data['cuti_tahunan'] = $this->M_Cuti->dataCutiTahunan();
        $data['cuti_diluartn'] = $this->M_Cuti->dataCutiDiluarTN();
        $data['total_cuti'] = $this->db->get('permohonan_cuti')->num_rows();

        // get data nama user (untuk tampil di sidebar dan navbar)
        $data['user']   = $this->db->query('select * from admin where nama = "'.$_SESSION['nama'].'"')->row();

        $this->load->view('theme_admin/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('theme_admin/footer', $data);
    }
}
