<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_Laporan extends CI_Model
{

	public function dataCutiSakit()
	{
		$query = "SELECT u.jabatan,p.* from permohonan_cuti p , user u where  u.kode_pegawai = p.kode_pegawai and p.keterangan = 'Cuti Sakit' and p.verifikasi = '1'";
		return $this->db->query($query)->result();
	}

	public function dataCutiMelahirkan()
	{
		$query = "SELECT u.jabatan,p.* from permohonan_cuti p , user u where  u.kode_pegawai = p.kode_pegawai and p.keterangan = 'Cuti Melahirkan' and p.verifikasi = '1'";
		return $this->db->query($query)->result();
	}

	public function dataCutiAlasanPenting()
	{
		$query = "SELECT u.jabatan,p.* from permohonan_cuti p , user u where  u.kode_pegawai = p.kode_pegawai and p.keterangan = 'Cuti Alasan Penting' and p.verifikasi = '1'";
		return $this->db->query($query)->result();
	}

	public function dataCutiBesar()
	{
		$query = "SELECT u.jabatan,p.* from permohonan_cuti p , user u where  u.kode_pegawai = p.kode_pegawai and p.keterangan = 'Cuti Besar' and p.verifikasi = '1'";
		return $this->db->query($query)->result();
	}

	public function dataCutiTahunan()
	{
		$query = "SELECT u.jabatan,p.* from permohonan_cuti p , user u where  u.kode_pegawai = p.kode_pegawai and p.keterangan = 'Cuti Tahunan' and p.verifikasi = '1'";
		return $this->db->query($query)->result();
	}

	public function dataCutiDiluarTN()
	{
		$query = "SELECT u.jabatan,p.* from permohonan_cuti p , user u where  u.kode_pegawai = p.kode_pegawai and p.keterangan = 'Cuti Diluar Tanggungan' and p.verifikasi = '1'";
		return $this->db->query($query)->result();
	}

	public function cetakCutiSakit($kode_pegawai)
  {
    $this->db->select('user.*,permohonan_cuti.*');
    $this->db->from('user');
    $this->db->join('permohonan_cuti', 'permohonan_cuti.kode_pegawai=user.kode_pegawai');
    $this->db->where('user.kode_pegawai', $kode_pegawai);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function cetakCutiMelahirkan($kode_pegawai)
  {
    $this->db->select('user.*,permohonan_cuti.*');
    $this->db->from('user');
    $this->db->join('permohonan_cuti', 'permohonan_cuti.kode_pegawai=user.kode_pegawai');
    $this->db->where('user.kode_pegawai', $kode_pegawai);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function cetakCutiAlasanPenting($kode_pegawai)
  {
    $this->db->select('user.*,permohonan_cuti.*');
    $this->db->from('user');
    $this->db->join('permohonan_cuti', 'permohonan_cuti.kode_pegawai=user.kode_pegawai');
    $this->db->where('user.kode_pegawai', $kode_pegawai);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function cetakCutiBesar($kode_pegawai)
  {
    $this->db->select('user.*,permohonan_cuti.*');
    $this->db->from('user');
    $this->db->join('permohonan_cuti', 'permohonan_cuti.kode_pegawai=user.kode_pegawai');
    $this->db->where('user.kode_pegawai', $kode_pegawai);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function cetakCutiTahunan($kode_pegawai)
  {
    $this->db->select('user.*,permohonan_cuti.*');
    $this->db->from('user');
    $this->db->join('permohonan_cuti', 'permohonan_cuti.kode_pegawai=user.kode_pegawai');
    $this->db->where('user.kode_pegawai', $kode_pegawai);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function cetakCutiDiluarTN($kode_pegawai)
  {
    $this->db->select('user.*,permohonan_cuti.*');
    $this->db->from('user');
    $this->db->join('permohonan_cuti', 'permohonan_cuti.kode_pegawai=user.kode_pegawai');
    $this->db->where('user.kode_pegawai', $kode_pegawai);
    $query = $this->db->get();
    return $query->row_array();
  }
}
