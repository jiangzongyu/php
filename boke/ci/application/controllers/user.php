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
            $pass1=$this->input->post('pwd');
            $pass2=$this->input->post('pwd2');
			$account=$this->input->post('email');
			$gender=$this->input->post('gender');
			$province=$this->input->post('province');
			$city = $this->input->post('city');
			// var_dump($name);
			// die();
            //验证数据
            if($pass1!=$pass2){
                $this->regist();
            }else{
                //2.访问数据库
                $this->load->model('user_model');
                $result=$this->user_model->save($name,$pass1,$account,$gender,$province,$city);
                if($result){
                    redirect('user/login');//重定向
//                    $this->login();  地址栏会显示一个路径 save_user 这个对用户不安全
                }else{
                    $this->regist();
                }
//                $this->load->view('login');
            }

		}

		public function index(){
            $this->load->view('index_logined');
        }

		public function login(){
			$this->load->view('login');
		}
//        public function  visitor(){
//		    $this->load->view('visitor');
//        }
		public function do_login(){
            //1.接受数据
			$email=$this->input->post('email');
			$pass=$this->input->post('pwd');

			//2.访问数据库
			$this->load->model('user_model');
			$query=$this->user_model->login($email,$pass);

			//3.跳转
			if($query){
				$this->session->set_userdata("login_user",$query);
				redirect('blogc/index?writer='.$query->USER_ID);
			}else{
			
				redirect("user/login");
				// $this->load->view('login');
			}
		}
		public function logout(){
			$this->session->unset_userdata("login_user");
			redirect('blogc/visitor');
		}

		public  function check_name(){
           $account= $this->input->get('email');
//           var_dump($account);
//           die();
           $this->load->model('user_model');
           $user = $this->user_model->get_by_email($account);
//           var_dump($user);
//           die();
           if($user){
                echo "error";
           }else{
               echo "ok";
           }
        }

        public function ajax_check_login(){
           $login_user=$this->session->userdata('login_user');
           if($login_user){
               echo 'logined';
           }else {
               echo 'not_login';
           }
        }
	}
?>