<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        $this->load->model('m_murid');
        $this->load->model('m_guru');
        $this->load->model('m_elearning');
    }

	public function index($id)
	{
		$data = array('content' => 'murid/form_soal','href'=>'Soal',
			'url_home'=>'murid/soal');

		$belajar['id'] = $id;
		$belajar = $this->m_elearning->getData($belajar,'belajar')->row();

		$data['list_modul'] = $this->m_murid->getFileDataGuru($belajar->id_modul)->result();

		$data['data'] = $this->m_murid->getDetailDataGuru($belajar->id_modul)->row();
		$param['id_guru'] = $data['data']->id_guru;

		$params['id_modul'] = $belajar->id_modul;
		$data['soal'] = $this->m_elearning->getData($params,'quiz')->result();

		//notif murid
		$idNotifMurid = $this->session->userdata('data')['id'];
		$getNotifMuridVerf = $this->m_murid->notifMuridVerf($idNotifMurid)->row();
		$data['notif_murid_verf'] = $getNotifMuridVerf->notif_murid_verf;

		$this->load->view('main/home',$data);
	}

	public function done()
	{

		$count = $this->input->post('count');
		$benar = 0;
		for ($i=1; $i <= $count; $i++) {
			$data['id'] = $this->input->post('id'.$i);
			$data['benar'] = $this->input->post('jawaban'.$i);

			$jawaban = $this->m_elearning->getData($data,'quiz')->num_rows();
			if($jawaban > 0){
				$benar++;
			}
		}

		$result = 100 / $count * $benar;
		$params = array(
				'id' => $this->input->post('id_belajar'),
			);
		$guru = $this->m_elearning->getData($params,'belajar')->row();
		$dataNya['nilai'] = $result;
		$query = $this->m_elearning->updateData($params,'belajar',$dataNya);

		$message = "Selamat Anda Kompeten, Silahkan Lanjutkan Penilaian anda terhadap Instruktur";
		$color = "blue";

		$dataTx['tgl_clear'] = date('Y-m-d H:i:s');
		$status = 2;
		if($result <= 75){
			$status = 0;
			unset($dataTx['tgl_clear']);
			$message = "Anda Belum Kompeten, Haraf mengisi ulang soal berikut ini";
			$color = "red";
		}

		$params = array(
			'id_belajar' => $this->input->post('id_belajar'),
		);
		$dataTx['status_clear'] = $status;
		$query = $this->m_elearning->updateData($params,"transaksi",$dataTx);



		$this->result($message,$color,$this->input->post('id_belajar'),$result,$guru->id_guru);


	}

	public function result($msg,$color,$id,$nilai,$guru)
	{
		$data = array('content' => 'murid/view_nilai','href'=>'Soal',
			'url_home'=>'murid/soal/result');
		$data['msg'] = $msg;
		$data['color'] = $color;
		$data['id'] = $id;
		$data['nilai'] = $nilai;
		$data['guru'] = $guru;

		//notif murid
		$idNotifMurid = $this->session->userdata('data')['id'];
		$getNotifMuridVerf = $this->m_murid->notifMuridVerf($idNotifMurid)->row();
		$data['notif_murid_verf'] = $getNotifMuridVerf->notif_murid_verf;

		$this->load->view('main/home',$data);
	}

}
