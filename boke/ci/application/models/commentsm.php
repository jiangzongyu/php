<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Commentsm extends CI_Model{
        public function get_by_blog_id($blog_id){
            $this->db->select('comm.*,usr.name as COMMENTATOR_NAME,usr.img as COMMENTATOR_IMG');
            $this->db->from('t_comments comm');
            $this->db->join('t_users usr','comm.commentator=usr.user_id');
            $this->db->where('comm.blog_id',$blog_id);
            $this->db->order_by("comm.ADD_TIME","desc");
            return $this->db->get()->result();
        }
        public function save($data){
            $this->db->insert('t_comments',$data);
            if($this->db->affected_rows()>0){
                return TRUE;
            }
            return FALSE;
        }

        public function get_by_user_id($user_id){
//            var_dump($user_id);
//            die();
           $sql="select comm.*,usr.name as COMMENTATOR_NAME,blog.title as TITLE,blog.blog_id from t_comments comm,t_users usr,t_blogs blog where comm.commentator=usr.user_id and comm.blog_id=blog.blog_id in (select blog_id from t_blogs where writer=$user_id)";
           $query=$this->db->query($sql);
           return $query->result();
        }

        public function delete($comment_id){
            $this->db->delete('t_comments',array('comment_id'=>$comment_id));
            if($this->db->affected_rows()>0){
                return TRUE;
            }
            return FALSE;
        }
    }
