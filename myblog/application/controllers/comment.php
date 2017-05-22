<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Comment extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('comment_model');
	}


	public function index(){
		
		$wid = $this->input->get('wid');
		$result2 = $this->comment_model->get_blog_title();
		/*var_dump($result2);
		die();*/
		$result1 = $this->comment_model->get_by_id($wid);
		//var_dump($result1);
		$result = $this->comment_model->get_comment_by_id($wid);
		//if($result){
			$this->load->view('viewPost_comment',array(
				'comments'=>$result,
				'blogs'=>$result1,
				'titles'=>$result2
				));
		/*}else{
			$this->load->view('viewPost_comment',array(
				'comments'=>$result,
				'blogs'=>$result1,
				'titles'=>$result2
				));
		}*/
			
	}



	public function add_comment(){
		$login_user=$this->session->userdata("login_user");
		if($login_user){
			$uid = $login_user->USER_ID;
			$comment = $this->input->post('content');
		    $data = date('Y-m-d h:i:s');
 			$wid = $this->input->post('id');
 			/**/
 			$arr = array(
 				'COMMENTATOR'=>$uid,
 				'COMMENT'=>$comment,
 				'ADD_TIME'=>$data,
 				'BLOG_ID'=>$wid
 				);
 			$result = $this->comment_model->save_comment($arr);
 			if($result){
 				redirect('blog/logined');
 			}
		}
	}

	public function manage_comment(){
		$login_user=$this->session->userdata("login_user");
		if($login_user){
			$uid = $login_user->USER_ID;
			$result = $this->comment_model->get_by_uid($uid);
			/*var_dump($result);
			die();*/
		}
		$this->load->view('blogComments',array(
			'comments'=>$result
			));
	}
}