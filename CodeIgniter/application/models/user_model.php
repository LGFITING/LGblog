<?php

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function checkUserName($userName)
    {
        $query = $this->db->get_where('user', array('username' => $userName));
        return $query->row_array();
    }

}
