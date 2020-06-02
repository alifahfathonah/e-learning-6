<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_mata_pelajaran extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        $this->load->model('m_elearning');
        $this->load->model('m_administrator');
    }

	public function index()
	{
		$data = array(
			'content' => 'administrator/view_master_mata_pelajaran',
			'href'=>'Data mata pelajaran',
			'url_home'=>'administrator/master_mata_pelajaran'
			);
		$data['user'] = $this->m_elearning->getDataAll('master_mata_pelajaran');
		//notif
		$getNotifAdminGuru = $this->m_administrator->notifAdminGuru()->row();
		$data['notif_admin_guru'] = $getNotifAdminGuru->notif_admin_guru;

		$getNotifAdminTxVerf = $this->m_administrator->notifAdminTxVerf()->row();
		$data['notif_admin_tx_verf'] = $getNotifAdminTxVerf->notif_admin_tx_verf;

		$getNotifAdminTxClear = $this->m_administrator->notifAdminTxClear()->row();
		$data['notif_admin_tx_clear'] = $getNotifAdminTxClear->notif_admin_tx_clear;
		$this->load->view('main/home',$data);
	}

	public function inputData()
	{
		$data = array(
			'content' => 'administrator/form_master_mata_pelajaran',
			'href'=>'Tambah mata pelajaran',
			'url_home'=>'administrator/master_mata_pelajaran'
			);
		//notif
		$getNotifAdminGuru = $this->m_administrator->notifAdminGuru()->row();
		$data['notif_admin_guru'] = $getNotifAdminGuru->notif_admin_guru;

		$getNotifAdminTxVerf = $this->m_administrator->notifAdminTxVerf()->row();
		$data['notif_admin_tx_verf'] = $getNotifAdminTxVerf->notif_admin_tx_verf;

		$getNotifAdminTxClear = $this->m_administrator->notifAdminTxClear()->row();
		$data['notif_admin_tx_clear'] = $getNotifAdminTxClear->notif_admin_tx_clear;
		$this->load->view('main/home',$data);
	}

	public function saveData()
	{
		$data = array(
			"mata_pelajaran" => $this->input->post('mata_pelajaran')
		);

		$query = $this->m_elearning->saveData('master_mata_pelajaran',$data);
		if($query){
			$success = "alert alert-success";
			$message = "Data has been add";
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
        redirect('administrator/master_mata_pelajaran');	
	}

	public function editData($id)
	{
		$params = array('id'=> $id);
		$data = array(
			'content'=> 'administrator/form_master_mata_pelajaran',
			'data' => $this->m_elearning->getData($params,'master_mata_pelajaran')->result(),
			'href'=>'Ubah mata pelajaran',
			'url_home'=>'administrator/master_mata_pelajaran');
		//notif
		$getNotifAdminGuru = $this->m_administrator->notifAdminGuru()->row();
		$data['notif_admin_guru'] = $getNotifAdminGuru->notif_admin_guru;

		$getNotifAdminTxVerf = $this->m_administrator->notifAdminTxVerf()->row();
		$data['notif_admin_tx_verf'] = $getNotifAdminTxVerf->notif_admin_tx_verf;

		$getNotifAdminTxClear = $this->m_administrator->notifAdminTxClear()->row();
		$data['notif_admin_tx_clear'] = $getNotifAdminTxClear->notif_admin_tx_clear;

		$this->load->view('main/home',$data);
	}

	public function updateData()
	{
		$params['id'] = $this->input->post('id');
		$data['mata_pelajaran'] = $this->input->post('mata_pelajaran');

		$query = $this->m_elearning->updateData($params,'master_mata_pelajaran',$data);
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
        redirect('administrator/master_mata_pelajaran');		
	}

	public function deleteData($id)
	{
		$params['id'] = $id;
		$query = $this->m_elearning->deleteData($params,'master_mata_pelajaran');
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
        redirect('administrator/master_mata_pelajaran');

	}
}
