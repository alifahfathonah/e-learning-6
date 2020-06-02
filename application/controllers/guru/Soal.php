<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        $this->load->model('m_elearning');
        $this->load->model('m_guru');
    }

    function index()
    {
    	$data = array('content' => 'guru/view_soal','href'=>'List Soal',
			'url_home'=>'guru/soal');

		$get_data_soal = $this->m_guru->getSoal()->result();

		$data_quiz = [];
		$i = 0;
		foreach ($get_data_soal as $value) {
			$count_quiz = $this->m_guru->get_count_quiz($value->id_modul)->num_rows();
			$data_quiz[$i]= array(
				'id_modul' => $value->id_modul,
				'mata_pelajaran' => $value->mata_pelajaran,
				'modul' => $value->modul,
				'count_quiz' => $count_quiz
			);
			$i++;
		}
		$data['data_soal'] = $data_quiz;



		//notif guru
		$idUser = $this->session->userdata('data')['id'];
		$getNotifGuruMuridBaru = $this->m_guru->notifGuruMuridBaru($idUser)->row();
		$data['notif_guru_murid_baru'] = $getNotifGuruMuridBaru->notif_guru_murid_baru;

		$getNotifGuruMuridBelajar = $this->m_guru->notifGuruMuridBelajar($idUser)->row();
		$data['notif_guru_murid_belajar'] = $getNotifGuruMuridBelajar->notif_guru_murid_belajar;

		$getNotifGuruMuridNilai = $this->m_guru->notifGuruMuridNilai($idUser)->row();
		$data['notif_guru_murid_nilai'] = $getNotifGuruMuridNilai->notif_guru_murid_nilai;

		$getNotifGuruTx = $this->m_guru->notifGuruTx($idUser)->row();
		$data['notif_guru_tx'] = $getNotifGuruTx->notif_guru_tx;
		$this->load->view('main/home',$data);
    }

	public function formSoal()
	{
		$id_guru = $this->session->userdata('data')['id'];
		$data = array(
			'content' => 'guru/form_soal',
			'href'=>'Soal',
			'url_home'=>'guru/soal'
		);
		// $data['data_modul'] = $this->m_guru->getFileModul()->result();
		$param['id_guru'] = $this->session->userdata('data')['id'];
		$data['data_modul'] = $this->m_elearning->getData($param,'modul')->result();

		//notif guru
		$idUser = $this->session->userdata('data')['id'];
		$getNotifGuruMuridBaru = $this->m_guru->notifGuruMuridBaru($idUser)->row();
		$data['notif_guru_murid_baru'] = $getNotifGuruMuridBaru->notif_guru_murid_baru;

		$getNotifGuruMuridBelajar = $this->m_guru->notifGuruMuridBelajar($idUser)->row();
		$data['notif_guru_murid_belajar'] = $getNotifGuruMuridBelajar->notif_guru_murid_belajar;

		$getNotifGuruMuridNilai = $this->m_guru->notifGuruMuridNilai($idUser)->row();
		$data['notif_guru_murid_nilai'] = $getNotifGuruMuridNilai->notif_guru_murid_nilai;

		$getNotifGuruTx = $this->m_guru->notifGuruTx($idUser)->row();
		$data['notif_guru_tx'] = $getNotifGuruTx->notif_guru_tx;
		$this->load->view('main/home',$data);

	}

	public function input_soal()
	{

		$input = array();
		for ($i=1; $i <= $this->input->post('jumlah'); $i++) {
			$data = array(
				"id_modul" => $this->input->post('id_modul'),
				"soal" => $this->input->post('soal'.$i),
				"a" => $this->input->post('a'.$i),
				"b" => $this->input->post('b'.$i),
				"c" => $this->input->post('c'.$i),
				"d" => $this->input->post('d'.$i),
				"e" => $this->input->post('e'.$i),
				"benar" => $this->input->post('benar'.$i),
			);
			array_push($input, $data);

		}
			$query = $this->db->insert_batch('quiz',$input);

			if($query){
				$success = "alert alert-success";
				$message = "Data has been add";
				$icon = "icon fa fa-check";
			}else{
				$success = "alert alert-danger";
				$message = "Data failed to add";
				$icon = "icon fa fa-ban";
			}

			$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message
              </div>");
		redirect('guru/soal/');
	}

	public function deleteData($id)
	{
		$params['id_modul'] = $id;
		$query = $this->m_elearning->deleteData($params,'quiz');
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
		redirect('guru/soal');

	}
}
