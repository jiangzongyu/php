<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Blogcatalogm extends CI_Model{
    public function get_by_user_id($user_id){
        return $this->db->get_where('t_blog_catalogs',array('USER_ID'=>$user_id))->result();
    }

}