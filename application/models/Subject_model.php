<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends CI_Model{
   
    public function getsubjectBySemId($id){
        $this->db->where('sem_id',$id);
        $res=$this->db->get('subject')->result_array();
        return $res;
    }
   
    public function getSubjectById($id){
       $this->db->where('subject_id',$id);
       $res=$this->db->get('subject')->row_array();
       return $res;
        
    }
    // To check whether subject code is already exist or not
    public function getSubjectCode($id){
        $this->db->where('subject_code',$id);
        $res=$this->db->get('subject')->row_array();
        return $res;
    }
    
    public function addSubject($formArray){
        $this->db->insert('subject',$formArray);
        return $this->db->insert_id();
    }

    public function updateSubject($id,$formArray){
        $this->db->where('subject_id',$id);
        $this->db->update('subject',$formArray);        
    }

    public function deleteSubject($id){
        $this->db->where('subject_id',$id);
        $this->db->delete('subject');
    }
    
    public function deleteSubjectDept($id){
        $this->db->where('d_id',$id);
        $this->db->delete('subject');
    }

    public function deleteSubjectSem($id){
        $this->db->where('sem_id',$id);
        $this->db->delete('subject');
    }

}

?>