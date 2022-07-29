<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade extends CI_Controller {
    public function __construct($config="rest") {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		parent::__construct();
		$this->load->model('Mdl_login');
		$this->load->model('Mdl_grade');
		if(! $this->Mdl_login->sessionCheck()){
			redirect("login");
		}
        if($_SESSION["approle"] != "admin"){
            redirect("home");
        }
	}
	public function manageGrade(){
		$this->load->view('vw_header');
		$this->load->view('vw_nav');
		$this->load->view('vw_addGrade');
		$this->load->view('vw_footer');
	}
    public function addgrade(){
        $flag=$this->Mdl_grade->addGrade();
        $this->sendJson(array("message"=>$flag["message"], "result"=>$flag["result"]));
    }

	public function listGradeDetails(){
		echo $this->Mdl_grade->getGradeDetais();
	}
	public function editGrade($id, $grade, $coor, $paym){
		$flag=$this->Mdl_grade->editGrade($id, $grade, $coor, $paym);
		if($flag==true){
			redirect("grade/manageGrade");
		}else{
			echo "<script>alert('Failed to edit');</script>";
			$this->manageGrade();
		}
	}
	public function deleteGrade($id){
		$flag=$this->Mdl_grade->deleteGrade($id);
		if($flag==true){
			redirect("grade/manageGrade");
		}else{
			echo "<script>alert('Failed to delete');</script>";
			$this->manageGrade();
		}
	}



    private function sendJson($data) {
        $this->output->set_header('Content-Type: application/json; charset=utf-8')->set_output(json_encode($data));
    }
}