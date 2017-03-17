<?php

class Index extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->model('user_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $password = $this->session->userdata('password');
        if ($username && $password) {
            $this-redirect('http://localhost:8080/#');
        } else {
            $this->load->view('index/login.html');
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if (!empty($username)) {
            $result = $this->user_model->checkUserName($username);
            if ($result == null) {
                echo json_encode(array('status' => '-1', 'msg' => '用户名或密码输入有误'));
            } else {
                if ($result['password'] == $password) {
                    $userMsg = array(
                        'username' => $username,
                        'password' => $password,
                    );
                    $this->session->set_userdata($userMsg);
                    echo json_encode(array('status' => '1', 'msg' => '验证通过'));
                } else {
                    echo json_encode(array('status' => '-1', 'msg' => '密码错误'));
                }
            }
        } else {
            echo json_encode(array('status' => '-1', 'msg' => '用户名或密码输入有误'));
        }
    }
    
    public function logOut(){
        $array_items = array('username', 'password');
        $this->session->unset_userdata($array_items);
    }
    public function apply()
    {
        $this->load->view('index/apply.html');
    }

    public function userApply()
    {
        $username = $this->input->post('userName');
        //检测用户名是否已被注册
        $result = $this->user_model->checkUserName($username);
        if ($result['username'] === $username) {
            echo json_encode(array('status' => '-1', 'msg' => '用户名已被注册'));
            return -1;
        } else {
            echo json_encode(array('status' => '1', 'msg' => '用户名可以使用'));
        }
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $head_icon = $this->input->post('head_icon');
    }

}
