<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        $this->load->library('upload');
        $this->load->model('m_guru');
        $this->load->model('m_elearning');
    }

	public function data($id_guru)
	{
		$data = array(
			'content' => 'guru/form_profile',
			'href'=>'Profile Guru',
			'url_home'=>'guru/profile'
		);
		$data['data'] = $this->m_guru->getDataProfile($id_guru)->result();
		$param['id_guru'] = $id_guru;
		$data['desc'] = $this->m_guru->getDataRating($param)->result();
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
		if(count($data['desc']) > 0){
			$rating = $this->m_guru->getSum($id_guru)->row();
			$data['rating'] = round($rating->sum_rating / count($data['desc']));
		}else{
			$data['rating'] = 0;
		}
		
		$this->load->view('main/home',$data);
	}

	public function updateData()
	{	
		// codingan ori
		$param['id'] = $this->session->userdata('data')['id'];
		if($_FILES['foto']['name']!="" AND $_FILES['file']['name']!="" AND $_FILES['ttd']['name']!=""){
			// foto
			$configFoto = array(
					'upload_path' => "./assets/file/guru/",
					'allowed_types' => "jpg|png|jpeg",
					'overwrite' => TRUE,
					'max_size' => "114091846000000000"
				);
			$this->upload->initialize($configFoto);
			
			if($uploadFile = $this->upload->do_upload('foto')){
				$data = array('upload_data' => $this->upload->data());
				$fileNameFoto = $data['upload_data']['file_name'];
			}else{
				$success = "alert alert-danger";
				$message = $this->upload->display_errors();
			}

			// file
			$configFile = array(
					'upload_path' => "./assets/file/guru/file",
					'allowed_types' => "zip|rar",
					'overwrite' => TRUE,
					'max_size' => "114091846000000000"
				);
			$this->upload->initialize($configFile);

			if($uploadFile = $this->upload->do_upload('file')){
				$data = array('upload_data' => $this->upload->data());
				$fileNameFile = $data['upload_data']['file_name'];
			}else{
				$success = "alert alert-danger";
				$message = $this->upload->display_errors();
			}

			
			// ttd
			$configTtd = array(
					'upload_path' => "./assets/file/guru/ttd",
					'allowed_types' => "jpg|png|jpeg|pdf|",
					'overwrite' => TRUE,
					'max_size' => "114091846000000000"
				);
			$this->upload->initialize($configTtd);

			if($uploadTtd = $this->upload->do_upload('ttd')){
				$data = array('upload_data' => $this->upload->data());
				$fileNameTtd = $data['upload_data']['file_name'];
			}else{
				$success = "alert alert-danger";
				$message = $this->upload->display_errors();
			}

			$data = array(
				"nama" => $this->input->post('nama'),
				"email" => $this->input->post('email'),
				"telp" => $this->input->post('telp'),
				"skype" => $this->input->post('skype'),
				"password" => $this->input->post('password'),
				"tgl_lahir" => $this->input->post('tgl_lahir'),
				"pengalaman" => $this->input->post('pengalaman'),
				"deskripsi" => $this->input->post('deskripsi'),
				"foto" => $fileNameFoto,
				"file" => $fileNameFile,
				"ttd" => $fileNameTtd,
			);

			$query = $this->m_elearning->updateData($param,'guru',$data);
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
			$icon = "icon fa fa-ban";
			$success = "alert alert-danger";
			$message = "Please complete the data";	
		}
		
		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message 
              </div>");
		redirect('guru/profile/data/'.$param['id']);
	}
}
