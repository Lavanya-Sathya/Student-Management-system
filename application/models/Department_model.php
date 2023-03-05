<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model{

   
    public function getDepartment($params=[]){
       
        if(!empty($params['queryString'])){
            $this->db->like('d_name',$params['queryString']);

        }
        $res=$this->db->get('department')->result_array();
        return $res;
    }
   
    public function getDepartmentById($id){
       $this->db->where('d_id',$id);
       $res=$this->db->get('department')->row_array();
       return $res;
        
    }
    
    public function addDepartment($formArray){
        $this->db->insert('department',$formArray);
        return $this->db->insert_id();
    }
    public function updateDepartment($id,$formArray){
        $this->db->where('d_id',$id);
        $this->db->update('department',$formArray);        
    }
    public function deleteDepartment($id){
        $this->db->where('d_id',$id);
       $this->db->delete('department');
       
    }

}

?>