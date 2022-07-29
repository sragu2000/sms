<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_payment extends CI_Model {
    public function getgrades($index){
        $sql=$this->db->query("select gradeid from studentdetails where indexnumber='$index'");
        if($sql->num_rows()>0){
            $gradeOfStudent=$sql->first_row()->gradeid;
            $sql=$this->db->query("select * from grade where gradeid='$gradeOfStudent'");
            $cash=$sql->first_row()->payment;
            $grade=$sql->first_row()->gradename;
            $retData=array("cash"=>$cash, "grade"=>$grade);
            return json_encode($retData,true);
        }else{
            $retData=array("cash"=>"null", "grade"=>"");
            return json_encode($retData,true);
        }
        
    }
	public function payCash(){
        //fetch data
		$arr["indexnumber"]=$this->input->post("indexnumber");
        $ind=$this->input->post("indexnumber");

		$arr["month"]=$this->input->post("month");
		$month=$this->input->post("month");

        date_default_timezone_set("Asia/Colombo");
        $date=date("Y-m-d");
        $arr["receiveddate"]=$date;

		$arr["receivedBy"]=$_SESSION["studentmail"];

        $sql=$this->db->query("select gradeid from studentdetails where indexnumber='$ind'");
        if($sql->num_rows()>0){
            $arr["gradeid"]=$sql->first_row()->gradeid;
            $gradeid=$sql->first_row()->gradeid;
        }else{
            return array("message"=>"Index Number Not Found","result"=>false);
        }

        //database insert
        if($this->db->query("select * from payment where indexnumber='$ind' and month='$month' and gradeid='$gradeid'")->num_rows()>0){
            return array("message"=>"Already Paid","result"=>false);
        }else{
            $sql=$this->db->insert('payment',$arr);
            if($sql){
                return array("message"=>"Payment Successful","result"=>true);
            }else{
                return array("message"=>"Payment Failed","result"=>false);
            }
        }
	}
}
