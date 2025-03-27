<?php 
defined("BASEPATH") OR exit("No direct script access allowed");

class Dashboard extends CI_Controller {	

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['title'] = '';
		$this->load->view('Css');
		$this->load->view('Navtop', $data);
		$this->load->view('LeftMenu');
		$this->load->view('dashboard/index');
		$this->load->view('footer');
		$this->load->view('js');
	}
}
