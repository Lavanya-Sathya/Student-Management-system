<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $admin=$this->session->userdata('admin');
        if(empty($admin)){
            $this->session->set_flashdata('msg','Your session has been expired');
            redirect(base_url().'admin/login/index');
        }
    }
    // This method is for both view and create a new subject
    public function index($id){
        $this->load->model('Subject_model');
        $this->load->model('SemClass_model');
        $this->load->model('Department_model');

        $sub=$this->Subject_model->getsubjectBySemId($id);
        $sem=$this->SemClass_model->getSemById($id);
        $dept=$this->Department_model->getDepartmentById($sem['d_no']);

        $data['sem']=$sem;
        $data['dept']=$dept;
        $data['sub']=$sub;
        $data['mainModule']='subject';
        $data['subModule']='viewsubject';
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('code','code','trim|required');



        if($this->form_validation->run() == TRUE){
           
                $formArray['subject_code']=$this->input->post('code');
                $formArray['subject_name']=$this->input->post('name');
                $formArray['sem_id']=$sem['sem_id'];
                $formArray['d_id']=$dept['d_id'];
                $checkIfExist=$this->Subject_model->getSubjectCode($formArray['subject_code']);
                if(!empty($checkIfExist)){
                    $this->session->set_flashdata('error','Subject code Already exists');
                    redirect(base_url().'admin/subject/index/'.$sem['sem_id'],$data);
                }

                $this->Subject_model->addSubject($formArray);
    
                $this->session->set_flashdata('success','Subject added Successfully');
                redirect(base_url().'admin/subject/index/'.$sem['sem_id'],$data);
        
            
        }else{
            $this->load->view('admin/subject/listSubject',$data);
        }
    }
    
    // This method will show department edit page
    public function edit($id){
        $data['mainModule']='subject';
        $data['subModule']='';
        $this->load->model('Department_model');
        $this->load->model('SemClass_model');
        $this->load->model('Subject_model');
        // $sub=$this->Subject_model->getsubjectBySemId($id);
        // $sem=$this->SemClass_model->getSemById($id);

         
        $sub=$this->Subject_model->getSubjectById($id); 
        $dept=$this->Department_model->getDepartmentById($sub['d_id']);

        $data['subject']=$sub;
        // $data['sem']=$sem; 
        $data['dept']=$dept;
        if(empty($sub)){
            $this->session->set_flashdata('error','subject not found');
            redirect(base_url().'/admin/subject/index');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('code','code','trim|required');

        if($this->form_validation->run() == TRUE){
           
                $formArray['subject_code']=$this->input->post('code');
                $formArray['subject_name']=$this->input->post('name');
                $checkIfExist=$this->Subject_model->getSubjectCode($formArray['subject_code']);
                if(!empty($checkIfExist)){
                    $this->session->set_flashdata('error','Subject code Already exists');
                    redirect(base_url().'admin/subject/index/'.$sub['sem_id'],$data);
                }

                $this->Subject_model->updateSubject($id,$formArray);
    
                $this->session->set_flashdata('success','Subject Updated Successfully');
                redirect(base_url().'admin/subject/index/'.$sub['sem_id'],$data);
        
            
        }else{
            $this->load->view('admin/subject/editSubject',$data);
        }
    }
    // This method will delete department
    public function delete($id){
        
        $this->load->model('Subject_model');
        $sub=$this->Subject_model->getSubjectById($id); 
        $subSem=$sub['sem_id'];
        if(empty($sub)){
            $this->session->set_flashdata('error','Subject not found');
            redirect(base_url().'/admin/subject/index/'.$subSem);
        } 
        $this->Subject_model->deleteSubject($id);
        
        $this->session->set_flashdata('success','Subject deleted Successfully');
        redirect(base_url().'admin/subject/index/'.$subSem);
    }
}
?>