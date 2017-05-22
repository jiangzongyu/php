<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	class Comment_model extends CI_Model
   {

   	public function get_comment_by_id($wid){
   		$this->db->select('*');
   		$this->db->from('t_blogs');
   		$this->db->join('t_comments','t_blogs.BLOG_ID = t_comments.BLOG_ID');
   		$this->db->join('t_users','t_comments.COMMENTATOR = t_users.USER_ID')->where('t_blogs.BLOG_ID',$wid);
   		return $this->db->get()->result();
   	}
   	public function get_by_id($wid){
   		return $this->db->get_where('t_blogs',array(
   			'BLOG_ID'=>$wid
   			))->row();
   	}
   	/*public function get_comment($wid){
   		return $this->db->get_where('t_blogs',array(
   			'BLOG_ID'=>$wid
   			))->row();
   	}*/
   	public function save_comment($arr){
   		return $this->db->insert('t_comments',$arr);
   	}
   	public function get_by_uid($uid){
   		$this->db->select('*');
   		$this->db->from('t_blogs');
   		$this->db->join('t_comments','t_blogs.BLOG_ID = t_comments.BLOG_ID');
   		$this->db->join('t_users','t_comments.COMMENTATOR = t_users.USER_ID')->
   			where('t_blogs.WRITER',$uid);
   		return $this->db->get()->result();
   	}

   	public function get_blog_title(){
   		$this->db->order_by('ADD_TIME','desc');
   		return $this->db->get('t_blogs','4','0')->result();
   	}
   }