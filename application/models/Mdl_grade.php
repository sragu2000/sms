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
    public function getGradeDetais()
	{
		$response=$this->db->query("select gradeid as id, gradename as grade, payment, coordinator from grade")->result();
        return json_encode($response,true);
	}

    public function editGrade($id, $grade, $coor, $paym){
        if($this->db->query("update grade set gradename='$grade', payment='$paym', coordinator='$coor' where gradeid='$id'")){
            return true;
        }else{
            return false; 
        }
    }
    public function deleteGrade($id){
        if($this->db->query("delete from grade where gradeid='$id'")){
            return true;
        }else{
            return false; 
        }
    }
}
