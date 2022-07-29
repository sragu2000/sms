<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_grade extends CI_Model{
	public function addGrade(){
        $arr["gradename"]=$this->input->post("gradeName");
        $gradename=$this->input->post("gradeName");
        $arr["payment"]=$this->input->post("payment");
        $arr["coordinator"]=$this->input->post("coordinator");
        if($this->db->query("select * from grade where gradename='$gradename'")->num_rows()>=1){
            return array("message"=>"Grade Already Exists", "result"=>false);
        }else{
            if($this->db->insert('grade',$arr)){
                return array("message"=>"Grade added successfully", "result"=>true);
            }else{
                return array("message"=>"Failed to add grade", "result"=>false);
            }
        }
	}
}
