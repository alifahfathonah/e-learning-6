<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_modul extends CI_Controller {

	public $url = "";

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        $this->load->model('m_elearning');
        $this->load->model('m_guru');
		$this->load->library('upload');

    }

	public function index()
	{
		$data = array('content' => 'guru/view_file_modul','href'=>'File Modul',
			'url_home'=>'guru/file_modul');
		$data['data_modul'] = $this->m_guru->getFileModul()->result();
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
		$data = array('content' => 'guru/form_file_modul','href'=>'File Modul',
			'url_home'=>'guru/file_modul');
		$param['id_guru'] = $this->session->userdata('data')['id'];
		$data['data_modul'] = $this->m_elearning->getData($param,'modul')->result();
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
		$config = array(
			'upload_path' => "./assets/file/modul/",
			'allowed_types' => "jpg|png|jpeg|pdf|mp4|mp3|avi",
			'overwrite' => TRUE,
			'max_size' => "114091846000000000"
		);

		$this->upload->initialize($config);
		if($this->upload->do_upload('file')){
			$data = array('upload_data' => $this->upload->data());
			$fileName = $data['upload_data']['file_name'];
			$data = array(
				"id_modul" => $this->input->post('id_modul'),
				"file" => $fileName,
			);

			$query = $this->m_elearning->saveData('file_modul',$data);
			if($query){
				$success = "alert alert-success";
				$message = "Data has been added";
				$icon = "icon fa fa-check";
			}else{
				$success = "alert alert-danger";
				$message = "Data failed to insert";
				$icon = "icon fa fa-ban";
			}
		}else{
			$success = "alert alert-danger";
			$message = $this->upload->display_errors();
		}

		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message
              </div>");
		redirect('guru/file_modul');
	}

	public function editData($id)
	{
		$data = array('content'=> 'guru/form_file_modul','data' => $this->m_guru->getFileModul($id)->result(),'href'=>'File Modul',
			'url_home'=>'guru/file_modul');
		$param['id_guru'] = $this->session->userdata('data')['id'];
		$data['data_modul'] = $this->m_elearning->getData($param,'modul')->result();
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
		$param['id'] = $this->input->post('id');
		if($_FILES['file']['name']!=""){
			$config = array(
				'upload_path' => "./assets/file/modul/",
				'allowed_types' => "jpg|png|jpeg|pdf|mkv|mp4|mp3|avi",
				'overwrite' => TRUE,
				'max_size' => "114091846000000000"
			);
			$this->upload->initialize($config);
			if($this->upload->do_upload('file')){
				$data = array('upload_data' => $this->upload->data());
				$fileName = $data['upload_data']['file_name'];
				$data = array(
					"id_modul" => $this->input->post('id_modul'),
					"file" => $fileName,
				);

				$query = $this->m_elearning->updateData($param,'file_modul',$data);
				if($query){
					$success = "alert alert-success";
					$message = "Data has been update";
					$icon = "icon fa fa-check";
				}else{
					$success = "alert alert-danger";
					$message = "Data failed to update";
					$icon = "icon fa fa-ban";
				}
			}else{
				$success = "alert alert-danger";
				$message = $this->upload->display_errors();
			}
		}else{
			$data = array(
				"id_modul" => $this->input->post('id_modul')
			);

			$query = $this->m_elearning->updateData($param,'file_modul',$data);
			if($query){
				$success = "alert alert-success";
				$message = "Data has been update";
				$icon = "icon fa fa-check";
			}else{
				$success = "alert alert-danger";
				$message = "Data failed to update";
				$icon = "icon fa fa-ban";
			}
		}

		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message
              </div>");
		redirect('guru/file_modul');
	}

	public function deleteData($id)
	{
		$params['id'] = $id;
		$query = $this->m_elearning->deleteData($params,'file_modul');
		if($query){
			$success = "alert alert-warning";
			$message = "Data has been deleted";
			$icon = "icon fa fa-check";
		}else{
			$success = "alert alert-danger";
			$message = "Data failed to deleted";
			$icon = "icon fa fa-ban";
		}
		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
            <h4><i class=\"$icon\"></i> Alert!</h4>
            $message
          </div>");
		redirect('guru/file_modul');

	}
}
