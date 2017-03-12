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
		}
		public function login($account,$pass){
			$arr=array(
				'ACCOUNT'=>$account,
				'PASSWORD'=>$pass
				);
			$query=$this->db->get_where('t_users',$arr);
			return $query->row();
		}

	}
?>