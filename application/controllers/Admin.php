<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_elearning');
    }

	public function index()
	{
		$data = array('content' => 'setup/login','role' => 'admin');
		$this->load->view('setup/index',$data);
	}

	public function login()
	{
		$data = array('username'=>$this->input->post('email'),'password'=>$this->input->post('password'));

		$query = $this->m_elearning->getData($data,'admin');
		if($query->num_rows() > 0){
			foreach ($query->result() as $value) {
				 $sessionArray['data'] = array('id'=>$value->id,                    
                                        'nama'=>$value->nama,
                                        'email'=>$value->username,
                                        'type'=>'admin',
                                    );
                                    
                    $this->session->set_userdata($sessionArray);
                    redirect('home');
			}
		}else{
				$success = "alert alert-danger";
				$message = "Invalid User";
				$icon = "icon fa fa-ban";

				$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message 
              </div>");
				
			redirect('admin');
		}
	}

	public function log_out()
	{
		$this->session->unset_userdata('data');
		$this->session->sess_destroy();
		redirect('admin','refresh'); 
	}
}
