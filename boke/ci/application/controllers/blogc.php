<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Blogc extends CI_Controller {
		public function __construct(){
				parent::__construct();
				
			}
		public function index(){
			$this->load->model('blogm');
			$this->load->model('blogcatalogm');
            $writer_id=$this->input->get('writer');
            $writer = $this->blogm->get_by_user_id($writer_id);
            $blogs = $this->blogm->get_by_writer($writer_id);
            $catalogs=$this->blogcatalogm->get_by_user_id($writer_id);
//            var_dump($catalogs);
//			 die();
            $data = array(
                "blogs"=>$blogs,
                'writer'=>$writer,
                'catalogs'=>$catalogs,
            );
//
//            echo count($total);
//            echo "<pre>";
//			 var_dump($total);
//            echo "</pre>";
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
		    $login_user=$this->session->userdata('login_user');
		    $this->load->model('blogm');
		    $writer=$login_user->USER_ID;
//            var_dump($writer);
//            die();

            $type=$this->blogm->get_types_by_user($writer);
            $this->load->view('newBlog',array(
                'types'=>$type
            ));
//			var_dump($type);
//            die();

		}

		public function do_newBlog(){
			$title=htmlspecialchars($this->input->post('title'));
			$content=htmlspecialchars($this->input->post('content'));
            $login_user=$this->session->userdata('login_user');
            $writer=$login_user->USER_ID;
            $catalog_id=$this->input->post('catalog_id');
//            var_dump($catalog_id);
//            die();
            $this->load->model('blogm');
			$this->blogm->get_newBlog($title,$content,$writer,$catalog_id);
            redirect('blogc/index?writer='.$writer);
//            if($rows>0){
//                echo 'success';
//            }else{
//                echo 'fail';
//            }
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
//			echo '<pre>';
//            var_dump($result);
//            echo '</pre>';
//            die();
		}

		public function view($blog_id){
            //需要两次查询，第一次查询关联user和blog表
            $this->load->model('commentsm');
            $this->load->model('blogm');
            $blogs = $this->blogm->get_by_id($blog_id);
            //第二次查询blog的comments
            $comments = $this->commentsm ->get_by_blog_id($blog_id);
            $data = array(
                'blog'=>$blogs,
                'comments'=>$comments
            );

            $this->load->view('view_post',$data);
        }

        public function remove(){
            $this->load->model('blogm');
            $blog_id=$this->input->get('blogId');
            $result=$this->blogm->delete($blog_id);
            if($result){
                echo 'success';
            }else{
                echo 'fail';
            }
        }

        public function search(){
            $this->load->model('blogm');
            $title=$this->input->get('q');
            $results=$this->blogm->query($title);
            $data=array(
                'blog'=>$results
            );
            $this->load->view('view_query',$data);
//                        echo '<pre>';
//            var_dump($data);
//            echo '</pre>';
//            die();

        }

        public function updata(){
            $this->load->model('blogm');
            $blog_id=$this->input->get('id');

            $result=$this->blogm->do_updata($blog_id);
            if($result){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
        public function updataBlog(){
            $this->load->model('blogm');
            $blog_id=$this->input->get('blog_id');
            $result=$this->blogm->do1_updata($blog_id);
            $login_user=$this->session->userdata('login_user');
            $writer=$login_user->USER_ID;
            $type=$this->blogm->get_types_by_user($writer);
            $data=array(
                'blog'=>$result,
                'types'=>$type
            );

            $this->load->view('updataBlog',$data);
        }
        public function do_updata(){
            $this->load->model('blogm');
            $blog_id=$this->input->post('blog_id');
            $title=htmlspecialchars($this->input->post('title'));
            $content=htmlspecialchars($this->input->post('content'));
            $login_user=$this->session->userdata('login_user');
            $writer=$login_user->USER_ID;
            $catalog_id=$this->input->post('catalog_id');
            $this->blogm->get_updataBlog($blog_id,$title,$content,$writer,$catalog_id);
            redirect('blogc/index?writer='.$writer);

        }
	}

 ?>