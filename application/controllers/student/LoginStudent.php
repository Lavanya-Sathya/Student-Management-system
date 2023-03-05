<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// This controller is created for the student login and authentication
class LoginStudent extends CI_Controller{

    // this method calls student login form
    public function index(){
        $student=$this->session->userdata('student');
        if(!empty($student)){
            $this->session->set_flashdata('msg','Your session has been expired');
            redirect(base_url().'student/homestudent/index');
        }
        $this->load->library('form_validation');
        $this->load->view('student/login');
    }
    // this method authenticate the login details
    public function authenticate(){
        $this->load->library('form_validation');

        $this->load->model('StudentDetail_model');

        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run() == true){
            $username=$this->input->post('username');
            $student=$this->StudentDetail_model->getStudentDetailByUSN($username);
           
            if(!empty($student)){
                $password=$this->input->post('password');
                if($password==$student['password']){
                    
                    $studentArray['USN']=$student['USN'];
                    $studentArray['name']=$student['name'];

                    $this->session->set_userdata('student',$studentArray);
                    redirect(base_url().'student/homestudent/index');

                }else{
                    $this->session->set_flashdata('msg','Either Username or Password is incorrect');
                    redirect(base_url().'student/loginstudent/index');

                }
            }
            else{
                $this->session->set_flashdata('msg','Either Username or Password is incorrect');
                redirect(base_url().'student/loginstudent/index');
            }

        }else{
        $this->load->view('student/login');

        }
    }
    

    // this method is for new student registration
    public function register(){
        $this->load->model('StudentDetail_model');
        $this->load->model('Department_model');
        $this->load->model('SemClass_model');
        $this->load->model('Family_model');


        $dept=$this->Department_model->getDepartment();
        $sem=$this->SemClass_model->getSem();

        $data['dept']=$dept;
        $data['sem']=$sem;

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('usn','USN','trim|required');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('email','email','trim|required');
        $this->form_validation->set_rules('dept_id','dept_id','trim|required');
        $this->form_validation->set_rules('sem_id','sem_id','trim|required');
        $this->form_validation->set_rules('password','password','trim|required');
        $this->form_validation->set_rules('repassword','repassword','trim|required');


        if($this->form_validation->run() == TRUE){
           
            $formArray['USN']=$this->input->post('usn');
            $formFam['USN']=$this->input->post('usn');

            $formArray['name']=$this->input->post('name');
            $formArray['dept_id']=$this->input->post('dept_id');
            $formArray['sem_id']=$this->input->post('sem_id');
            $formArray['email_id']=$this->input->post('email');
            $formArray['password']=$this->input->post('password');

            $checkIfExist=$this->StudentDetail_model->getStudentDetailByUSN($formArray['USN']);
            if(!empty($checkIfExist)){
                $this->session->set_flashdata('error','USN Already exists. Recover your account by email');
                redirect(base_url().'student/loginstudent/forgot');
            }
            $this->StudentDetail_model->insertStudentDetail($formArray);
            $this->Family_model->insertFamilyDetails($formFam);

    
            $this->session->set_flashdata('success','Student Registered Successfully. Login Now');
            redirect(base_url().'student/loginstudent/index');
        }
        else{
            $this->load->view('student/register',$data);
        }

    }
    // to get all the states under country
    public function getSemester(){
        $id=$this->input->post('dept_id');
        $this->load->model('SemClass_model');
        $sem=$this->SemClass_model->getSemByDeptId($id);
        $data['sem']=$sem;
        $semString = $this->load->view('semester-select',$data,true);
    // this will not load the page again and will return data as a string
        $response['sem']=$semString;
        echo json_encode($response);
    }

    // this method is for sign out from the existing session 
    public function logout(){
        $this->session->unset_userdata('student');
        redirect(base_url());
    }
    
    public function logSection(){
        $this->load->view('front/logSection');
    }
    
}
?>
