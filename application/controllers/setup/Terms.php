<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data = array('content' => 'setup/terms');
		$this->load->view('main/home2',$data);
	}
}
