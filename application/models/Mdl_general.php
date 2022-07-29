<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_general extends CI_Model {
	public function getGrade()
	{
		$response=$this->db->query("select gradeid as id, gradename as grade from grade")->result();
        return json_encode($response,true);
	}
}
