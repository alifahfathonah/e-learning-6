<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        
        $this->load->model('m_murid');
        $this->load->model('m_elearning');
    }

	public function index()
	{	
		if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
		$param['belajar.id_murid'] = $this->session->userdata('data')['id'];
		$param['transaksi.status_verf >'] = 1;
		$data = array('content' => 'murid/view_belajar','href'=>'Pembelajaran',
			'url_home'=>'murid/belajar');
		$data['data_belajar'] = $this->m_murid->getDataVerifikasi($param)->result();

		//notif murid
		$idNotifMurid = $this->session->userdata('data')['id'];
		$getNotifMuridVerf = $this->m_murid->notifMuridVerf($idNotifMurid)->row();
		$data['notif_murid_verf'] = $getNotifMuridVerf->notif_murid_verf;
		
		$this->load->view('main/home',$data);
	}

	public function pembelajaran($id)
	{
		if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
		$param['belajar.id'] = $id;
		$data = array('content' => 'murid/form_belajar','href'=>'Pembelajaran',
			'url_home'=>'murid/belajar');

		$data['data_belajar'] = $this->m_murid->getDataVerifikasi($param)->row();
		$param = array('id_modul'=>$data['data_belajar']->id_modul);
		$data['modul'] = $this->m_murid->getModul($param)->result();
		//notif murid
		$idNotifMurid = $this->session->userdata('data')['id'];
		$getNotifMuridVerf = $this->m_murid->notifMuridVerf($idNotifMurid)->row();
		$data['notif_murid_verf'] = $getNotifMuridVerf->notif_murid_verf;
		
		$this->load->view('main/home',$data);
	}

	public function done($id)
	{
		if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }

		
		redirect('murid/soal/index/'.$id);
	}

	public function result()
	{
		if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
		$param['belajar.id_murid'] = $this->session->userdata('data')['id'];
		$param['transaksi.status_clear >='] = 1;
		$data = array('content' => 'murid/view_result','href'=>'Hasil belajar',
			'url_home'=>'murid/belajar/result');
		$data['data_belajar'] = $this->m_murid->getDataVerifikasi($param)->result();

		//notif murid
		$idNotifMurid = $this->session->userdata('data')['id'];
		$getNotifMuridVerf = $this->m_murid->notifMuridVerf($idNotifMurid)->row();
		$data['notif_murid_verf'] = $getNotifMuridVerf->notif_murid_verf;
		
		$this->load->view('main/home',$data);
	}

	public function saveRating()
	{
		if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }

		$data = array(
			'id_murid' => $this->input->post('id_murid'),
			'id_guru' => $this->input->post('id_guru'),
			'rating' => $this->input->post('rating'),
			'deskripsi' => $this->input->post('deskripsi'),
		);

		$query = $this->m_elearning->saveData('rating',$data);
		if($query){
			$message = array('message'=>'Belajar Telah selesai, Silahkan Tunggu Nilai dan Sertifikat dari guru yang bersangkutan','success'=>true);
		}else{
			$message = array('message'=>'Transaksi Gagal, silahkan coba lagi','success'=>false);
		}
		echo json_encode($message);
	}
	
	public function profile_guru($id)
	{
		if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
		$data = array(
			'content' => 'murid/view_profile_guru',
			'href'=>'Data guru',
			'url_home'=>'murid/belajar/profile_guru'
			);
		$data['data'] = $this->m_elearning->getDataAll('guru',$id);

		//notif murid
		$idNotifMurid = $this->session->userdata('data')['id'];
		$getNotifMuridVerf = $this->m_murid->notifMuridVerf($idNotifMurid)->row();
		$data['notif_murid_verf'] = $getNotifMuridVerf->notif_murid_verf;
		
		$this->load->view('main/home',$data);
	}

	public function sertifikat()
	{
		$param['belajar.id'] = $this->input->get('property');
		$data['data_belajar'] = $this->m_murid->getDataVerifikasi($param)->row();
		$this->load->view('murid/view_sertifikat',$data);
	}

}
