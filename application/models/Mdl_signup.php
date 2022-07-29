<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_signup extends CI_Model{
	public function addUser(){
        $arr["firstname"]=$this->input->post('fname');
		$arr["lastname"]=$this->input->post('lname');
		$arr["address"]=$this->input->post('address');
		$arr["phonenum"]=$this->input->post('tpno');
		$arr["email"]=$this->input->post('email');
		$arr["grade"]=$this->input->post('grade');
		$arr["dob"]=$this->input->post('dob');
		$arr["password"]=password_hash($this->input->post('password'),PASSWORD_DEFAULT);
        $arr["role"]="student";
        date_default_timezone_set("Asia/Colombo");
        $date=date("Y-m-d");
        $arr["regDate"]=$date;
        $arr["status"]="active";
        $email=$this->input->post('email');

        if($this->db->query("SELECT * FROM studentdetails WHERE email='$email'")->num_rows()>0){
            return array("message"=>"Email or Index Number Already Exists","result"=>false);
        }else{
            if($this->db->insert('studentdetails',$arr)){
                return array("message"=>"SignUp Success","result"=>true);
            }else{
                return array("message"=>"SignUp Failed","result"=>false);
            }
        }
    }
}
