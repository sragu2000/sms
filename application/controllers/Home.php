<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct($config="rest") {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		parent::__construct();
		$this->load->model('Mdl_login');
		if(! $this->Mdl_login->sessionCheck()){
			redirect("login");
		}
	}
	public function index(){
		$this->load->view('vw_header');
		$this->load->view('vw_nav');
		if($_SESSION["approle"]=="student"){
			$this->load->view('vw_student_home');
		}else if($_SESSION["approle"]=="admin"){
			$this->load->view('vw_admin_home');
		}else{
			echo "Invalid User";
		}
		$this->load->view('vw_footer');
	}
}
