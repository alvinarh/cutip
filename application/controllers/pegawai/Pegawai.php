<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pegawai extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		// check_login();
		$this->load->model('pegawai/M_Pegawai');
		$this->load->model('User_model');
		$this->load->model('pegawai/M_Pegawai', 'pegawai');
		$this->load->library('form_validation');
		$this->load->helper('url','form');
	}

	// public function edit(){
	// 	// $id = $this->uri->segment(4);
	// 	$this->form_validation->set_rules('nama','masukan Nama','required');
	// 	$data['dataPegawai']	= $this->M_Pegawai->getDataPegawai();
	// 	$data['jenis']=$this->M_Pegawai->selectJenisKel();
	// 	if($this->form_validation->run() == FALSE){
	// 		$data['title']  = 'Edit Profile';
	// 		// get data nama user (untuk tampil di sidebar dan navbar)
	// 		$data['user']   = $this->db->query('select * from user where nama = "' . $_SESSION['nama'] . '"')->row();
	// 		// $data['edit_data'] = $this->Feedback_Model->editFeedback($id);
	// 		$this->load->view('theme_pegawai/header', $data);
    //         $this->load->view('pegawai/editprofile',$data);
    //         $this->load->view('theme_pegawai/footer', $data);
	// 	}else{
	// 		$kode_pegawai =$this->User_model->getIdPegawai();
	// 				$data = array(
	// 					'kode_pegawai' =>$kode_pegawai,
    //                     'nama'   => $this->input->post('nama'),
    //                     'alamat'    => $this->input->post('alamat'),
    //                     'jabatan' => $this->input->post('jabatan'),
    //                     'jenis_kel'=>$this->input->post('jenis_kel'),
    //                     'no_telp' => $this->input->post('notelp'),
    //                     'email' => $this->input->post('email')
	// 				);
	// 		$data['user'] = $this->user->edit();
	// 		$this->db->where('nama', $this->session->userdata('nama'));
    //   		$this->db->update('user',$data);
			// redirect($_SERVER['HTTP_REFERER']);
			// redirect('pegawai/dashboard',$data);

     	// }

	// }

	public function editprofil()
    {
		$data['title'] = 'Edit Profil' ;
        $data['dataPegawai']	= $this->M_Pegawai->getDataPegawai();
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		// $data['user']   = $this->db->query('select * from user where nama = "' . $_SESSION['pegawai'] . '"')->row();
		$data['data'] = $this->pegawai->getPegawaiByEdit($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('notelp', 'No Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('theme_pegawai/header', $data);
            $this->load->view('pegawai/editprofile', $data);
            $this->load->view('theme_pegawai/footer', $data);
        } else {

            $data['user'] = $this->pegawai->editProfil();
            $this->session->set_flashdata('success', 'Diubah!');
            redirect('user/logout');
        }
    }

    public function index(){

		$data['title']          = 'Data Pegawai';
		$data['dataPegawai']	= $this->M_Pegawai->getDataPegawai();
		$data['user']   = $this->db->query('select * from user where nama = "' . $_SESSION['pegawai'] . '"')->row();
		$this->load->view('theme_pegawai/header', $data);
		$this->load->view('pegawai/pegawai/daftar_pegawai',$data);
		$this->load->view('theme_pegawai/footer', $data);
	}

	// public function editprofile($id)
	// {
	// 	$data['title'] = 'Edit Profile';
	// 	$data['user'] = $this->user->getPegawaiByEdit($id);
	// 	$data['user'] = $this->db->get_where('user', ['email' =>
	// 	$this->session->userdata('email')])->row_array();
	// 	$data['user']   = $this->db->query('select * from user where nama = "' . $_SESSION['pegawai'] . '"')->row();
	// 	$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
	// 	$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
	// 	$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
	// 	$this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim');
	// 	$this->form_validation->set_rules('password', 'Password', 'required|trim');
	// 	if ($this->form_validation->run() == false) {
	// 		$this->load->view('theme_pegawai/header', $data);
	// 		$this->load->view('pegawai/editprofile', $data);
	// 		$this->load->view('theme_pegawai/footer', $data);
	// 	} else {
	// 		$data = [
	// 			'email' => $this->input->post('email'),
	// 			'nama' => htmlspecialchars($this->input->post('nama', true)),
	// 			'jabatan' => $this->input->post('jabatan'),
	// 			'alamat' => $this->input->post('alamat'),
	// 			'no_telp' => $this->input->post('no_telp'),
	// 			'password' => $this->input->post('password')
	// 		];

	// 		$data['user'] = $this->user->editProfil();
	// 		$this->db->where('email', $this->session->userdata('email'));
	// 		$this->db->update('user', $data);

	// 		$this->session->set_flashdata('message', '<div class="alert
    //         alert-success" role="alert"> Berhasil dirubah
    //         </div>');
	// 		redirect('pegawai/editprofile');
	// 	}
	// }
	// public function edit($id){
	// 	// $id = $this->uri->segment(4);
	// 	$this->form_validation->set_rules('nama','masukan Nama Pegawai','required');
	// 	$data['dataPegawai']	= $this->M_Pegawai->getDataPegawai();
	// 	$data['jenis']=$this->M_Pegawai->selectJenisKel();
	// 	$data['status']=$this->M_Pegawai->selectStatusPegawai();
	// 	if($this->form_validation->run() == FALSE){
	// 		$data['title']  = 'Edit Pegawai';
	// 		$data['data']	= $this->M_Pegawai->detailData($id);
	// 		// get data nama user (untuk tampil di sidebar dan navbar)
	// 		$data['user']   = $this->db->query('select * from user where username = "' . $_SESSION['username'] . '"')->row();
	// 		// $data['edit_data'] = $this->Feedback_Model->editFeedback($id);
	// 		$this->load->view('theme_pegawai/header', $data);
    //         $this->load->view('pegawai/pegawai/edit_pegawai',$data);
    //         $this->load->view('theme_pegawai/footer', $data);
	// 	}else{
	// 		$id_pegawai =$this->User_model->getIdPegawai();
	// 				$data = array(
	// 					'kode_pegawai' =>$id_pegawai,
    //                     'nama_pegawai'   => $this->input->post('nama'),
    //                     'alamat'    => $this->input->post('alamat'),
    //                     'jabatan' => $this->input->post('jabatan'),
    //                     'jenis_kel'=>$this->input->post('jenis_kel'),
    //                     'no_telp' => $this->input->post('notelp'),
    //                     'email' => $this->input->post('email'),
    //                     'status' => $this->input->post('status'),
	// 				);

	// 		$this->db->where('kode_pegawai',$id);
    //   		$this->db->update('user',$data);
	// 		// redirect($_SERVER['HTTP_REFERER']);
	// 		redirect('pegawai/Pegawai/index',$data);

    //  	}

	// }

	//membuat function delete
	public function deletePegawai($id){
		$this->M_Pegawai->deleteDataPegawai($id);
		redirect(base_url('pegawai/Pegawai/index'));
	}

}