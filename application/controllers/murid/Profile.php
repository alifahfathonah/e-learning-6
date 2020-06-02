<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        $this->load->model('m_murid');
        $this->load->model('m_elearning');
    }

	public function data($id_murid)
	{
		$data = array(
			'content' => 'murid/form_profile',
			'href'=>'Profile Murid',
			'url_home'=>'murid/profile'
		);
		$data['data'] = $this->m_murid->getDataProfile($id_murid)->result();

		//notif murid
		$idNotifMurid = $this->session->userdata('data')['id'];
		$getNotifMuridVerf = $this->m_murid->notifMuridVerf($idNotifMurid)->row();
		$data['notif_murid_verf'] = $getNotifMuridVerf->notif_murid_verf;
		
		$this->load->view('main/home',$data);
	}

	public function updateData()
	{	
		$param['id'] = $this->session->userdata('data')['id'];
		if($_FILES['foto']['name']!=""){
			$config = array(
				'upload_path' => "./assets/file/murid/",
				'allowed_types' => "jpg|png|jpeg|",
				'overwrite' => TRUE,
				'max_size' => "114091846000000000"
			);
			$this->upload->initialize($config);
			if($this->upload->do_upload('foto')){
				$data = array('upload_data' => $this->upload->data());
				$fileName = $data['upload_data']['file_name'];
				$data = array(
					"nama" => $this->input->post('nama'),
					"email" => $this->input->post('email'),
					"telp" => $this->input->post('telp'),
					"password" => $this->input->post('password'),
					"foto" => $fileName,
				);

				$query = $this->m_elearning->updateData($param,'murid',$data);
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
				"nama" => $this->input->post('nama'),
				"email" => $this->input->post('email'),
				"telp" => $this->input->post('telp'),
				"password" => $this->input->post('password'),
			);

			$query = $this->m_elearning->updateData($param,'murid',$data);
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
		redirect('murid/profile/data/'.$param['id']);
	}
}
