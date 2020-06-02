<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public $tanggal = "";

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        date_default_timezone_set('asia/Jakarta');
        $this->load->model('m_elearning');
        $this->load->model('m_administrator');
        $this->tanggal = date('Y-m-d H:i:s');
    }

	public function guru()
	{
		$data = array(
			'content' => 'administrator/data_guru',
			'href'=>'Data guru',
			'url_home'=>'administrator/data/guru'
			);

                $data['user'] = $this->m_administrator->getDataGuru('guru');
		//notif
		$getNotifAdminGuru = $this->m_administrator->notifAdminGuru()->row();
		$data['notif_admin_guru'] = $getNotifAdminGuru->notif_admin_guru;

		$getNotifAdminTxVerf = $this->m_administrator->notifAdminTxVerf()->row();
		$data['notif_admin_tx_verf'] = $getNotifAdminTxVerf->notif_admin_tx_verf;

		$getNotifAdminTxClear = $this->m_administrator->notifAdminTxClear()->row();
		$data['notif_admin_tx_clear'] = $getNotifAdminTxClear->notif_admin_tx_clear;
		$this->load->view('main/home',$data);
	}

	public function profile_guru($id)
	{
		$data = array(
			'content' => 'administrator/view_profile_guru',
			'href'=>'Data guru',
			'url_home'=>'administrator/data/profile_guru'
			);
		$data['data'] = $this->m_elearning->getDataAll('guru',$id);
		//notif
		$getNotifAdminGuru = $this->m_administrator->notifAdminGuru()->row();
		$data['notif_admin_guru'] = $getNotifAdminGuru->notif_admin_guru;

		$getNotifAdminTxVerf = $this->m_administrator->notifAdminTxVerf()->row();
		$data['notif_admin_tx_verf'] = $getNotifAdminTxVerf->notif_admin_tx_verf;

		$getNotifAdminTxClear = $this->m_administrator->notifAdminTxClear()->row();
		$data['notif_admin_tx_clear'] = $getNotifAdminTxClear->notif_admin_tx_clear;
		$this->load->view('main/home',$data);
	}

	public function verifikasi($id)
	{
		$params['id'] = $id;
		$data['status'] = 1;

		$query = $this->m_elearning->updateData($params,'guru',$data);
		if($query){
			$success = "alert alert-success";
			$message = "Data has been verifikasi";
			$icon = "icon fa fa-check";
		}else{
			$success = "alert alert-danger";
			$message = "Data failed to verifikasi";
			$icon = "icon fa fa-ban";
		}	
		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message 
              </div>");	
		redirect('administrator/data/guru');
	}


	public function murid()
	{
		$data = array(
			'content' => 'administrator/data_murid',
			'href'=>'Data murid',
			'url_home'=>'administrator/data/murid'
			);
		$data['user'] = $this->m_elearning->getDataAll('murid');
		//notif
		$getNotifAdminGuru = $this->m_administrator->notifAdminGuru()->row();
		$data['notif_admin_guru'] = $getNotifAdminGuru->notif_admin_guru;

		$getNotifAdminTxVerf = $this->m_administrator->notifAdminTxVerf()->row();
		$data['notif_admin_tx_verf'] = $getNotifAdminTxVerf->notif_admin_tx_verf;

		$getNotifAdminTxClear = $this->m_administrator->notifAdminTxClear()->row();
		$data['notif_admin_tx_clear'] = $getNotifAdminTxClear->notif_admin_tx_clear;
		$this->load->view('main/home',$data);
	}

	public function profile_murid($id)
	{
		$data = array(
			'content' => 'administrator/view_profile_murid',
			'href'=>'Data guru',
			'url_home'=>'administrator/data/profile_murid'
			);
		$data['data'] = $this->m_elearning->getDataAll('murid',$id);
		//notif
		$getNotifAdminGuru = $this->m_administrator->notifAdminGuru()->row();
		$data['notif_admin_guru'] = $getNotifAdminGuru->notif_admin_guru;

		$getNotifAdminTxVerf = $this->m_administrator->notifAdminTxVerf()->row();
		$data['notif_admin_tx_verf'] = $getNotifAdminTxVerf->notif_admin_tx_verf;

		$getNotifAdminTxClear = $this->m_administrator->notifAdminTxClear()->row();
		$data['notif_admin_tx_clear'] = $getNotifAdminTxClear->notif_admin_tx_clear;
		$this->load->view('main/home',$data);
	}

	public function transaction()
	{
		$data = array(
			'content' => 'administrator/data_transaction',
			'href'=>'Data transaction',
			'url_home'=>'administrator/data/transaction'
			);
		$data['data'] = $this->m_administrator->getDataTransaction();
		//notif
		$getNotifAdminGuru = $this->m_administrator->notifAdminGuru()->row();
		$data['notif_admin_guru'] = $getNotifAdminGuru->notif_admin_guru;

		$getNotifAdminTxVerf = $this->m_administrator->notifAdminTxVerf()->row();
		$data['notif_admin_tx_verf'] = $getNotifAdminTxVerf->notif_admin_tx_verf;

		$getNotifAdminTxClear = $this->m_administrator->notifAdminTxClear()->row();
		$data['notif_admin_tx_clear'] = $getNotifAdminTxClear->notif_admin_tx_clear;
		$this->load->view('main/home',$data);
	}

	public function verifikasi_transaction($id)
	{
		$params['id'] = $id;
		$data['status_verf'] = 2;
		$data['updated_at'] = $this->tanggal;


		$query = $this->m_elearning->updateData($params,'transaksi',$data);
		if($query){
			$success = "alert alert-success";
			$message = "Data has been Verification";
			$icon = "icon fa fa-check";
		}else{
			$success = "alert alert-danger";
			$message = "Data failed to Verification";
			$icon = "icon fa fa-ban";
		}	

		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message 
              </div>");
		redirect('administrator/data/transaction');
	}

	public function komfirmasi_transaction($id)
	{
		$params['id'] = $id;
		$data['status_clear'] = 3;
		$data['updated_at'] = $this->tanggal;

		$query = $this->m_elearning->updateData($params,'transaksi',$data);
		if($query){
			redirect('administrator/data/transaction');
		}else{
			echo "gagal";
		}	
	}

public function block($id)
	{
		$params['id'] = $id;
		$data['status'] = 2;
		$query = $this->m_elearning->updateData($params,'guru',$data);
		if($query){
			redirect('administrator/data/guru');
		}else{
			echo "gagal";
		}
	}
	
}
