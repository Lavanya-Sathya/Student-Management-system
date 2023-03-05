<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function index(){
        $this->load->model('Article_model');
        $param['offset']=4;
        $param['limit']=0;
        $this->load->helper('text');

        $article=$this->Article_model->getArticlesFront($param);
        $data['articles']=$article;
        $this->load->view('/front/home',$data);
    }
}
?>