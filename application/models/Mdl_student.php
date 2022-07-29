<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_student extends CI_Model {
	public function getPreviousPayments()
	{
        $indexnum=$_SESSION["stuindex"];
		$sql=$this->db->query("select paymentid as id, month, receiveddate from payment where indexnumber='$indexnum' order by receiveddate desc")->result();
        return json_encode($sql,true);
	}
    public function getStudentDetails(){
        $indexnum=$_SESSION["stuindex"];
        $sql=$this->db->query("select indexnumber as indnum,firstname as fname,lastname as lname,gradename as grade,phonenum as phone,address,email as mail,dob from studentdetails, grade where indexnumber='$indexnum' and grade.gradeid=studentdetails.gradeid")->result();
        return json_encode($sql,true);
    }
}
