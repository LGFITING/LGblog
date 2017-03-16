<?php

/**
 * 文章管理 lg
 */
class Article extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
    }

    function articleType()
    {
        $articleType = $this->blog_model->getArticleType();
        echo json_encode($articleType);
    }

    function getArticle()
    {
        $articleType = $this->input->post('articleType');
        $article = $this->blog_model->getArticle($articleType);
        echo json_encode($article);
    }

}
