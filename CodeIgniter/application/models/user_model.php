<?php

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
   //注册验证 登录验证
    public function checkUserName($username)
    {
        $query = $this->db->get_where('user', array('username' => $username));
        return $query->row_array();
    }
    

}
