<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	class Catalog_model extends CI_Model
   {
   	public function get_catalog($uid){
   		return $this->db->get_where('t_blog_catalogs',array(
            'USER_ID'=>$uid
            ))->result();
   	}

   	public function add_catalog($name,$uid){
   		return $this->db->insert('t_blog_catalogs',array(
   			'NAME'=>$name,
            'USER_ID'=>$uid
   			));
   	}
   }