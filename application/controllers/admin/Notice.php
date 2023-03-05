<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $admin=$this->session->userdata('admin');
        if(empty($admin)){
            $this->session->set_flashdata('msg','Your session has been expired');
            redirect(base_url().'admin/login/index');
        }
    }
    public function index(){
        $this->load->model('Department_model');
        $this->load->model('Notice_model');

        $queryString = $this->input->get('q');
        $params['queryString']=$queryString;


        $dept=$this->Department_model->getDepartment($params);
        $notice=$this->Notice_model->getNoticeAll($params);

        $data['queryString']=$queryString;
        $data['dept']=$dept;
        $data['notice']=$notice;
        $data['mainModule']='notice';
        $data['subModule']='viewNotice';

        $this->load->view('admin/notice/listnotice',$data);
            
    }
   
    // to get all the usn under class
    public function getUSN(){
        $id=$this->input->post('sem_id');
        $this->load->model('StudentDetail_model');
        $usn=$this->StudentDetail_model->getStudentDetailBySem($id);
        $data['usn']=$usn;
        $usnString = $this->load->view('usn-select',$data,true);
// this will not load the page again and will return data as a string
        $response['usn']=$usnString;
        echo json_encode($response);
    }

    // to create a new notice
    public function create(){
        $this->load->model('Department_model');
        $this->load->model('Notice_model');

        $dept=$this->Department_model->getDepartment();
        $notice=$this->Notice_model->getNoticeAll();

        $data['dept']=$dept;
        $data['notice']=$notice;
        $data['mainModule']='notice';
        $data['subModule']='viewNotice';
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('comment','comment','trim|required');
        $this->form_validation->set_rules('dept_id','dept_id','trim|required');


        if($this->form_validation->run() == TRUE){
           
                $formArray['comment']=$this->input->post('comment');
                $formArray['dept_id']=$this->input->post('dept_id');
                $formArray['sem_id']=$this->input->post('sem_id');
                $formArray['USN']=$this->input->post('usn');

                $formArray['status']=1;
                $formArray['created_at']=date('Y-m-d H:i:s');
                
                $this->Notice_model->addNotice($formArray);
    
                $this->session->set_flashdata('success','Notice added Successfully');
                redirect(base_url().'admin/notice/index',$data);
        
        }else{
            $this->load->view('admin/notice/createNotice',$data);
        }         
    }

    // This method will delete department
    public function delete($id){
        
        $this->load->model('Notice_model');
        
        $notice=$this->Notice_model->getNoticeById($id);  
        if(empty($notice)){
            $this->session->set_flashdata('error','Notification id not found');
            redirect(base_url().'/admin/notice/index/'.$dept);
        } 
        $this->Notice_model->deleteNotice($id);  
        $this->session->set_flashdata('success','Notification deleted');
        redirect(base_url().'admin/notice/index/'.$dept);
    }
}
?>