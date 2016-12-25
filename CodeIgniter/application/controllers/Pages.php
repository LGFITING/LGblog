<?php
    /**
     *
     */
    class Pages extends CI_Controller
    {

        public function view($page = 'home')
        {
            if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
                show_404();
            }
            $data['title'] = ucfirst($page);
            $this->load->view('templates/header',$data);
            $this->load->view('Pages/'.$page,$data);
            $this->load->view('templates/footer',$data);
        }
    }

 ?>
