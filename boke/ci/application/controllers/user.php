<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}
		public function regist(){
			$this->load->view('reg.php');
		}
		public function save_user(){
			// 1.接收数据库
			$name=$this->input->post('name');
			$pass=$this->input->post('pwd');
			$account=$this->input->post('email');
			$gender=$this->input->post('gender');
			$province=$this->input->post('province');
			// var_dump($name);
			// die();
			//2.访问数据库
			$this->load->model('user_model');
			$this->user_model->save($name,$pass,$account,$gender,$province);
			$this->load->view('login');
		}
		public function login(){
			$this->load->view('login');
		}
		public function do_login(){
			$email=$this->input->post('email');
			$pass=$this->input->post('pwd');
			$this->load->model('user_model');
			$query=$this->user_model->login($email,$pass);
		
			if($query){
				$this->session->set_userdata("login_user",$query);
				redirect('blogc/index');
				 // $this->load->view('index_logined');
			}else{
			
				redirect("user/login");
				// $this->load->view('login');
			}
		}
		public function logout(){
			$this->session->unset_userdata("login_user");
			redirect('user/login');
		}
	}
?>