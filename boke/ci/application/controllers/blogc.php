<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Blogc extends CI_Controller {
		public function __construct(){
				parent::__construct();
				
			}
		public function index(){
			$this->load->model('blogm');
			// $query=$this->blogm->get_all_catalog();
			$result=$this->blogm->get_all();
			// var_dump($result);
			// die();
			$this->load->view('index_logined',array(
					"blogs"=>$result
					));
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
	}
 ?>