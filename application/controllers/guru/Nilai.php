<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

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
		$data = array('content' => 'guru/view_nilai','href'=>'Nilai Murid',
			'url_home'=>'guru/nilai');
		$data['data_nilai_pelajaran'] = $this->m_guru->getNilaiMurid($id_guru)->result();
		$this->load->view('main/home',$data);
	}

	public function editData($id)
	{
		$id_guru = $this->session->userdata('data')['id'];
		$data = array(
			'content'=> 'guru/form_nilai',
			'data' => $this->m_guru->getNilaiMurid($id_guru,$id)->result(),
			'href'=>'Ubah Nilai Pelajaran',
			'url_home'=>'guru/Nilai');
		$this->load->view('main/home',$data);
	}

	public function updateData()
	{
		$params['id'] = $this->input->post('id');
		$data['nilai'] = $this->input->post('nilai');

		$query = $this->m_elearning->updateData($params,'belajar',$data);
		
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
        redirect('guru/nilai');	
	}
}
