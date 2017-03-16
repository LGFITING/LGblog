<?php

class Index extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->model('user_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->load->view('index/login.html');
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
            echo '用户名已经被注册';
            return -1;
        } else {
            echo '用户名可以使用';
        }
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $head_icon = $this->input->post('head_icon');
    }

}
