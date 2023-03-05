<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Feedback_model extends CI_Model{

    //To insert the feedback
   public function insertFeed($formArray){
     $this->db->insert_batch('feedback',$formArray);
     // return $this->db->insert_id();
    }

    // To get count of student given feedback and also average of points subject wise
    public function getFeedback($param){
      $this->db->where('dept_id',$param['queryString']);
      $this->db->where('sem_id',$param['sem']);
      $this->db->select('id,USN,sub_id,created_at, count(distinct(USN)) as countPoints');
      $this->db->select_avg('points','points_avg');
      $this->db->group_by('sub_id');
      $this->db->distinct('USN');
      $res=$this->db->get('feedback')->result_array();
     
      return $res;
    }

    // To get distinct USN and to check and display whether given feedback or not 
    public function getFeedbackDistinctUsn($param){
      $this->db->where('dept_id',$param['queryString']);
      $this->db->where('sem_id',$param['sem']);
      $this->db->distinct('USN');
      $this->db->group_by('USN');
      $this->db->select('USN');
      $res=$this->db->get('feedback')->row_array();
      return $res;
    }

    // get feedback by usn
    public function getFeedbackByUSN($id){
      $this->db->where('USN',$id);
      $this->db->group_by('USN');
      $res = $this->db->get('feedback')->row_array();
      return $res;
    }
 
    
    public function deleteFeedback($id){
    // delete feedback by subject id
      $this->db->where('sub_id',$id);
      $this->db->delete('feedback');
    }
}
?>