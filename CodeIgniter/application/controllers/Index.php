<?php

class Index extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('index/login.html');
    }

    function apply()
    {
        $this->load->view('index/apply.html');
    }

}
