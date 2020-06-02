<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        $this->load->model('m_elearning');
        $this->load->model('m_administrator');
        $this->load->model('m_murid');
        $this->load->model('m_guru');
    }

	public function index()
	{
		$idUser = $this->session->userdata('data')['id'];
		$data = array(
			'content' => 'main/dashboard',
			'title'=>'Dashboard',
			'href'=>'Dashboard',
			'url_home'=>''
			);

		//notif admin
		$getNotifAdminGuru = $this->m_administrator->notifAdminGuru()->row();
		$data['notif_admin_guru'] = $getNotifAdminGuru->notif_admin_guru;

		$getNotifAdminTxVerf = $this->m_administrator->notifAdminTxVerf()->row();
		$data['notif_admin_tx_verf'] = $getNotifAdminTxVerf->notif_admin_tx_verf;

		$getNotifAdminTxClear = $this->m_administrator->notifAdminTxClear()->row();
		$data['notif_admin_tx_clear'] = $getNotifAdminTxClear->notif_admin_tx_clear;

		//notif murid
		$getNotifMuridVerf = $this->m_murid->notifMuridVerf($idUser)->row();
		$data['notif_murid_verf'] = $getNotifMuridVerf->notif_murid_verf;

		//notif guru
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

	function doku()
	{
		$idUser = $this->session->userdata('data')['id'];
		$data = array(
			'content' => 'main/view_doku',
			'title'=>'Doku',
			'href'=>'doku',
			'url_home'=>''
			);

		$this->load->view('main/home',$data);
		
	}
}
