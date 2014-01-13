<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function index()
	{
		
	}
	public function lists(){
		$rs = $this->db->get("mail")->result_array();
		$data = array("result"=>$rs);
		echo json_encode($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */