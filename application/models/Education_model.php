<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Education_model extends CI_Model{

    // get education details of student by USN
   public function getEducationDetails($id){
    $this->db->where('USN',$id);
    $res = $this->db->get('education')->result_array();
    return $res;
   }

    //get details by id
   public function getEducationDetailsByQuali($id){
        $this->db->where('id',$id);
        $res = $this->db->get('education')->row_array();
        return $res;
   }

    //    Insert the education details for a student
   public function insertEducationDetails($formArray){
    $this->db->insert('education',$formArray);
    return $this->db->insert_id();
   }

    //    Update the  details
   public function updateEducationDetails($id,$formArray){
    $this->db->where('id',$id);
    $this->db->update('education',$formArray);
   }

   public function insertFeed($formArray){
     $this->db->insert_batch('feedback',$formArray);
     // return $this->db->insert_id();
    }


}
?>