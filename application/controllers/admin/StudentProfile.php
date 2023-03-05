<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentProfile extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $admin=$this->session->userdata('admin');
        if(empty($admin)){
            $this->session->set_flashdata('msg','Your session has been expired');
            redirect(base_url().'admin/login/index');
        }
    }
    // This method is for both view and create a new subject
    public function index(){
        $this->load->model('StudentDetail_model');
        $this->load->model('Department_model');
        $this->load->model('SemClass_model');

        $this->load->library('form_validation');

        $queryString = $this->input->get('dept');
        $sem_id = $this->input->get('sem_id');

        $params['queryString']=$queryString;
        $params['sem']=$sem_id;

        $dept=$this->Department_model->getDepartment();
        $sem=$this->SemClass_model->getSemByDeptId($queryString);

        $stud=$this->StudentDetail_model->getStudentAllStudents($params);
        $data['queryString']=$queryString;
        $data['sem_ids']=$sem_id;
        $data['sem']=$sem;

        $data['stud']=$stud;
        $data['dept']=$dept;

        $this->load->view('admin/student/studentList',$data);
        
    }

    // student profile consisting of all the details
    public function profile($id){
        $this->load->model('StudentDetail_model');
        $this->load->model('Department_model');
        $this->load->model('SemClass_model');
        $this->load->model('Family_model');
        $this->load->model('Education_model');
        $this->load->model('Notice_model');


        $stud = $this->StudentDetail_model->getStudentDetailByUSN($id);
        $dept = $this->Department_model->getDepartmentById($stud['dept_id']);
        $sem = $this->SemClass_model->getSemById($stud['sem_id']);
        $fam = $this->Family_model->getFamilyDetails($id);
        $edu = $this->Education_model->getEducationDetails($id);


        $this->load->library('form_validation');

        $data['stud']=$stud;
        $data['dept']=$dept;
        $data['sem']=$sem;
        $data['fam']=$fam;
        $data['edu']=$edu;
        if(empty($stud)){
            $this->session->set_flashdata('error','Student not found');
            redirect(base_url().'student/homestudent/index');
        }
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('statusVal','statusVal','trim|required');
        if($this->form_validation->run() == TRUE){

                $formArray['status']=$this->input->post('statusVal');
                $this->StudentDetail_model->changeStudentDetails($id,$formArray);
                if($formArray['status']==1){
                    $this->session->set_flashdata('success','Student Profile Approved Successfully');
                    $dataArray['comment']="Your Profile has been Approved by the admin. ";
                }else{
                    $this->session->set_flashdata('error','Student Profile is not Approved yet');
                    $dataArray['comment']="Your Profile is not Approved by the admin. ";
                }
                
                $dataArray['comment'].= $this->input->post('comment');
                $dataArray['USN']=$id;
                $dataArray['status']=1;
                $dataArray['created_at']=date('Y-m-d H:i:s');
                $this->Notice_model->addNotice($dataArray);
                redirect(base_url().'admin/studentprofile/index',$data);
            
        }else{
            $this->load->view('admin/student/studentProfile',$data);

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