<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice_model extends CI_Model{

    // insert the comment
    public function addNotice($formArray){
        $this->db->insert('admin_notice',$formArray);
        return $this->db->insert_id();
    }

    // get the result by USN
    public function getNotice($param){
        if($param['status']==1){
            $this->db->or_where('dept_id',$param['dept_id']);
            $this->db->or_where('sem_id',$param['sem_id']);
            $this->db->or_where('USN',$param['USN']);
            $this->db->order_by('created_at','DESC');
            $res = $this->db->get('admin_notice')->result_array();
            return $res;
        }
        else{
            $this->db->or_where('USN',$param['USN']);
            $this->db->order_by('created_at','DESC');
            $res = $this->db->get('admin_notice')->result_array();
            return $res;
        }
        
    }

    // get all the notice
    public function getNoticeAll(){
        $this->db->order_by('created_at','DESC');
        $res = $this->db->get('admin_notice')->result_array();
        return $res;
    }

    // to get the comment by id
    public function getNoticeById($id){
        $this->db->where('id',$id);
        $res = $this->db->get('admin_notice')->row_array();
        return $res;
    }
    // to delete the notice by id
    public function deleteNotice($id){
        $this->db->where('id',$id);
        $this->db->delete('admin_notice');
       
    }

}

?>