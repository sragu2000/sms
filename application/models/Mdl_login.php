<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_login extends CI_Model {
    public function checkuser(){
        $mail=$this->input->post('mail');
		    $password=$this->input->post('password');
        $sql=$this->db->query("SELECT * FROM studentdetails WHERE email='$mail'");
        if($sql->num_rows()==1){
            $hpassw=$sql->first_row()->password;
            if(password_verify($password,$hpassw)){
                $userRole=$sql->first_row()->role;
                return array("message"=>"Login Success","result"=>true,"role"=>$userRole);
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
        else if (empty($session_data['studentmail'])) {
          return false;
        }
        else if ($session_data['studentmail']=="") {
          return false;
        }
        else{
          $ses=$session_data['studentmail'];
          return true;
        }
    }
}
