<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajaran extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        $this->load->model('m_elearning');
        $this->load->model('m_guru');
    }

	public function index()
	{
		$id_guru = $this->session->userdata('data')['id'];
		$data = array('content' => 'guru/view_pengajaran','href'=>'Pengajaran',
			'url_home'=>'guru/pengajaran');
		$data['data_pengajaran'] = $this->m_guru->getDataPengajaran($id_guru)->result();
		//notif guru
		$idUser = $this->session->userdata('data')['id'];
		$getNotifGuruMuridBaru = $this->m_guru->notifGuruMuridBaru($idUser)->row();
		$data['notif_guru_murid_baru'] = $getNotifGuruMuridBaru->notif_guru_murid_baru;

		$getNotifGuruMuridBelajar = $this->m_guru->notifGuruMuridBelajar($idUser)->row();
		$data['notif_guru_murid_belajar'] = $getNotifGuruMuridBelajar->notif_guru_murid_belajar;

		$getNotifGuruMuridNilai = $this->m_guru->notifGuruMuridNilai($idUser)->row();
		$data['notif_guru_murid_nilai'] = $getNotifGuruMuridNilai->notif_guru_murid_nilai;

		$getNotifGuruTx = $this->m_guru->notifGuruTx($idUser)->row();
		$data['notif_guru_tx'] = $getNotifGuruTx->notif_guru_tx;
		$this->load->view('main/home',$data);
	}

	public function editData($id)
	{
		$id_guru = $this->session->userdata('data')['id'];
		$data = array(
			'content'=> 'guru/form_pengajaran',
			'data' => $this->m_guru->getDataDetailPengajaran($id)->result(),
			'href'=>'Ubah Pengajaran',
			'url_home'=>'guru/pengajaran/editData');
		//notif guru
		$idUser = $this->session->userdata('data')['id'];
		$getNotifGuruMuridBaru = $this->m_guru->notifGuruMuridBaru($idUser)->row();
		$data['notif_guru_murid_baru'] = $getNotifGuruMuridBaru->notif_guru_murid_baru;

		$getNotifGuruMuridBelajar = $this->m_guru->notifGuruMuridBelajar($idUser)->row();
		$data['notif_guru_murid_belajar'] = $getNotifGuruMuridBelajar->notif_guru_murid_belajar;

		$getNotifGuruMuridNilai = $this->m_guru->notifGuruMuridNilai($idUser)->row();
		$data['notif_guru_murid_nilai'] = $getNotifGuruMuridNilai->notif_guru_murid_nilai;

		$getNotifGuruTx = $this->m_guru->notifGuruTx($idUser)->row();
		$data['notif_guru_tx'] = $getNotifGuruTx->notif_guru_tx;
		$this->load->view('main/home',$data);
	}

	public function updateData()
	{	
		$id['id'] = $this->input->post('id');
		$data = array(
			"nilai" => $this->input->post('nilai')
		);

		$query = $this->m_elearning->updateData($id,'belajar',$data);

		if($query){
			$datanya['status_clear'] = 2;
			$params['id_belajar'] = $this->input->post('id');
			$this->m_elearning->updateData($params,'transaksi',$datanya);
			$success = "alert alert-success";
			$message = "Data has been update";
			$icon = "icon fa fa-check";
		}else{
			$success = "alert alert-danger";
			$message = "Data failed to update";
			$icon = "icon fa fa-ban";
		}
		
		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\"><h4><i class=\"$icon\"></i> Alert!</h4>$message</div>");
		redirect('guru/pengajaran');

	}

}
