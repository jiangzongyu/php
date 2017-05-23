<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Blogc extends CI_Controller {
		public function __construct(){
				parent::__construct();
				
			}
		public function index(){
			$this->load->model('blogm');
            $user_id=$this->input->get('writer');
            $writer = $this->blogm->get_by_user_id($user_id);
            $blogs = $this->blogm->get_by_writer($user_id);
            $data = array(
                "blogs"=>$blogs,
                'writer'=>$writer
            );
//			 var_dump($result);
//			 die();
			$this->load->view('index_logined',$data);
		}

		public function visitor(){
		    $this->load->model('blogm');
            $result=$this->blogm->get_all();
            $data = array(
                "blogs"=>$result
            );
            $this->load->view('visitor',$data);
        }
		public function newBlog(){
			$this->load->view('newBlog');
		}
		public function do_newBlog(){
			$title=$this->input->post('title');
			$content=$this->input->post('content');
			$this->load->model('blogm');
			$this->blogm->get_newBlog($title,$content);
			// $this->load->view('newBlog');
            redirect('blogc/index');
		}

		public function do_blogCatalog(){
			$name=$this->input->post('name');
			$this->load->model('blogm');
			$this->blogm->get_blogCatalog($name);

		}
			public function blogCatalog(){
			// $name=$this->input->post('name');
			$this->load->model('blogm');
			$result=$this->blogm->get_all_blogCatalog();
			$this->load->view('blogCatalogs',array(
					'catalogs'=>$result
				));
			// var_dump($res);
			// die();
			// $this->load->view('blogCatalogs');
		}
		public function blogs(){
			// $this->load->view('blogs');
			$this->load->model('blogm');
			$result=$this->blogm->get_all_blogCatalog();
			$this->load->view('blogs',array(
					'catalogs'=>$result
				));
		}

		public function view($blog_id){
            //需要两次查询，第一次查询关联user和blog表
            $this->load->model('commentsm');
            $this->load->model('blogm');
            $blog = $this->blogm->get_by_id($blog_id);
            //第二次查询blog的comments
            $comments = $this->commentsm ->get_by_blog_id($blog_id);
            $data = array(
                'blog'=>$blog,
                'comments'=>$comments
            );

            $this->load->view('view_post',$data);
        }
	}
 ?>