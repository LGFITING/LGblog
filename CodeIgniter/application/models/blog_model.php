<?php
    /**
     *
     */
class Blog_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_name($name){
        $query = $this->db->get_where('LGblog',array('name'=>$name));
        return $query->row_array();
    }
    public function getpersonalMsg($name){
        $query = $this->db->get_where('personalMsg',array('name'=>$name));
        return $query->row_array();
    }
    public function get_email($email){
        $query = $this->db->get_where('LGblog',array('email'=>$email));
        return $query->row_array();
    }
    public function signUp($name,$password,$email,$phone){
        $this->db->insert('LGblog',array('name'=>$name,'password'=>$password,'email'=>$email,'phone'=>$phone));
    }
    public function loginIn($name,$loginstatus){
        $query = $this->db->where('name',$name);
        $this->db->update('LGblog',array('loginstatus'=>$loginstatus));
    }
    public function loginOut($name,$loginstatus)
    {
        $query = $this->db->where('name',$name);
        $this->db->update('LGblog',array('loginstatus'=>$loginstatus));
    }
    public function upLoad($name,$imgUrl)
    {
        $query = $this->db->where('name',$name);
        $this->db->update('LGblog',array('imgUrl'=>$imgUrl));
    }
    /**获取文章分类**/
    function getArticleDepend(){
        $query = $this->db->get_where('lgblog_db');
        return $query->row_array();
    }
}

 ?>
