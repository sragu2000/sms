<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_login extends CI_Model {
    public function checkuser(){
        $indNum=$this->input->post('indnum');
		$password=$this->input->post('password');
        if($this->db->query("SELECT * FROM studentdetails WHERE indexnumber='$indNum'")->num_rows()==1){
            $hpassw=$this->db->query("Select password from studentdetails where indexnumber='$indNum'")->first_row()->password;
            if(password_verify($password,$hpassw)){
                return array("message"=>"Login Success","result"=>true);
            }else{
                return array("message"=>"Login Failed","result"=>false);
            }
        }else{
            return array("message"=>"User not found","result"=>false);
        }
    }
    public function sessionCheck(){
        $session_data = $this->session->get_userdata();
        if (is_null($session_data)) {
          return false;
        }
        else if (empty($session_data['studentindnum'])) {
          return false;
        }
        else if ($session_data['studentindnum']=="") {
          return false;
        }
        else{
          $ses=$session_data['studentindnum'];
          return true;
        }
    }
}
