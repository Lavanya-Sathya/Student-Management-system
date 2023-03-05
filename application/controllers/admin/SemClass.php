<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SemClass extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $admin=$this->session->userdata('admin');
        if(empty($admin)){
            $this->session->set_flashdata('msg','Your session has been expired');
            redirect(base_url().'admin/login/index');
        }
    }
    public function index($id){
        $this->load->model('SemClass_model');
        $this->load->model('Department_model');

        $queryString = $this->input->get('q');
        $params['queryString']=$queryString;

        $sem=$this->SemClass_model->getSemByDeptId($id);
        $dept=$this->Department_model->getDepartmentById($id);
        $data['queryString']=$queryString;
        $data['sem']=$sem;
        $data['dept']=$dept;
        $data['mainModule']='semclass';
        $data['subModule']='viewsemclass';
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('name','Name','trim|required');

        if($this->form_validation->run() == TRUE){
           
            $formArray['section']=$this->input->post('name');
            $formArray['d_no']=$dept['d_id'];
            $checkIfExist=$this->SemClass_model->getSection($formArray['section']);
            if(!empty($checkIfExist)){
                $this->session->set_flashdata('error','Class Already exists');
                redirect(base_url().'admin/semclass/index/'.$dept['d_id'],$data);
            }
            $this->SemClass_model->addSem($formArray);
    
            $this->session->set_flashdata('success','Class added Successfully');
            redirect(base_url().'admin/semclass/index/'.$dept['d_id'],$data);
        }
        else{
            $this->load->view('admin/class/listClass',$data);
        }
    }
    // This method will show class edit page
    public function edit($id){
        $data['mainModule']='semclass';
        $data['subModule']='';
        $this->load->model('Department_model');
        $this->load->model('SemClass_model');
        $dept=$this->Department_model->getDepartment();
        $sem=$this->SemClass_model->getSemById($id);  
        $data['sem']=$sem; 
        $data['dept']=$dept;
        if(empty($sem)){
            $this->session->set_flashdata('error','Class not found');
            redirect(base_url().'/admin/semclass/index');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('name','Name','trim|required');

        if($this->form_validation->run() == TRUE){
           
            // department is create without image
            $formArray['section']=$this->input->post('name');
            $formArray['d_no']=$sem['d_no'];
            $checkIfExist=$this->SemClass_model->getSection($formArray['section']);
            if(!empty($checkIfExist)){
                $this->session->set_flashdata('error','Class Already exists');
                redirect(base_url().'admin/semclass/index/'.$sem['d_no'],$data);
            }
            $this->SemClass_model->updateSem($id,$formArray);
    
            $this->session->set_flashdata('success','Class Updated Successfully');
            redirect(base_url().'admin/semclass/index/'.$sem['d_no'],$data);
        
            
        }else{
            $this->load->view('admin/class/editClass',$data);
        }
    }
    // This method will delete department
    public function delete($id){
        
        $this->load->model('SemClass_model');
        $this->load->model('Subject_model');
        
        $sem=$this->SemClass_model->getSemById($id);  
        $dept=$sem['d_no'];
        if(empty($sem)){
            $this->session->set_flashdata('error','Class not found');
            redirect(base_url().'/admin/semclass/index/'.$dept);
        } 
        $this->Subject_model->deleteSubjectSem($id);

        $this->SemClass_model->deleteSem($id);
        
        $this->session->set_flashdata('success','Class deleted Successfully. All the data associated with it are also deleted');
        redirect(base_url().'admin/semclass/index/'.$dept);
    }
}
?>