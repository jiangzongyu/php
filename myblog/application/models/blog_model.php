<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	class Blog_model extends CI_Model
   {
   	public function get_blog(){
         $this->db->order_by('ADD_TIME','desc');
   		return $this->db->get('t_blogs')->result();

   	}

   	public function get_catalog($uid){
   		return $this->db->get_where('t_blog_catalogs',array(
               'USER_ID'=>$uid
            ))->result();
   	}

   	public function get_by_cid($cid){
   		return $this->db->get_where('t_blogs',array('cid'=>$cid))->result();
   	}

      public function get_by_uid($uid){
         return $this->db->get_where('t_blogs',array('WRITER'=>$uid))->result();
      }

      public function save_blogs($arr){
         return $this->db->insert('t_blogs',$arr);
      }
   }