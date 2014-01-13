<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	private $mongo;
	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->load->library("Mongo_db");
		/*
		$this->mongo_db
			->where(["name"=>"Pongsatorn"])
			->set([
				"age"=>10
			])
			->update("users");
		*/
		
		$this->mongo_db
			->insert("article",[
				"ISBN"=>"00002",
				"title"=>"Codeigniter Book 2",
				"detail"=>"Book of God 2",
				"price"=>400,
				"address"=>array(
					array(
						"address"=>"111",
						"moo"=>"4"
					),
					array(
						"address"=>"222",
						"moo"=>"14"
					)
				)
			]);
			
		$data['user'] = $this->mongo_db->get("article");
		
		
		$this->load->view('welcome_message',$data);
	}
	public function test(){
		$data['q'] = "sssss";
		$data['s']="FFFFFF";
		$this->load->view("test/index",$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */