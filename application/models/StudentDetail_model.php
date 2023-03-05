<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentDetail_model extends CI_Model{
    // this is used for student login using usn
    public function getStudentDetailByUSN($id){
        $this->db->where('USN',$id);
        $res = $this->db->get('student_detail')->row_array();
        return $res;
    }

    // get student based on combination of semid and DeptId for student profile display
    public function getStudentAllStudents($params=[]){
        if(!empty($params['queryString'])){
            $this->db->where('dept_id',$params['queryString']);
            $this->db->where('sem_id',$params['sem']);

        }
          
        $res = $this->db->get('student_detail')->result_array();
        return $res;
    }

     // this is used for student  using sem_id
     public function getStudentDetailBySem($id){
        $this->db->where('sem_id',$id);
        $res = $this->db->get('student_detail')->result_array();
        return $res;
    }

    // this method is used for insert
    public function insertStudentDetail($formArray){
        $this->db->insert('student_detail',$formArray);
        return $this->db->insert_id();

    }
    

    // update student details
    public function changeStudentDetails($id,$formArray){
        $this->db->where('USN',$id);
        $this->db->update('student_detail',$formArray);    
    }

}
?>