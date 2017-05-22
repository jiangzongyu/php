<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  /**
  * 
  */
  class User_model extends CI_Model
  {
  	public function get_by_name_password($email,$pwd)
    {
      //echo $name;
      //echo $password;
      return $this->db->get_where('t_users',array("ACCOUNT"=>$email,"PASSWORD"=>$pwd))->row();
    }
    public function get_by_name($f_email)
    {
      $result=$this->db->get_where('t_users',array('ACCOUNT'=>$f_email))->row();
      if($result>0){
          return TURE;
        }else{
          return FALSE;
        }
    }

  	public function save($arr){

    		return $this->db->insert('t_users',$arr);
  	}

  }