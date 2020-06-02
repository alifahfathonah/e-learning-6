<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_murid extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        $this->load->model('m_guru');
    }

	public function index()
	{
		$id_guru = $this->session->userdata('data')['id'];
		$data = array(
			'content' => 'guru/view_data_murid',
			'href'=>'Data Murid',
			'url_home'=>'guru/data_murid'
		);
		$data['data_guru'] = $this->m_guru->getDaftarDataMurid($id_guru)->result();
		$this->load->view('main/home',$data);
	}
}
