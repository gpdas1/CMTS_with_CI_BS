<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct(){
	parent::__construct();
//	if(!$this->ion_auth->logged_in()) redirect ('auth/login');
	}

	public function index()
	{
		$this->load->view('layouts/layoutheader.php');
		$this->load->view('homepage');
		$this->load->view('layouts/layoutfooter.php');
	}
}
