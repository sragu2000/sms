<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct($config="rest") {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		parent::__construct();
		$this->load->model('Mdl_login');
		if($this->Mdl_login->sessionCheck()){
			redirect("home");
		}
	}
	public function index()
	{
		$this->load->view('vw_header');
		$this->load->view('vw_login');
		$this->load->view('vw_footer');
	}
	public function loginuser(){
		$flag=$this->Mdl_login->checkuser();
		if($flag["result"]==true){
			$this->session->set_userdata("studentindnum",$this->input->post('indnum'));
		}
		$this->sendJson(array("message"=>$flag["message"], "result"=>$flag["result"]));
	}
	private function sendJson($data) {
        $this->output->set_header('Content-Type: application/json; charset=utf-8')->set_output(json_encode($data));
    }
}
