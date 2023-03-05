<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Family_model extends CI_Model{

   public function getFamilyDetails($id){
    $this->db->where('USN',$id);
    $res = $this->db->get('family')->row_array();
    return $res;
   }

   public function insertFamilyDetails($formFam){
    $this->db->insert('family',$formFam);
    return $this->db->insert_id();
   }

   public function updateFamilyDetails($id,$formFam){
    $this->db->where('USN',$id);
    $this->db->update('family',$formFam);
   }

}
?>