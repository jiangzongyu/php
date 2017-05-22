<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends CI_Controller {



	public function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
	}

	public function index(){

		$cid = $this->input->get('cid');
	
		
		$result1=$this->blog_model->get_catalog('0');
		if($cid > 0){
			$result = $this->blog_model->get_by_cid($cid);
			
		}else{
			$result=$this->blog_model->get_blog();
		}
		$this->load->view('index',array(
			'blogs' => $result,
			'catalogs'=> $result1
			));

	}
	
	public function logined(){
		$login_user=$this->session->userdata("login_user");
		if($login_user){
			$uid = $login_user->USER_ID;
			//$result = $this->blog_model->get_by_uid($uid);
			$result = $this->blog_model->get_blog();
			$result1 = $this->blog_model->get_catalog('0');

			$this->load->view('index_logined',array(
			'myblogs' => $result,
			'catalogs'=>$result1
			
			));
		}
	}
	public function newBlog(){
		$login_user=$this->session->userdata("login_user");
		$uid = $login_user->USER_ID;
		$result1=$this->blog_model->get_catalog($uid);
		$this->load->view('newBlog',array(
			'catalogs'=> $result1
			));
	}
	public function save_blog(){
		$login_user=$this->session->userdata("login_user");
		if($login_user){
			$uid = $login_user->USER_ID;
			$title = $this->input->post('title');
			$catalog = $this->input->post('catalog');
			$content = $this->input->post('content');
			$data = date('Y-m-d h:i:s');
			$arr = array(
				'WRITER' => $uid,
				'TITLE' => $title,
				'CATALOGNAME' => $catalog,
				'CONTENT' => $content,
				'ADD_TIME'=> $data
				);
			$result = $this->blog_model->save_blogs($arr);
			if($result){
				redirect('blog/logined');
			}
		}
	}


	public function do_blog(){
		$login_user=$this->session->userdata("login_user");
		if($login_user){
			$uid = $login_user->USER_ID;
			$result = $this->blog_model->get_by_uid($uid);
		}
		$this->load->view('blogs',array(
			'blogs'=>$result
			));
	}
	/*public function choose(){
		$cid = $this->load->get('cid');
		$result = $this->blog_model->get_by_cid($cid);
		$this->load->view('index',array(
			'choose' => $result
			));
	}*/

	/*public function new(){
		$this->load->view('comment');
	}*/

}