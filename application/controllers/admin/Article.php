<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $admin=$this->session->userdata('admin');
        if(empty($admin)){
            $this->session->set_flashdata('msg','Your session has been expired');
            redirect(base_url().'admin/login/index');
        }
    }

    public function index($page=1){
        $per_page=4;  
        
        $this->load->model('Article_model');
        $this->load->library('pagination');
        $config['base_url']=base_url('admin/article/index');
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
        $param['offset']=$per_page;
        $param['limit']=($page*$per_page)-$per_page;
        $query=$this->input->get('q');
        $param['q']=$query;
        $article=$this->Article_model->getArticles($param);

        $data['article']=$article;  
        $data['queryString']=$query;
        $data['pagination_links']=$pagination_links;
        $data['mainModule']='article';
        $data['subModule']='viewArticle';
        $this->load->view('admin/article/listArticle',$data);

    }

    public function createArticle(){
        $this->load->model('Article_model');
        $this->load->model('Category_model');
        $this->load->helper('common_helper');
        $data['mainModule']='article';
        $data['subModule']='createArticle';
        $category=$this->Category_model->getCategories();
        $data['category']=$category;

        $config['upload_path']      = './public/uploads/articles/';
        $config['allowed_types']    = 'jpg|png|gif';
        $config['encrypt_name']     = true;
        $this->load->library('upload',$config);


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');

        $this->form_validation->set_rules('category_id','Category','trim|required');
        $this->form_validation->set_rules('title','Title','trim|required|min_length[20]');
        $this->form_validation->set_rules('author','Author','trim|required');

        if($this->form_validation->run() == true){
            if(!empty($_FILES['image']['name'])){
                if($this->upload->do_upload('image')){
                    // image uploaded successfully
                    $data=$this->upload->data();
                    resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_front/'.$data['file_name'],1120,800);
                    resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_admin/'.$data['file_name'],300,250);
                    
                    $formArray['image']=$data['file_name'];
                    $formArray['category']=$this->input->post('category_id');
                    $formArray['title']=$this->input->post('title');
                    $formArray['description']=$this->input->post('description');
                    $formArray['author']=$this->input->post('author');
                    $formArray['status']=$this->input->post('status');
                    $formArray['created_at']=date('Y-m-d H:i:s');
                    $this->session->set_flashdata('success','Article added successfully');
                    $this->Article_model->addArticle($formArray);
                    redirect(base_url().'admin/article/index');
                }else{
                    $errors=$this->upload->display_errors('<p class="invalid-feedback">','</p>');
                    $data['ImageErrors']=$errors;
                    $this->load->view('admin/article/createArticle',$data);
                }

            }else{
                // Save article without image
                $formArray['category']=$this->input->post('category_id');
                $formArray['title']=$this->input->post('title');
                $formArray['description']=$this->input->post('description');
                $formArray['author']=$this->input->post('author');
                $formArray['status']=$this->input->post('status');
                $formArray['created_at']=date('Y-m-d H:i:s');
                $this->session->set_flashdata('success','Article added successfully');
                $this->Article_model->addArticle($formArray);
                redirect(base_url().'admin/article/index');

            }

        }
        else{
            $this->load->view('admin/article/createArticle',$data);
        }
    
    }
    public function editArticle($id){
        $data['mainModule']='article';
        $data['subModule']='';
        $this->load->model('Article_model');
        $this->load->model('Category_model');
        $this->load->helper('common_helper');
        $this->load->library('form_validation');
        $article=$this->Article_model->getArticlesById($id);
        if(empty($article)){ echo "Empty"; }
        $category=$this->Category_model->getCategories();
        $data['articles']=$article;
        $data['category']=$category;
        if(empty($article)){
            $this->session->set_flashdata('error','Article not Found');
            redirect(base_url().'admin/article/index');

        }

        $config['upload_path']      = './public/uploads/articles/';
        $config['allowed_types']    = 'jpg|png|gif';
        $config['encrypt_name']     = true;
        $this->load->library('upload',$config);


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');

        $this->form_validation->set_rules('category_id','Category','trim|required');
        $this->form_validation->set_rules('title','Title','trim|required|min_length[20]');
        $this->form_validation->set_rules('author','Author','trim|required');

        if($this->form_validation->run() == true){
            if(!empty($_FILES['image']['name'])){
                if($this->upload->do_upload('image')){
                    // image uploaded successfully
                    if(file_exists('./public/uploads/articles/'.$article['image'])){
                        unlink('./public/uploads/articles/'.$article['image']);
                    }
                    if(file_exists('./public/uploads/articles/thumb_admin/'.$article['image'])){
                        unlink('./public/uploads/articles/thumb_admin/'.$article['image']);
                    }
                    if(file_exists('./public/uploads/articles/thumb_front/'.$article['image'])){
                        unlink('./public/uploads/articles/thumb_front/'.$article['image']);
                    }
                    $data=$this->upload->data();
                    resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_front/'.$data['file_name'],1120,800);
                    resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_admin/'.$data['file_name'],300,250);
                    
                    $formArray['image']=$data['file_name'];
                    $formArray['category']=$this->input->post('category_id');
                    $formArray['title']=$this->input->post('title');
                    $formArray['description']=$this->input->post('description');
                    $formArray['author']=$this->input->post('author');
                    $formArray['status']=$this->input->post('status');
                    $formArray['updated_at']=date('Y-m-d H:i:s');
                    $this->session->set_flashdata('success','Article Updated successfully');
                    $this->Article_model->updateArticle($id,$formArray);
                    redirect(base_url().'admin/article/index');
                }else{
                    $errors=$this->upload->display_errors('<p class="invalid-feedback">','</p>');
                    $data['ImageErrors']=$errors;
                    $this->load->view('admin/article/editArticle',$data);
                }

            }else{
                // Save article without image
                $formArray['category']=$this->input->post('category_id');
                $formArray['title']=$this->input->post('title');
                $formArray['description']=$this->input->post('description');
                $formArray['author']=$this->input->post('author');
                $formArray['status']=$this->input->post('status');
                $formArray['updated_at']=date('Y-m-d H:i:s');
                $this->session->set_flashdata('success','Article Updated successfully');
                $this->Article_model->updateArticle($id,$formArray);
                redirect(base_url().'admin/article/index');

            }

        }
        else{
            $this->load->view('admin/article/editArticle',$data);
        }

     }
    public function deleteArticle($id){
        $this->load->model('Article_model');
        $checkArticle=$this->Article_model->getArticlesById($id);
        $this->load->helper('common_helper');

        if(empty($checkArticle)){
            $this->session->set_flashdata('error','Article not found');
            redirect(base_url().'admin/article/index');
        }
        
        if(file_exists('./public/uploads/articles/'.$checkArticle['image'])){
            unlink('./public/uploads/articles/'.$checkArticle['image']);
        }
        if(file_exists('./public/uploads/articles/thumb_admin/'.$checkArticle['image'])){
            unlink('./public/uploads/articles/thumb_admin/'.$checkArticle['image']);
        }
        if(file_exists('./public/uploads/articles/thumb_front/'.$checkArticle['image'])){
            unlink('./public/uploads/articles/thumb_front/'.$checkArticle['image']);
        }
      
        $this->Article_model->deleteArticle($id);
        $this->session->set_flashdata('success','Successfully deleted Article');
        redirect(base_url().'admin/article/index');

    }
}
?>