<?php
    /**
     *
     */
    class Blog extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('blog_model');
            $this->load->helper('url_helper');
        }
        function index(){
        $name = $_POST['name'];
        $data['blog'] = $this->blog_model->get_name($name);
        $data['id'] =$data['blog']['id'];
        $data['name'] =$data['blog']['name'];
        $data['password']=$data['blog']['password'];
        $data['imgUrl'] = $data['blog']['imgUrl'];
        $password = $_POST['password'];
        $loginstatus = $_POST['status'];
        //登录
        if ($name===$data['name'] && $password===$data['password']) {
            $this->blog_model->loginIn($name,$loginstatus);
            $this->blog_model->get_name($name);
            $data['blogMsg'] = $this->blog_model->getpersonalMsg($name);
            $data['idnum'] =$data['blogMsg']['idnum'];
            $data['nameMsg'] =$data['blogMsg']['name'];
            echo json_encode(array('name'=>$data['blogMsg']['name'],'ID：'=>$data['blogMsg']['idnum'],'url'=>$data['imgUrl']));
        }
        // $this->load->view('templates/header', $data);
        // $this->load->view('Blog/index', $data);
        // $this->load->view('templates/footer');
    }
    //退出登录
    function loginOut(){
        $name = $_POST['name'];
        $loginstatus = $_POST['status'];
        $this->blog_model->loginOut($name,$loginstatus);
        echo json_encode(array('status'=>'0'));
    }
    //用户名验证
      function checkName(){
            $name = $_POST['name'];
            $data['check'] = $this->blog_model->get_name($name);
            $data['checkName'] = $data['check']['name'];
            if ($name=$data['checkName']) {
                echo json_encode(array('status'=>'0','提示：'=>'用户名已存在'));
            }
            else {
                echo json_encode(array('status'=>'1','提示：'=>'用户名有效'));
            }
    }
    //邮箱验证
     function checkEmail(){
            $email = $_POST['email'];
            $data['check'] = $this->blog_model->get_email($email);
            $data['checkEmail'] = $data['check']['email'];
            if ($email = $data['checkEmail']) {
                echo json_encode(array('status'=>'0','提示：'=>'邮箱已存在'));
            }
            else {
                echo json_encode(array('status'=>'1','提示：'=>'邮箱有效'));
            }
    }
    //注册会员
     function signUp(){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            //   $data['blog'] = $this->blog_model->upLoad($name,$imgUrl);
            $this->blog_model->signUp($name,$password,$email,$phone);
            if (!$name ='' && !$password = '' && !$email ='' && !$phone ='') {
                echo json_encode(array('status'=>'1','提示：'=>'注册成功'));
            }
    }
    function upLoad(){
        $name = $_POST['name'];
        if (file_exists("uploads/" . $_FILES['logo']["name"]))
          {
          echo json_encode(array('status'=>$_FILES['logo']["name"] .' '. 'aready exists','url'=>'http://localhost/CodeIgniter/uploads/'.$_FILES['logo']["name"]));
          $imgUrl = 'http://localhost/CodeIgniter/uploads/'.$_FILES['logo']["name"];
          $this->blog_model->upLoad($name,$imgUrl);
          }
        else
          {
          move_uploaded_file($_FILES['logo']["tmp_name"],"uploads/" . $_FILES['logo']["name"]);
          $imgUrl = 'http://localhost/CodeIgniter/uploads/'.$_FILES['logo']["name"];
          $this->blog_model->upLoad($name,$imgUrl);
          echo json_encode(array('status'=>"Stored in: " . "uploads/" . $_FILES['logo']["name"],'url'=>'http://localhost/CodeIgniter/uploads/'.$_FILES['logo']["name"]));
          }
    }
    }
 ?>
