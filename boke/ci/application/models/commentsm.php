<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Commentsm extends CI_Model{
        public function get_by_blog_id($blog_id){
            $this->db->select('comm.*,usr.name as COMMENTATOR_NAME,usr.img as COMMENTATOR_IMG');
            $this->db->from('t_comments comm');
            $this->db->join('t_users usr','comm.commentator=usr.user_id');
            $this->db->where('comm.blog_id',$blog_id);
            return $this->db->get()->result();
        }
    }
