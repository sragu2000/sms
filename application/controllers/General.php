<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {
	public function getGrades(){
		$this->load->model("Mdl_general");
		echo $this->Mdl_general->getGrade();
	}
}
