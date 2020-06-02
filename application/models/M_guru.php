<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {

	public function getMasterMataPelajaran($params=null)
	{
		$this->db->select('mata_pelajaran.*,master_mata_pelajaran.mata_pelajaran');
		$this->db->from('mata_pelajaran');
		$this->db->join('master_mata_pelajaran','master_mata_pelajaran.id = mata_pelajaran.id_master_mata_pelajaran');

		if($params){
			$this->db->where('mata_pelajaran.id',$params);
		}
		$this->db->where('id_guru',$this->session->userdata('data')['id']);
		$query = $this->db->get();
		return $query;

	}

	public function get_count_file_modul($id)
	{
		$this->db->select('file_modul.*');
		$this->db->from('file_modul');
		$this->db->where('id_modul',$id);
		$query = $this->db->get();
		return $query;
	}

	public function get_count_quiz($id)
	{
		$this->db->select('quiz.*');
		$this->db->from('quiz');
		$this->db->where('id_modul',$id);
		$query = $this->db->get();
		return $query;
	}

	public function getFileModul($params=null)
	{
		$this->db->select('file_modul.*,modul.mata_pelajaran,modul.modul');
		$this->db->from('file_modul');
		$this->db->join('modul','modul.id = file_modul.id_modul');

		if($params){
			$this->db->where('file_modul.id',$params);
		}
		$this->db->where('modul.id_guru',$this->session->userdata('data')['id']);
		$query = $this->db->get();
		return $query;

	}

	public function getSoal($params=null)
	{
		$this->db->select('quiz.*,modul.mata_pelajaran,modul.modul');
		$this->db->from('quiz');
		$this->db->join('modul','modul.id = quiz.id_modul');
		$this->db->where('modul.id_guru',$this->session->userdata('data')['id']);

		if($params){
			$this->db->where('quiz.id',$params);
		}
		$this->db->group_by('quiz.id_modul');
		$query = $this->db->get();
		return $query;

	}

	public function getDataProfile($id)
	{
		$this->db->where('id',$id);
		$this->db->from('guru');
		return $this->db->get();
	}

	public function getDataPengajaran($id)
	{
		$this->db->select('
			belajar.*,
			murid.nama,
			modul.mata_pelajaran,
			modul.modul,
			transaksi.status_clear,
			transaksi.status_verf
			');
		$this->db->from('belajar');
		$this->db->join('murid','murid.id = belajar.id_murid');
		$this->db->join('modul','modul.id = belajar.id_modul');
		$this->db->join('transaksi','transaksi.id_belajar = belajar.id');
		$this->db->where('belajar.id_guru',$id);
		$this->db->where('transaksi.status_clear <',3);
		$this->db->where('transaksi.status_verf >',0);
		$this->db->order_by('transaksi.created_at','DESC');
		$query = $this->db->get();
		return $query;

	}

	public function getDataDetailPengajaran($id)
	{
		$this->db->select('
			belajar.*,
			murid.nama,
			modul.mata_pelajaran,
			modul.modul,
			transaksi.status_clear
			');
		$this->db->from('belajar');
		$this->db->join('murid','murid.id = belajar.id_murid');
		$this->db->join('modul','modul.id = belajar.id_modul');
		$this->db->join('transaksi','transaksi.id_belajar = belajar.id');
		$this->db->where('belajar.id',$id);
		$this->db->where('transaksi.status_clear <',3);
		$this->db->order_by('transaksi.created_at','DESC');
		$query = $this->db->get();
		return $query;

	}

	public function getDaftarDataMurid($id_guru = null)
	{
		$this->db->select('
			a.*,
			b.nama,
			c.mata_pelajaran,
			');
		$this->db->from('belajar a');
		$this->db->join('murid b','b.id = a.id_murid','left');
		$this->db->join('master_mata_pelajaran c','c.id = a.id_master_mata_pelajaran','left');

		if($id_guru){
			$this->db->where('a.id_guru',$id_guru);
		}

		$query = $this->db->get();
		return $query;

	}

	public function getTransaksi($param)
	{
		$this->db->select('belajar.*, modul.mata_pelajaran, modul.modul, murid.nama, transaksi.status_clear, transaksi.tgl_clear');
		$this->db->from('belajar');
		$this->db->join('modul','modul.id = belajar.id_modul');
		$this->db->join('murid','murid.id = belajar.id_murid');
		$this->db->join('transaksi','transaksi.id_belajar = belajar.id');
		$this->db->where($param);
		$this->db->order_by('transaksi.tgl_clear','DESC');
		return $this->db->get();
	}

	public function getSum($id)
	{
		$this->db->where('id_guru',$id);
		$this->db->from('rating');
		$query = $this->db->select('SUM(rating) as sum_rating');
		return $query->get();
	}

	public function getDataRating($param)
	{
		$this->db->select('rating.*, murid.nama');
		$this->db->from('rating');
		$this->db->join('murid','murid.id = rating.id_murid');
		$this->db->where($param);
		return $this->db->get();
	}

	public function notifGuruMuridBaru($id)
	{
		$this->db->select('COUNT(transaksi.status_verf) as notif_guru_murid_baru');
		$this->db->from('belajar');
		$this->db->join('transaksi','transaksi.id_belajar = belajar.id');
		$this->db->where('transaksi.status_verf',1);
		$this->db->where('belajar.id_guru',$id);
		return $this->db->get();
	}

	public function notifGuruMuridBelajar($id)
	{
		$this->db->select('COUNT(transaksi.status_verf) as notif_guru_murid_belajar');
		$this->db->from('belajar');
		$this->db->join('transaksi','transaksi.id_belajar = belajar.id');
		$this->db->where('transaksi.status_verf',2);
		$this->db->where('transaksi.status_clear',0);
		$this->db->where('belajar.id_guru',$id);
		return $this->db->get();
	}

	public function notifGuruMuridNilai($id)
	{
		$this->db->select('COUNT(transaksi.status_clear) as notif_guru_murid_nilai');
		$this->db->from('belajar');
		$this->db->join('transaksi','transaksi.id_belajar = belajar.id');
		$this->db->where('transaksi.status_clear',1);
		$this->db->where('belajar.id_guru',$id);
		return $this->db->get();
	}

	public function notifGuruTx($id)
	{
		$this->db->select('COUNT(transaksi.status_clear) as notif_guru_tx');
		$this->db->from('belajar');
		$this->db->join('transaksi','transaksi.id_belajar = belajar.id');
		$this->db->where('transaksi.status_clear',2);
		$this->db->where('belajar.id_guru',$id);
		return $this->db->get();
	}

}
