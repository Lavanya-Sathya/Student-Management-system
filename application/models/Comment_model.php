<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model{

    public function create($formArray){
        $this->db->insert('comment',$formArray);
    }
    public function getComments($id,$status=null){
        $this->db->where('article_id',$id);
        if($status == true){
            $this->db->where('status',1);
        }
        $this->db->order_by('created_at','DESC');
        $res=$this->db->get('comment')->result_array();
        // echo $this->db->last_query();
        return $res;

    }

}

?>