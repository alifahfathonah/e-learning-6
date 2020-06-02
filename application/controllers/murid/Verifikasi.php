<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        $this->load->model('m_murid');
        $this->load->model('m_elearning');
        $this->load->library('upload');
    }

	public function index()
	{	
		$param['belajar.id_murid'] = $this->session->userdata('data')['id'];
		$data = array('content' => 'murid/view_verifikasi','href'=>'Verifikasi Belajar',
			'url_home'=>'murid/verifikasi');
		$data['data_belajar'] = $this->m_murid->getDataVerifikasi($param)->result();

		//notif murid
		$idNotifMurid = $this->session->userdata('data')['id'];
		$getNotifMuridVerf = $this->m_murid->notifMuridVerf($idNotifMurid)->row();
		$data['notif_murid_verf'] = $getNotifMuridVerf->notif_murid_verf;
		
		$this->load->view('main/home',$data);


	}

	public function verifikasi_belajar($id)
	{
		$param['belajar.id'] = $id;
		$data = array('content' => 'murid/form_verifikasi','href'=>'Verifikasi Belajar',
			'url_home'=>'murid/verifikasi');
		$data['data_belajar'] = $this->m_murid->getDataVerifikasi($param)->row();

		//notif murid
		$idNotifMurid = $this->session->userdata('data')['id'];
		$getNotifMuridVerf = $this->m_murid->notifMuridVerf($idNotifMurid)->row();
		$data['notif_murid_verf'] = $getNotifMuridVerf->notif_murid_verf;
		
		$this->load->view('main/home',$data);
	}

	public function saveData()
	{
		date_default_timezone_set('asia/Jakarta');
		$config = array(
			'upload_path' => "./assets/file/verifikasi/",
			'allowed_types' => "jpg|png|jpeg|pdf|mkv|mp4|mp3|avi",
			'overwrite' => TRUE,
			'max_size' => "114091846000000000"
		);

		$this->upload->initialize($config);
		if($this->upload->do_upload('file')){
			$data = array('upload_data' => $this->upload->data());
			$fileName = $data['upload_data']['file_name'];
			
			$param['id_belajar'] = $this->input->post('id');
			$data = array(
				"status_verf" => 1,
				"file" => $fileName,
				'tgl_verified' => date('Y-m-d H:i:s') 
			);

			$query = $this->m_elearning->updateData($param,"transaksi",$data);
			if($query){
				$success = "alert alert-success";
				$message = "Data has been Verification";
				$icon = "icon fa fa-check";
			}else{
				$success = "alert alert-danger";
				$message = "Data failed to Verification";
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
		redirect('murid/verifikasi');
	}

}
