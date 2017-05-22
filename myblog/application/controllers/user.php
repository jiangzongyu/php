<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function login()
	{
		$this->load->view('login');
	}

	public function do_login()
	{
		$email=$this->input->post('email');
		$pwd=$this->input->post('pwd');
		
		$result=$this->user_model->get_by_name_password($email,$pwd);
		if($result){
			$this->session->set_userdata("login_user",$result);//对象

			redirect('blog/logined');
		}
		else{
			
			redirect('user/login');
		}
	}

	public function logout(){
		$this->session->unset_userdata("login_user");
		redirect('blog');
	}

	public function reg()
	{
		$this->load->view('reg');
		
	}

	public function do_reg()
	{	
		$email=$this->input->post('email');
		$name=$this->input->post('name');
		$province=$this->input->post('province');
		$pwd=$this->input->post('pwd');
		$pwd2=$this->input->post('pwd2');
		$gender=$this->input->post('gender');
		if($pwd==$pwd2){
			$arr = array(
				'ACCOUNT'=>$email,
				'PASSWORD'=>$pwd,
				'NAME'=>$name,
				'GENDER'=>$gender,
				'PROVINCE'=>$province
			);
			$result=$this->user_model->save($arr);
			if($result){
				redirect('user/login');
			}else{
				$this->reg();
			}
		}else{
			redirect('user/reg');
		}
		
		
	}
	public function check_name(){
		$f_email = $this->input->get('name');
		$result=$this->user_model->get_by_name($f_email);
		if($result){
			echo "lose";
		}else{
			echo "success";
		}
	}
	
	
}
