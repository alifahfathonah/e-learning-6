<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_elearning');
    }

	public function index()
	{
		$data = array('content' => 'setup/register');
		$this->load->view('setup/index',$data);
	}

	public function saveData()
	{
		$data = array(
			"nama" => $this->input->post('nama'),
			"email" => $this->input->post('email'),
			"telp" => $this->input->post('telp'),
			"password" => $this->input->post('password')
		);
		if($this->input->post('type') == "murid"){
			$table = "murid";
		}else{
			$data['status'] = 0;
			$table = "guru";
		}
		$param['email'] = $this->input->post('email');
		$chek = $this->m_elearning->getData($param,$table);
		if($chek->num_rows() > 0){
			$success = "alert alert-danger";
			$message = "this email has register";
			$icon = "icon fa fa-ban";

			$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message 
              </div>");
			redirect('setup/register');
		}else{

		$query = $this->m_elearning->saveData($table,$data);
		if($query){
			$success = "alert alert-success";
			if($this->input->post('type') == "murid"){
				$message = "Register berhasil, silahkan Login";
			}else{
				$message = "Register berhasil, silahkan login dan lengkapi data profil Anda";
			}
			$icon = "icon fa fa-check";
			
			$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message 
              </div>");

			redirect('setup/login');
		}else{
			$success = "alert alert-danger";
			$message = "Data failed to register";
			$icon = "icon fa fa-ban";

			$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message 
              </div>");
			redirect('setup/register');

		}
		}	
		
	}
}
