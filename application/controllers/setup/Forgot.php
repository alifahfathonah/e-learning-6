<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_elearning');
    	$this->load->library(array('email')); 

    }

	public function index()
	{
		$data = array('content' => 'setup/forgot','role' => 'user');
		$this->load->view('setup/index',$data);
	}

	function randomPassword($length)
	{
		 $karakter = '';
		 $karakter .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; // karakter alfabet
		 $karakter .= '1234567890'; // karakter numerik
		 
		 $string = '';
		 for ($i=0; $i < $length; $i++) { 
		  $pos = rand(0, strlen($karakter)-1);
		  $string .= $karakter{$pos};
		 }
		 return $string;

	}

	public function forgot()
	{
		$to_email = $this->input->post('email');
		$newsPass = $this->randomPassword(8);
		if($this->input->post('type') == "murid"){
			$table = 'murid';
			$user  = "Member";
		}else{
			$user = "Instruktur";
			$table = 'guru';
		}

		$data = array('email'=>$this->input->post('email'));
		$query = $this->m_elearning->getData($data,$table);
		$emails = "";
		if($query->num_rows() > 0){
			foreach($query->result() as $value){
				$emails = $value->email;
			}
		}

		if($to_email == $emails){
			$params =array('email' => $this->input->post('email'));
	    	$data['password'] = $newsPass;
			$query = $this->m_elearning->updateData($params,$table,$data);

			if($query){
				$sent = $this->send_email($to_email,$user,$newsPass);
				if($sent){
					$success = "alert alert-success";
					$message = "New Password have been sent your email";
					$icon = "icon fa fa-check";

					$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
	                <h4><i class=\"$icon\"></i> Alert!</h4>
	                $message 
	              	</div>");
	        	redirect('setup/login'); 
				}else{
	    			show_error($this->email->print_debugger());   
				}
			}
			
		}else{
			$success = "alert alert-danger";
			$message = "Invalid email";
			$icon = "icon fa fa-ban";

			$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
	                <h4><i class=\"$icon\"></i> Alert!</h4>
	                $message 
	              	</div>");
	        redirect('setup/forgot');
		}	
	}

	public function send_email($to_email,$user,$newsPass)
	{
		 // configure the email setting
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = 'limapilarmanajemen@gmail.com';
        $config['smtp_pass'] = 'wfqiocjlssigzfuj'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);

        $this->email->from('limapilarmanajemen@gmail.com', 'New Password');
	    $this->email->to($to_email); 
	    $this->email->subject('New Password Account Rumah Pengembangan');
	    $message_email = "<html>
		    				<head></head>
		    				<body><p>Hi, ".$user."</p>
		    				<p>Ini Password Baru Anda.</p>
		    				<p> Password : ".$newsPass."</p>
		    				<p>Silahkan login kembali menggunakan password ini ".$newsPass."</p>
		    				</body>
		    			</html>";
	    $this->email->message($message_email);
	    return $this->email->send();
	    // $this->email->send();
	}
}