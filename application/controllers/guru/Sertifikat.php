<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller {

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
		$data = array('content' => 'guru/view_sertifikat','href'=>'Sertifikat',
			'url_home'=>'guru/modul');
		$data['data_sertifikat'] = $this->m_guru->getModul()->result();
		$this->load->view('main/home',$data);
	}

	public function inputData()
	{
		$data = array('content' => 'guru/form_modul','href'=>'Modul Pelajaran',
			'url_home'=>'guru/modul');
		$data['data_mata_pelajaran'] = $this->m_guru->getMasterMataPelajaran()->result();
		$this->load->view('main/home',$data);
	}

	public function saveData()
	{
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
				"id_mata_pelajaran" => $this->input->post('id_mata_pelajaran'),
				"file" => $fileName,
			);

			$query = $this->m_elearning->saveData('pelajaran',$data);
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
		redirect('guru/modul');
	}

	public function editData($id)
	{
		$data = array('content'=> 'guru/form_modul','data' => $this->m_guru->getModul($id)->result(),'href'=>'Modul Pelajaran',
			'url_home'=>'guru/modul');
		$data['data_mata_pelajaran'] = $this->m_guru->getMasterMataPelajaran()->result();


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
					"id_mata_pelajaran" => $this->input->post('id_mata_pelajaran'),
					"file" => $fileName,
				);

				$query = $this->m_elearning->updateData($param,'pelajaran',$data);
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
				"id_mata_pelajaran" => $this->input->post('id_mata_pelajaran')
			);

			$query = $this->m_elearning->updateData($param,'pelajaran',$data);
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
		redirect('guru/modul');
	}

	public function deleteData($id)
	{
		$params['id'] = $id;
		$query = $this->m_elearning->deleteData($params,'pelajaran');
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
		redirect('guru/modul');

	}
}
