<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model{
		// public function get_name($name){
		// 	//echo $name;
		// 	$query=$this->db->get_where('t_users',array('NAME'=>$name))->row();
		// 		return $query;
		
		public function save($name,$pass,$account,$gender,$province){
			$arr=array(
				'NAME'=>$name,
				'PASSWORD'=>$pass,
				'ACCOUNT'=>$account,
				'GENDER'=>$gender,
				'PROVINCE'=>$province
				);
			return $this->db->insert('t_users',$arr);
//			if($this->db->affected_rows()){
//			    return TRUE;
//            }
//            return FALSE;
		}

		public function login($account,$pass){
			$arr=array(
				'ACCOUNT'=>$account,
				'PASSWORD'=>$pass
				);
			$query=$this->db->get_where('t_users',$arr);
			return $query->row();
		}
        public function get_by_email($account){
            $arr=array(
                'ACCOUNT'=>$account
            );
            $query=$this->db->get_where('t_users',$arr)->row();
            var_dump($query);
            die();
            return $query;
		}
	}
?>