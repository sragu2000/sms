<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
    public function __construct($config="rest") {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		parent::__construct();
		$this->load->model('Mdl_login');
		$this->load->model('Mdl_grade');
		$this->load->model('Mdl_payment');
		if(! $this->Mdl_login->sessionCheck()){
			redirect("login");
		}
        if($_SESSION["approle"] != "admin"){
            redirect("home");
        }
	}
	public function getGradeValue($indexnum){
		echo $this->Mdl_payment->getgrades($indexnum);
	}
	public function index(){
		$this->load->view('vw_header');
		$this->load->view('vw_nav');
		$this->load->view('vw_payment');
		$this->load->view('vw_footer');
	}
    
    public function payCash(){
        $flag=$this->Mdl_payment->payCash();
        $this->sendJson(array("message"=>$flag["message"], "result"=>$flag["result"]));
    }

    private function sendJson($data) {
        $this->output->set_header('Content-Type: application/json; charset=utf-8')->set_output(json_encode($data));
    }

	
}
