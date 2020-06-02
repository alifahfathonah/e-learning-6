<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

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
		$data = array('content' => 'guru/view_modul','href'=>'Modul',
			'url_home'=>'guru/modul');
		$param['id_guru'] = $this->session->userdata('data')['id'];
		
		$get_data_modul = $this->m_elearning->getData($param,'modul')->result();
		$data_modul = [];
		$i = 0;
		foreach ($get_data_modul as $value) {
			$count_file = $this->m_guru->get_count_file_modul($value->id)->num_rows();
			$count_quiz = $this->m_guru->get_count_quiz($value->id)->num_rows();
			$data_modul[$i]= array(
				'id' => $value->id,
				'id_guru' => $value->id_guru,
				'mata_pelajaran' => $value->mata_pelajaran,
				'modul' => $value->modul,
				'harga' => $value->harga,
				'count_file' => $count_file,
				'count_quiz' => $count_quiz
			);
			$i++;
		}
		$data['data_modul'] = $data_modul;
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

	public function inputData()
	{
		$data = array('content' => 'guru/form_modul','href'=>'Input Modul',
			'url_home'=>'guru/modul');
		// $data['data_mata_pelajaran'] = $this->m_elearning->getDataAll('master_mata_pelajaran');
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

	public function saveData()
	{
		$data = array(
			"id_guru" => $this->session->userdata('data')['id'],
			"mata_pelajaran" => $this->input->post('mata_pelajaran'),
			"modul" => $this->input->post('modul'),
			"harga" => $this->input->post('harga'),
		);

		$query = $this->m_elearning->saveData('modul',$data);
		if($query){
			$success = "alert alert-success";
			$message = "Data has been added";
			$icon = "icon fa fa-check";
		}else{
			$success = "alert alert-danger";
			$message = "Data failed to insert";
			$icon = "icon fa fa-ban";
		}
		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message
              </div>");

		redirect('guru/modul');

	}

	public function editData($id)
	{
		$param['id'] = $id;
		$data = array('content'=> 'guru/form_modul','data' => $this->m_elearning->getData($param,'modul')->result(),'href'=>'Ubah Modul',
			'url_home'=>'guru/modul');
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
		$params['id'] = $this->input->post('id');
		$data['mata_pelajaran'] = $this->input->post('mata_pelajaran');
		$data['modul'] = $this->input->post('modul');
		$data['harga'] = $this->input->post('harga');

		$query = $this->m_elearning->updateData($params,'modul',$data);
		if($query){
			$success = "alert alert-success";
			$message = "Data has been update";
			$icon = "icon fa fa-check";
		}else{
			$success = "alert alert-danger";
			$message = "Data failed to insert";
			$icon = "icon fa fa-ban";
		}
		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message
              </div>");
		redirect('guru/modul');
	}

	public function deleteData($id)
	{
		$params['id'] = $id;
		$query = $this->m_elearning->deleteData($params,'modul');
		if($query){
			$success = "alert alert-success";
			$message = "Data has been delete";
			$icon = "icon fa fa-check";
		}else{
			$success = "alert alert-danger";
			$message = "Data failed to delete";
			$icon = "icon fa fa-ban";
		}
		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message
              </div>");
		redirect('guru/modul');

	}
}
