<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Catalog extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('catalog_model');
	}

	public function index(){
		$login_user=$this->session->userdata("login_user");
		$uid = $login_user->USER_ID;

		$result1=$this->catalog_model->get_catalog($uid);
		
		$this->load->view('blogCatalogs',array(
		'catalogs'=>$result1));
	}

	public function addBlogCatalog(){
		$name = $this->input->post('name');
		$login_user=$this->session->userdata("login_user");
		$uid = $login_user->USER_ID;
		$result = $this->catalog_model->add_catalog($name,$uid);
		if($result){
			redirect('catalog');
		}
	}
}