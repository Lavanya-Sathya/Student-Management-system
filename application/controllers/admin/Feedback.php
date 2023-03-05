<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $admin=$this->session->userdata('admin');
        if(empty($admin)){
            $this->session->set_flashdata('msg','Your session has been expired');
            redirect(base_url().'admin/login/index');
        }
    }
    public function index(){
        $this->load->model('Feedback_model');
        $this->load->model('SemClass_model');
        $this->load->model('Department_model');
        $this->load->model('Subject_model');


        $this->load->library('form_validation');

        $queryString = $this->input->get('dept');
        $sem_id = $this->input->get('sem_id');

        $params['queryString']=$queryString;
        $params['sem']=$sem_id;
        
        $dept=$this->Department_model->getDepartment();
        $sem=$this->SemClass_model->getSemByDeptId($queryString);
        $sub=$this->Subject_model->getsubjectBySemId($sem_id);

        // $stud=$this->StudentDetail_model->getStudentAllStudents($params);
        $data['queryString']=$queryString;
        $data['sem_ids']=$sem_id;
        $data['sem']=$sem;
        $data['sub']=$sub;

        $data['dept']=$dept;
        $feed=$this->Feedback_model->getFeedback($params);

        $data['feed']=$feed;

        $data['mainModule']='feedback';
        $data['subModule']='viewFeedback';

        $this->load->view('admin/feedback/viewFeedback',$data);
            
    }
   
    // to get all the usn under class(dependent dropdown)
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
    public function studentFeed(){
        $this->load->model('Feedback_model');
        $this->load->model('SemClass_model');
        $this->load->model('Department_model');
        $this->load->model('StudentDetail_model');

        $queryString = $this->input->get('dept');
        $sem_id = $this->input->get('sem_id');

        $params['queryString']=$queryString;
        $params['sem']=$sem_id;
        
        $dept=$this->Department_model->getDepartment();
        $sem=$this->SemClass_model->getSemByDeptId($queryString);
        $Students=$this->StudentDetail_model->getStudentDetailBySem($sem_id);
        $feed=$this->Feedback_model->getFeedbackDistinctUsn($params);
        
        $data['feed']=$feed;
        $data['queryString']=$queryString;
        $data['sem_ids']=$sem_id;
        $data['sem']=$sem;
        $data['dept']=$dept;

        $data['Students']=$Students;
        $data['mainModule']='feedback';
        $data['subModule']='enableFeedback';
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
            $this->load->view('admin/feedback/studentFeed',$data);
        }         
    }

    // This method will delete department
    public function delete($id){
        
        $this->load->model('Feedback_model');
        
        $this->Feedback_model->deleteFeedback($id);  
        $this->session->set_flashdata('success','Feedback deleted');
        redirect(base_url().'admin/feedback/index');
    }
}
?>