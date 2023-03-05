<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SemClass_model extends CI_Model{

   
    public function getSem($params=[]){
        if(!empty($params['queryString'])){
            $this->db->like('d_no',$params['queryString']);
        }
        $res=$this->db->get('sem')->result_array();
        return $res;
    }
    public function getSemByDeptId($id){
        $this->db->where('d_no',$id);
        $res=$this->db->get('sem')->result_array();
        return $res;
         
     }
   
    public function getSemById($id){
       $this->db->where('sem_id',$id);
       $res=$this->db->get('sem')->row_array();
       return $res;
        
    }

    public function getSection($id){
        $this->db->where('section',$id);
        $res=$this->db->get('sem')->row_array();
        return $res;
    }
    
    public function addSem($formArray){
        $this->db->insert('sem',$formArray);
        return $this->db->insert_id();
    }
    public function updateSem($id,$formArray){
        $this->db->where('sem_id',$id);
        $this->db->update('sem',$formArray);        
    }
    public function deleteSem($id){
        $this->db->where('sem_id',$id);
       $this->db->delete('sem');
       
    }
    public function deleteSemDept($id){
        $this->db->where('d_no',$id);
        $this->db->delete('sem');
    }

}

?>