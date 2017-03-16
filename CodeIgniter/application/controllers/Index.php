<?php

class Index extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->helper('url_helper');
    }

    function index()
    {
        $this->load->view('index/login.html');
    }

    function apply()
    {
        $this->load->view('index/apply.html');
    }
    function articleType(){
        $articleType = $this->blog_model->getArticleType();
        echo json_encode($articleType);
    }
    function getArticle(){
        $articleType = $this->input->post('articleType');
        $article = $this->blog_model->getArticle($articleType);
        echo json_encode($article);
    }

}
