<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class HomeStudent extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $student=$this->session->userdata('student');
        if(empty($student)){
            $this->session->set_flashdata('msg','Your session has been expired');
            redirect(base_url().'student/loginstudent/index');
        }
    }
    public function index(){
        $student=$this->session->userdata('student');
        $this->load->model('StudentDetail_model');
        $this->load->model('Department_model');
        $this->load->model('SemClass_model');
        $this->load->model('Notice_model');


        $stud = $this->StudentDetail_model->getStudentDetailByUSN($student['USN']);
        $dept = $this->Department_model->getDepartmentById($stud['dept_id']);
        $sem = $this->SemClass_model->getSemById($stud['sem_id']);
        $data['stud']=$stud;
        $notice = $this->Notice_model->getNotice($stud);

        $data['stud']=$stud;
        $data['notice']=$notice;

        $data['dept']=$dept;
        $data['sem']=$sem;
        $this->load->view('student/studentDashboard',$data);
    }

    // This method is to change password by student
    public function changePassword($id){
        $this->load->model('StudentDetail_model');
        $stud=$this->StudentDetail_model->getStudentDetailByUSN($id);   
        $data['stud']=$stud;
        if(empty($stud)){
            $this->session->set_flashdata('error','Student not found');
            redirect(base_url().'student/homestudent/index');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('pass','pass','trim|required');
        $this->form_validation->set_rules('newPass','newPass','trim|required');
        $this->form_validation->set_rules('rePass','rePass','trim|required');
        
        if($this->form_validation->run() == TRUE){

            if($stud['password']!=$this->input->post('pass')){
                $this->session->set_flashdata('error','Old password is wrong');
                redirect(base_url().'student/homestudent/changePassword/'.$stud['USN'],$data);
            }
            else{
                $formArray['password']=$this->input->post('newPass');
                $this->StudentDetail_model->changeStudentDetails($id,$formArray);
    
                $this->session->set_flashdata('success','Password Updated Successfully');
                redirect(base_url().'student/homestudent/index',$data);
            }
               
        
            
        }else{
            $this->load->view('student/changePassword',$data);
        }
    }

    // profile ofthe student
    public function profile($id){
        $this->load->model('StudentDetail_model');
        $this->load->model('Department_model');
        $this->load->model('SemClass_model');
        $this->load->model('Family_model');
        $this->load->model('Education_model');
        $this->load->model('Common_model');

        $stud = $this->StudentDetail_model->getStudentDetailByUSN($id);
        $dept = $this->Department_model->getDepartmentById($stud['dept_id']);
        $sem = $this->SemClass_model->getSemById($stud['sem_id']);
        $fam = $this->Family_model->getFamilyDetails($id);
        $edu = $this->Education_model->getEducationDetails($id);
        $country = $this->Common_model->getCountry();
        $state=$this->Common_model->getState($stud['country']);
        $city=$this->Common_model->getCity($stud['state']);


        $this->load->library('form_validation');

        $data['stud']=$stud;
        $data['dept']=$dept;
        $data['sem']=$sem;
        $data['fam']=$fam;
        $data['edu']=$edu;
        $data['country']=$country;
        $data['state']=$state;
        $data['city']=$city;

        if(empty($stud)){
            $this->session->set_flashdata('error','Student not found');
            redirect(base_url().'student/homestudent/index');
        }
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('dob','dob','trim|required');
        $this->form_validation->set_rules('gender','gender','trim|required');
        $this->form_validation->set_rules('country','country','trim|required');
        $this->form_validation->set_rules('state','state','trim|required');
        $this->form_validation->set_rules('city','city','trim|required');
        $this->form_validation->set_rules('blood_group','blood_group','trim|required');
        $this->form_validation->set_rules('ph_no','ph_no','required|exact_length[10]');
        $this->form_validation->set_rules('email_id','email_id','trim|required');
        $this->form_validation->set_rules('address','address','trim|required');

        if($this->form_validation->run() == TRUE){
                $formArray['dob']=$this->input->post('dob');
                $formArray['gender']=$this->input->post('gender');
                $formArray['country']=$this->input->post('country');
                $formArray['state']=$this->input->post('state');
                $formArray['city']=$this->input->post('city');
                $formArray['blood_group']=$this->input->post('blood_group');
                $formArray['phone_no']=$this->input->post('ph_no');
                $formArray['email_id']=$this->input->post('email_id');
                $formArray['address']=$this->input->post('address');

                $this->StudentDetail_model->changeStudentDetails($id,$formArray);
    
                $this->session->set_flashdata('success','Student Deatils Updated Successfully');
                redirect(base_url().'student/homestudent/profile/'.$fam['USN'],$data);
            
        }else{
            $this->load->view('student/profileStudent',$data);

        }
    }

    // to get all the states under country
    public function getState(){
        $id=$this->input->post('country_id');
        $this->load->model('Common_model');
        $state=$this->Common_model->getState($id);
        $data['state']=$state;
        $statesString = $this->load->view('state-select',$data,true);
// this will not load the page again and will return data as a string
        $response['states']=$statesString;
        echo json_encode($response);
    }

    // to get all the states under country
    public function getCity(){
        $id=$this->input->post('state_id');
        $this->load->model('Common_model');
        $city=$this->Common_model->getCity($id);
        $data['city']=$city;
        $cityString = $this->load->view('city-select',$data,true);
// this will not load the page again and will return data as a string
        $response['city']=$cityString;
        echo json_encode($response);
    }

    // course for the student
    public function course($id){
        $this->load->model('StudentDetail_model');
        $this->load->model('Department_model');
        $this->load->model('SemClass_model');
        $this->load->model('Subject_model');


        $stud = $this->StudentDetail_model->getStudentDetailByUSN($id);
        $dept = $this->Department_model->getDepartmentById($stud['dept_id']);
        $sem = $this->SemClass_model->getSemById($stud['sem_id']);
        $sub=$this->Subject_model->getsubjectBySemId($stud['sem_id']);
        $data['stud']=$stud;
        $data['dept']=$dept;
        $data['sub']=$sub;
        $data['sem']=$sem;


        $this->load->view('student/courseStudent',$data);
        
    }
    public function family($id){
        $this->load->model('Family_model');
        $fam = $this->Family_model->getFamilyDetails($id);
        $data['fam']=$fam;
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('f_name','f_name','trim|required');
        $this->form_validation->set_rules('f_occupation','f_occupation','trim|required');
        $this->form_validation->set_rules('f_qualification','f_qualification','trim|required');
        $this->form_validation->set_rules('f_mobile','f_mobile','trim|required|exact_length[10]');
        $this->form_validation->set_rules('f_email','f_email','trim|required');
        $this->form_validation->set_rules('m_name','m_name','trim|required');
        $this->form_validation->set_rules('m_occupation','m_occupation','trim|required');
        $this->form_validation->set_rules('m_qualification','m_qualification','trim|required');
        $this->form_validation->set_rules('m_mobile','m_mobile','trim|required|exact_length[10]');
        $this->form_validation->set_rules('m_email','m_email','trim|required');

        if($this->form_validation->run() == TRUE){
                $formArray['f_name']=$this->input->post('f_name');
                $formArray['f_occupation']=$this->input->post('f_occupation');
                $formArray['f_qualification']=$this->input->post('f_qualification');
                $formArray['f_mobile']=$this->input->post('f_mobile');
                $formArray['f_email']=$this->input->post('f_email');
                $formArray['m_name']=$this->input->post('m_name');
                $formArray['m_occupation']=$this->input->post('m_occupation');
                $formArray['m_qualification']=$this->input->post('m_qualification');
                $formArray['m_mobile']=$this->input->post('m_mobile');
                $formArray['m_email']=$this->input->post('m_email');

                $this->Family_model->updateFamilyDetails($id,$formArray);
    
                $this->session->set_flashdata('success','Family Particulars Updated Successfully');
                redirect(base_url().'student/homestudent/profile/'.$fam['USN'],$data);
            
        }else{
            $this->session->set_flashdata('error','Family Particulars not Updated ');
            redirect(base_url().'student/homestudent/profile/'.$fam['USN'],$data);
        }
    }

    public function imageUpload($id){
        $this->load->model('StudentDetail_model');
        $this->load->helper('common_helper');
        $config['upload_path']          = './public/images/student_images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);
        $stud = $this->StudentDetail_model->getStudentDetailByUSN($id);
        $data['stud']=$stud;
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('image','image','trim|required');
       
            if(!empty($_FILES['image']['name'])){
                if($this->upload->do_upload('image')){
                   // file uploaded successfully
                   $data=$this->upload->data();   
                   resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270);
                   
                   $formArray['image']=$data['file_name'];
                   $formArray['name']=$stud['name'];

                  
                   $this->StudentDetail_model->changeStudentDetails($id,$formArray);

                   if(file_exists('./public/images/student_images/'.$stud['image'])){
                           unlink('./public/images/student_images/'.$stud['image']);
                   }
                   
       
                   $this->session->set_flashdata('success',' Image Updated Successfully');
                   redirect(base_url().'student/homestudent/index',$data);
                }
                else{
                    // got some error while uploading file
                    $error =  $this->upload->display_errors('<p class="invalid-feedback">','</p>');
                    $data['errorImageUpload']=$error;
                    $this->load->view('student/profileStudent',$data);

                }
            }
            else{
                $this->session->set_flashdata('error','Error uploading image ');
                redirect(base_url().'student/homestudent/profile/'.$stud['USN'],$data);
            }
        } 

    public function educationList($id){
        $this->load->model('Education_model');
        $this->load->model('StudentDetail_model');
        $stud = $this->StudentDetail_model->getStudentDetailByUSN($id);

        $edu = $this->Education_model->getEducationDetails($id);
        $data['edu']=$edu;
            
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('qualification','qualification','trim|required');
        $this->form_validation->set_rules('institute','institute','trim|required');
        $this->form_validation->set_rules('year_of_passing','year_of_passing','trim|required');
        $this->form_validation->set_rules('percentage','percentage','trim|required');
            
        if($this->form_validation->run() == TRUE){
            $formArray['qualification']=$this->input->post('qualification');
            $formArray['institute']=$this->input->post('institute');
            $formArray['year_of_passing']=$this->input->post('year_of_passing');
            $formArray['percentage']=$this->input->post('percentage');
            $formArray['USN']=$id;

            foreach($edu as $eduRow){
                if($eduRow['USN']==$formArray['USN'] && $eduRow['qualification']==$formArray['qualification']){
                    $this->session->set_flashdata('error','Class Already exists. Please edit if you want modify the details');
                    redirect(base_url().'student/homestudent/profile/'.$stud['USN'],$data);
                }
            }

            $this->Education_model->insertEducationDetails($formArray);
            $this->session->set_flashdata('success','Education Particulars Added Successfully');
            redirect(base_url().'student/homestudent/profile/'.$stud['USN'],$data);
                
        }else{
            $this->session->set_flashdata('error','Education Particulars not Added ');
            redirect(base_url().'student/homestudent/profile/'.$stud['USN'],$data);
        }
    }
    // This method is to edit the education details of student using id
    public function educationEdit($id){
        $student=$_SESSION['student'];
        $this->load->model('Education_model');
        $this->load->model('StudentDetail_model');
        $stud = $this->StudentDetail_model->getStudentDetailByUSN($student['USN']);

        $edu = $this->Education_model->getEducationDetailsByQuali($id);
        $data['edu']=$edu;
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        // $this->form_validation->set_rules('qualification','qualification','trim|required');
        $this->form_validation->set_rules('institute','institute','trim|required');
        $this->form_validation->set_rules('year_of_passing','year_of_passing','trim|required');
        $this->form_validation->set_rules('percentage','percentage','trim|required');
            
        if($this->form_validation->run() == TRUE){
           
            $formArray['institute']=$this->input->post('institute');
            $formArray['year_of_passing']=$this->input->post('year_of_passing');
            $formArray['percentage']=$this->input->post('percentage');
    
            $this->Education_model->updateEducationDetails($id,$formArray);
            $this->session->set_flashdata('success','Education Particulars Updated Successfully');
            redirect(base_url().'student/homestudent/profile/'.$stud['USN'],$data);
        
            
        }else{
            $this->load->view('student/editEducation',$data);
        }
    }
    // feedback for the student
    public function feedback($id){
        $this->load->model('StudentDetail_model');
        $this->load->model('Department_model');
        $this->load->model('SemClass_model');
        $this->load->model('Subject_model');
        $this->load->model('Feedback_model');
        $stud = $this->StudentDetail_model->getStudentDetailByUSN($id);
        $feed=$this->Feedback_model->getFeedbackByUSN($id);
        $dept = $this->Department_model->getDepartmentById($stud['dept_id']);
        $sem = $this->SemClass_model->getSemById($stud['sem_id']);
        $sub=$this->Subject_model->getsubjectBySemId($stud['sem_id']);
        $data['stud']=$stud;
        $data['dept']=$dept;
        $data['sub']=$sub;
        $data['sem']=$sem;
       
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('points[]','points','trim|required');
        $this->form_validation->set_rules('sub_id[]','sub_id','trim|required');
        
        if($this->form_validation->run() == TRUE){
            $dataFeed=array();

            $subject_ids=$this->input->post('sub_id');
            $point=$this->input->post('points');
           
            for ($i=0; $i<count($subject_ids); $i++) {
                $dataFeed[] = array(
                   'USN' => $stud['USN'],
                   'dept_id'=>$stud['dept_id'],
                   'sem_id'=>$stud['sem_id'],
                   'sub_id' => $subject_ids[$i],
                   'points' => $point[$i],
                   'created_at'=>date('Y-m-d H:i:s')
                );
            }
            $this->Feedback_model->insertFeed($dataFeed);
            $this->session->set_flashdata('success','Feedback Submitted Successfully');
            redirect(base_url().'student/homestudent/index',$data);
        
            
        }else{
             if(!empty($feed)){
                $data['block']=1;
                $this->session->set_flashdata('success','You have already given Feedback please come back next month');
            }
        }
        $this->load->view('student/feedbackStudent',$data);

    }
       
}
?>