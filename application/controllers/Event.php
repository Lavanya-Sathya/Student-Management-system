<?php 
defined('BASEPATH') OR  exit('No direct script access allowed');

class Event extends CI_Controller{

    public function index($page=1){
        $this->load->model('Article_model');
        $this->load->helper('text');
        $this->load->library('pagination');
        $per_page=4;
        $param['offset']=$per_page;
        $param['limit']=($page*$per_page)-$per_page;

        $config['base_url']=base_url('event/index');
        $config['total_rows']=$this->Article_model->getArticlesCount();
        $config['per_page']=$per_page;
        $config['use_page_numbers']=true;

        $config['first_link']="First";
        $config['last_link']="Last";
        $config['next_link']="Next";
        $config['prev_link']="Prev";

        $config['full_tag_open']="<ul class='pagination'>";
        $config['full_tag_close']="</ul>";
        $config['num_tag_open']="<li class='page-item'>";
        $config['num_tag_close']="</li>";
        $config['cur_tag_open']="<li class='disabled page-item'><li class='active page-item'><a href='#' class='page-link'>";
        $config['cur_tag_close']="<span class='sr-only'></a></li></span>";
        $config['next_tag_open']="<li class='page-item'>";
        $config['next_tagl_close']="</li>";
        $config['prev_tag_open']="<li class='page-item'>";
        $config['prev_tagl_close']="</li>";
        $config['first_tag_open']="<li class='page-item'>";
        $config['first_tagl_close']="</li>";
        $config['last_tag_open']="<li class='page-item'>";
        $config['last_tagl_close']="</li>";
        $config['attributes']=array('class'=>'page-link');

        $this->pagination->initialize($config);
        $pagination_links=$this->pagination->create_links();

        $articles=$this->Article_model->getArticlesFront($param);
        $data['articles']=$articles;
        $data['pagination_links']=$pagination_links;

        $this->load->view('front/event',$data);
    }

    public function categories(){
        $this->load->model('Category_model');
        $categories = $this->Category_model->getCategoriesFront();
        $data['categories']=$categories;
        // print_r($categories);
        $this->load->view('front/categories',$data);
    }
    public function detail($id){
        $this->load->model('Article_model');
        $this->load->model('Comment_model');

        $this->load->library('form_validation');

        $article=$this->Article_model->getArticlesById($id);
        if(empty($article)){
            redirect(base_url().'event/index');
        }
        $data['article']=$article;
        $comments=$this->Comment_model->getComments($id,true);
        $data['comments']=$comments;
            
        $this->form_validation->set_error_delimiters('<p class="mb-0">','</p>');

        $this->form_validation->set_rules('name','Name','required|min_length[5]');
        $this->form_validation->set_rules('comment','Comment','required|min_length[20]');

        if($this->form_validation->run() == true){
            $formArray['name']=$this->input->post('name');
            $formArray['comment']=$this->input->post('comment');
            $formArray['article_id']=$id;
            $formArray['created_at']=date('Y-m-d H:i:s');
            $this->Comment_model->create($formArray);

            $this->session->set_flashdata('message','Your comment has been posted successfully');
            redirect(base_url().'event/detail/'.$id);

        }
        else{
            $this->load->view('front/detail_Article',$data);
        }
        
    }
    public function category($category_id,$page=1){
        $this->load->model('Category_model');
        $categories = $this->Category_model->getCategory($category_id);
        if(empty($categories)){
            redirect(base_url().'event/index');
        }

        $this->load->model('Article_model');
        $this->load->helper('text');
        $this->load->library('pagination');
        $per_page=4;
        $param['offset']=$per_page;
        $param['limit']=($page*$per_page)-$per_page;
        $param['category_id']=$category_id;

        $config['base_url']=base_url('event/category'.$category_id);
        $config['total_rows']=$this->Article_model->getArticlesCount($param);
        $config['uri_segment']=4;
        $config['per_page']=$per_page;
        $config['use_page_numbers']=true;

        $config['first_link']="First";
        $config['last_link']="Last";
        $config['next_link']="Next";
        $config['prev_link']="Prev";

        $config['full_tag_open']="<ul class='pagination'>";
        $config['full_tag_close']="</ul>";
        $config['num_tag_open']="<li class='page-item'>";
        $config['num_tag_close']="</li>";
        $config['cur_tag_open']="<li class='disabled page-item'><li class='active page-item'><a href='#' class='page-link'>";
        $config['cur_tag_close']="<span class='sr-only'></a></li></span>";
        $config['next_tag_open']="<li class='page-item'>";
        $config['next_tagl_close']="</li>";
        $config['prev_tag_open']="<li class='page-item'>";
        $config['prev_tagl_close']="</li>";
        $config['first_tag_open']="<li class='page-item'>";
        $config['first_tagl_close']="</li>";
        $config['last_tag_open']="<li class='page-item'>";
        $config['last_tagl_close']="</li>";
        $config['attributes']=array('class'=>'page-link');

        $this->pagination->initialize($config);
        $pagination_links=$this->pagination->create_links();

        $articles=$this->Article_model->getArticlesFront($param);
        $data['articles']=$articles;
        $data['pagination_links']=$pagination_links;
        $data['categories']=$categories;

        $this->load->view('front/category_article',$data);

    }
}
?>