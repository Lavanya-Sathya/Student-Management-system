<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $admin=$this->session->userdata('admin');
        if(empty($admin)){
            $this->session->set_flashdata('msg','Your session has been expired');
            redirect(base_url().'admin/login/index');
        }
    }

    // This method will show department list page
    public function index(){
        $this->load->model('Department_model');
        $queryString = $this->input->get('q');
        $params['queryString']=$queryString;


        $dept=$this->Department_model->getDepartment($params);
        $data['queryString']=$queryString;
        $data['department']=$dept;
        $data['mainModule']='department';
        $data['subModule']='viewDepartment';
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('name','Name','trim|required');

        if($this->form_validation->run() == TRUE){
           
                $formArray['d_name']=$this->input->post('name');
                $this->Department_model->addDepartment($formArray);
    
                $this->session->set_flashdata('success','Department added Successfully');
                redirect(base_url().'admin/department/index',$data);
        
            
        }else{
            $this->load->view('admin/department/listdepartment',$data);
        }
    }
    // This method will show department edit page
    public function edit($id){
        $data['mainModule']='department';
        $data['subModule']='';
        $this->load->model('Department_model');
        $dept=$this->Department_model->getDepartmentById($id);   
        $data['dept']=$dept;
        if(empty($dept)){
            $this->session->set_flashdata('error','Department not found');
            redirect(base_url().'/admin/department/index');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('name','Name','trim|required');

        if($this->form_validation->run() == TRUE){
           
                $formArray['d_name']=$this->input->post('name');
                $this->Department_model->updateDepartment($id,$formArray);
    
                $this->session->set_flashdata('success','Department Updated Successfully');
                redirect(base_url().'admin/department/index',$data);
        
            
        }else{
            $this->load->view('admin/department/editDepartment',$data);
        }
    }
   
    // This method will delete department
    public function delete($id){
        $this->load->model('Department_model');
        $this->load->model('SemClass_model');
        $this->load->model('Subject_model');

        
        $dept=$this->Department_model->getDepartmentById($id); 
        if(empty($dept)){
            $this->session->set_flashdata('error','Department not found');
            redirect(base_url().'/admin/department/index');
        } 
        $this->SemClass_model->deleteSemDept($id);
        $this->Subject_model->deleteSubjectDept($id);

        $this->Department_model->deleteDepartment($id);
        
        $this->session->set_flashdata('success','Department  deleted Successfully. All the data associated with it are also deleted');
        redirect(base_url().'admin/department/index');
    }
}


?>