<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_Cuti extends CI_Model {

    public function dataCutiSakit(){
		$this->db->select('*');
    	$this->db->from('permohonan_cuti');
      $this->db->where('keterangan','Cuti Sakit');
    	$query=$this->db->get();
		return $query->num_rows();
	}

  public function dataCutiMelahirkan(){
		$this->db->select('*');
    	$this->db->from('permohonan_cuti');
        $this->db->where('keterangan','Cuti Melahirkan');
    	$query=$this->db->get();
		return $query->num_rows();
	}

  public function dataCutiAlasanPenting(){
		$this->db->select('*');
    	$this->db->from('permohonan_cuti');
        $this->db->where('keterangan','Cuti Alasan Penting');
    	$query=$this->db->get();
		return $query->num_rows();
	}

  public function dataCutiBesar(){
		$this->db->select('*');
    	$this->db->from('permohonan_cuti');
        $this->db->where('keterangan','Cuti Besar');
    	$query=$this->db->get();
		return $query->num_rows();
	}

  public function dataCutiTahunan(){
		$this->db->select('*');
    	$this->db->from('permohonan_cuti');
        $this->db->where('keterangan','Cuti Tahunan');
    	$query=$this->db->get();
		return $query->num_rows();
	}

  public function dataCutiDiluarTN(){
		$this->db->select('*');
    	$this->db->from('permohonan_cuti');
        $this->db->where('keterangan','Cuti Diluar Tanggungan Negara');
    	$query=$this->db->get();
		return $query->num_rows();
	}


  //riwayatcuti
  public function cutiSakit()
  {
    $query = "SELECT * from permohonan_cuti where keterangan = 'Cuti Sakit' and verifikasi = '3' order by id_cuti DESC";
		return $this->db->query($query)->result();
  }

  public function cutiMelahirkan()
  {
    $query = "SELECT * from permohonan_cuti where keterangan = 'Cuti Melahirkan' and verifikasi = '3' order by id_cuti DESC";
		return $this->db->query($query)->result();
  }

  public function cutiAlasanPenting()
  {
    $query = "SELECT * from permohonan_cuti where keterangan = 'Cuti Alasan Penting' and verifikasi = '3' order by id_cuti DESC";
		return $this->db->query($query)->result();
  }

  public function cutiBesar()
  {
    $query = "SELECT * from permohonan_cuti where keterangan = 'Cuti Besar' and verifikasi = '3' order by id_cuti DESC";
		return $this->db->query($query)->result();
  }
    
  public function cutiTahunan()
  {
    $query = "SELECT * from permohonan_cuti where keterangan = 'Cuti Tahunan' and verifikasi = '3' order by id_cuti DESC";
		return $this->db->query($query)->result();
  }

  public function cutiDiluarTN()
  {
    $query = "SELECT * from permohonan_cuti where keterangan = 'Cuti Diluar Tanggungan Negara' and verifikasi = '3' order by id_cuti DESC";
		return $this->db->query($query)->result();
  }

    public function getDataCutiDetail($id){
    $this->db->where('id_cuti',$id);
    $query=$this->db->get('permohonan_cuti');
    return $query->row_array();
   }

    public function getDataPimpinanDetail($id){
    $this->db->where('kode_pimpinan',$id);
    $query=$this->db->get('pimpinan');
    return $query->row_array();
   }

    public function selectStatus(){
        $this->db->select('verifikasi');
        $this->db->from('permohonan_cuti');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            $row = $query->row_array();
            return $row;
        }
     }

     //membuat verifikasi tipe perusahaan
     public function pilihKeteranganCuti(){
       $query="SELECT `ket_cuti`.keterangan as id, `permohonan_cuti`.`keterangan` FROM  `ket_cuti` JOIN `permohonan_cuti` ON `permohonan_cuti`.`keterangan` = `ket_cuti`.`id`";
       return $this->db->query($query)->row_array();
  }
  //memanggil id pada table project
  public function getProjectById($id){
    return $this->db->get_where('ket_cuti',['id' => $id])->row_array();
  }
  //memanggil data jenis project
  public function getAllJenis(){
    return $this->db->get('ket_cuti')->result_array();
  }

  //membuat verifikasi tipe perusahaan
     public function pilihIdPimpinan(){
       $query="SELECT `pimpinan`.nama as id, `permohonan_cuti`.`kode_pimpinan` FROM  `pimpinan` JOIN `permohonan_cuti` ON `permohonan_cuti`.`kode_pimpinan` = `pimpinan`.`kode_pimpinan`";
       return $this->db->query($query)->row_array();
  }
  //memanggil id pada table project
  public function getPimpinanById($id){
    return $this->db->get_where('pimpinan',['kode_pimpinan' => $id])->row_array();
  }
  //memanggil data jenis project
  public function getPimpinan(){
    return $this->db->get('pimpinan')->result_array();
  }

  public  function deleteDataCuti($id){
    $this->db->where('id_cuti',$id);
    $this->db->delete('permohonan_cuti');
   }

}