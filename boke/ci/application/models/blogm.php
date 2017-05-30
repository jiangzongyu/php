<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Blogm extends CI_Model{
		public function get_all(){
            $this->db->select('blog.*,catalog.name as CATALOG_NAME');
            $this->db->from('t_blogs blog');
            $this->db->join('t_blog_catalogs catalog','blog.catalog_id=catalog.catalog_id');
		    $this->db->order_by("blog.ADD_TIME","desc");
			return $this->db->get()->result();
			// var_dump($query);
		}

		public function get_newBlog($title,$content,$writer,$catalog_id){
			$arr=array(
				'TITLE'=>$title,
				'CONTENT'=>$content,
                'WRITER'=>$writer,
                'CATALOG_ID'=>$catalog_id
				);
			$this->db->insert('t_blogs',$arr);
			return $this->db->affected_rows();
		}
		public function get_blogCatalog($name){
			$arr=array(
				'NAME'=>$name
				);
			return $this->db->insert('t_blog_catalogs',$arr);
		}
		public function get_all_blogCatalog(){
			return $this->db->get('t_blog_catalogs')->result();
		}

        public function get_by_user_id($user_id){
            $arr=array(
                'USER_ID'=>$user_id
            );
//            var_dump($user_id);
//            die();
            $query=$this->db->get_where('t_users',$arr)->row();
//            var_dump($query);
//            die();
            return $query;
        }

        public function get_by_writer($writer_id){
            $this->db->select('blog.*,catalog.name as CATALOG_NAME');
            $this->db->from('t_blogs blog');
            $this->db->join('t_blog_catalogs catalog','blog.catalog_id=catalog.catalog_id');
            $this->db->where('blog.writer',$writer_id);  // blog下的writer字段等于$writer_id
            $this->db->order_by("blog.ADD_TIME","desc");
            return $this->db->get()->result();
        }

        public function get_by_id($blog_id){
            //点击率+1
            $this->db->set('click_rate','click_rate+1',FALSE);
            $this->db->where('blog_id',$blog_id);
            $this->db->update('t_blogs');
            //查询文章详细信息
            $this->db->select('blog.*,usr.name as WRITER_NAME,usr.img as WRITER_IMG');
            $this->db->from('t_blogs blog');
            $this->db->join('t_users usr','blog.writer=usr.user_id');
            $this->db->where('blog.blog_id',$blog_id);
            return $this->db->get()->row();
        }

        public function get_types_by_user($user_id){

            $sql="select t.*,(select count(*) from t_blog_catalogs a where a.CATALOG_ID=t.CATALOG_ID ) num from t_blog_catalogs t where USER_ID=$user_id";
            $query=$this->db->query($sql)->result();
//            var_dump($query);
//            die();
            return $query;

        }
        public function delete($blog_id){
            $this->db->delete('t_blogs',array('blog_id'=>$blog_id));
            if($this->db->affected_rows()>0){
                return TRUE;
            }
            return FALSE;
        }
	}	
 ?>