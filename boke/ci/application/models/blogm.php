<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Blogm extends CI_Model{
		public function get_all(){
			$this->db->order_by("ADD_TIME","desc");
			return $this->db->get('t_blogs')->result();
			// var_dump($query);
		}
		// public function get_all_catalog(){
		// 	$query=$this->db->get('t_blog_catalogs');
		// 	return $query->result();
		// }
		public function get_newBlog($title,$content){
			$arr=array(
				'TITLE'=>$title,
				'CONTENT'=>$content
				);
			return $this->db->insert('t_blogs',$arr);
		}
		public function get_blogCatalog($name){
			$arr=array(
				'NAME'=>$name
				);
			return $this->db->insert('t_blog_catalogs',$arr);
		}
		public function get_all_blogCatalog(){
			return $this->db->get('t_blog_catalogs')->result();
		}
	}	
 ?>