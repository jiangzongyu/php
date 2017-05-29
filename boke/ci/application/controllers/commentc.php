<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Commentc extends CI_Controller{
    public function __construct(){
        parent::__construct();

    }
    public function ajax_post(){
        $this->load->model('commentsm');
        $blog_id = $this->input->post('blogId');
        $content = $this->input->post('content');
        $login_user = $this->session->userdata('login_user');
        $user_id = $login_user->USER_ID;

        $save_data = array(
            'commentator'=>$user_id,
            'blog_id'=>$blog_id,
            'content'=>$content
        );

        $result=$this->commentsm->save($save_data);
        if($result){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function blogcomments(){
        $this->load->model('commentsm');
        $login_user=$this->session->userdata('login_user');
        $user_id=$login_user->USER_ID;
//        var_dump($user_id);
//        die();
        $comments=$this->commentsm->get_by_user_id($user_id);
//        var_dump($comments);
//        die();
        $this->load->view("blogcomments",array('comments'=>$comments));

    }

    public function remove(){
        $this->load->model('commentsm');
        $comment_id=$this->input->get('commentId');
        $result=$this->commentsm->delete($comment_id);
        if($result){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
}