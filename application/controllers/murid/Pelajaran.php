<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelajaran extends CI_Controller {

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

	public function index()
	{
		$data = array('content' => 'murid/form_pelajaran','href'=>'Mata Pelajaran',
			'url_home'=>'murid/pelajaran');
		$dataGuru = $this->m_murid->getDataGuru('')->result();
		$data_guru = array();
		foreach ($dataGuru as $value) {
			$param['id_guru'] = $value->id_guru;
			$desc = $this->m_guru->getDataRating($param)->result();
			if(count($desc) > 0){
				$rating = $this->m_guru->getSum($value->id_guru)->row();
				$dataRating = $rating->sum_rating / count($desc);
			}else{
				$dataRating = 0;
			}
			$dataNya = array(
					'foto' => $value->foto,
					'id' => $value->id,
					'nama' => $value->nama,
					'deskripsi' => $value->deskripsi,
					'mapel' => $value->mata_pelajaran,
					'modul' => $value->modul,
					'harga' => $value->harga,
					'rating' => $dataRating
				);
			array_push($data_guru, $dataNya);
		}
		$data['data'] = $data_guru;

		//notif murid
		$idNotifMurid = $this->session->userdata('data')['id'];
		$getNotifMuridVerf = $this->m_murid->notifMuridVerf($idNotifMurid)->row();
		$data['notif_murid_verf'] = $getNotifMuridVerf->notif_murid_verf;
		
		$this->load->view('main/home',$data);
	}

	public function getDataGuru()
	{
		$query = $this->m_murid->getDataGuru($this->input->post('id'))->result();
			if(count($query) > 0){
				foreach ($query as $value) {
					$param['id_guru'] = $value->id_guru;
					$desc = $this->m_guru->getDataRating($param)->result();
					if(count($desc) > 0){
						$rating = $this->m_guru->getSum($value->id_guru)->row();
						$dataRating = $rating->sum_rating / count($desc);
					}else{
						$dataRating = 0;
					}
					$foto = "file/guru/$value->foto";
					if($value->foto == "" || $foto == null){
						$foto= "image/default.png";
					}
					$star = "";
					for ($i=0; $i < $dataRating; $i++) { 
                      $star .= "<i class=\"fa fa-star text-yellow\"></i>";
                    } 
                    $sisa = 5 - $dataRating;
                    for ($i=0; $i < $sisa; $i++) { 
                    	$star .= "<i class=\"fa fa-star text-white\"></i>";
                	}

					echo "<div class=\"col-lg-3\">
		                        <label class=\"text-center radio-thumbnail\">
		                          <input type=\"radio\" onclick=\"detail(this)\" name=\"guru\" value=\"$value->id\">
		                          <span class=\"thumbnail\">
		                            <img src=\"../assets/$foto\" width=\"500px;\" class=\"img-responsive\"/>
		                            <span><h3>$value->nama</h3></span>".
		                              $star
		                              ."<span><h5>$value->mata_pelajaran</h5></span><span><h5>$value->modul</h5></span>
		                              <span><h4>Rp $value->harga</h4></span>
		                          </span>
		                        </label>
		                      </div>";
				}
			}else{
				echo "<div class=\"col-lg-3\"><h2>Data Tidak Ada</h2></div>";
			}
		
	}

	public function saveData()
	{
		$data = array("id" => $this->input->post('id_modul'));
		$query = $this->m_elearning->getData($data,"modul")->row();
		$data = array(
			"id_murid" => $this->session->userdata('data')['id'],
			"id_guru" => $this->input->post('id_guru'),
			"id_modul" => $this->input->post('id_modul'),
			"harga" => $query->harga
		);

		$query = $this->m_elearning->saveDataGetId('belajar',$data);

		$data = array(
			"id_belajar" => $query,
			"status_verf" => 0,
			"status_clear" => 0
		);

		$query2 = $this->m_elearning->saveDataGetId('transaksi',$data);

		if($query2){
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
		redirect('murid/verifikasi/verifikasi_belajar/'.$query);
	}

	public function detailGuru($id)
	{
		$data = array('content' => 'murid/form_detail_pelajaran','href'=>'Mata Pelajaran',
			'url_home'=>'murid/pelajaran');
		$data['list_modul'] = $this->m_murid->getFileDataGuru($id)->result();
		
		$data['data'] = $this->m_murid->getDetailDataGuru($id)->row();
		$param['id_guru'] = $data['data']->id_guru;
		$data['desc'] = $this->m_guru->getDataRating($param)->result();
		if(count($data['desc']) > 0){
			$rating = $this->m_guru->getSum($data['data']->id_guru)->row();
			$data['Rating'] = $rating->sum_rating / count($data['desc']);
		}else{
			$data['Rating'] = 0;
		}

		//notif murid
		$idNotifMurid = $this->session->userdata('data')['id'];
		$getNotifMuridVerf = $this->m_murid->notifMuridVerf($idNotifMurid)->row();
		$data['notif_murid_verf'] = $getNotifMuridVerf->notif_murid_verf;
		
		$this->load->view('main/home',$data);
	}

}
