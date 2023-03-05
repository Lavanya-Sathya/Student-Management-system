<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model{

    public function createCategory($formArray){
        $this->db->insert('categories',$formArray);
        // echo $this->db->last_query();
    }

    public function getCategories($params=[]){
        if(!empty($params['queryString'])){
            $this->db->like('name',$params['queryString']);

        }
        $res=$this->db->get('categories')->result_array();
        return $res;
    }

    public function getCategory($id){
        $this->db->where('id',$id);
        $res=$this->db->get('categories')->row_array();
        return $res;

    }
    public function updateCategory($id,$formArray){
        $this->db->where('id',$id);
        $this->db->update('categories',$formArray);

    }
    public function deleteCategory($id){
        $this->db->where('id',$id);
        $this->db->delete('categories');

    }
    public function getCategoriesFront(){
        $this->db->where('categories.status',1);
        $res=$this->db->get('categories')->result_array();
        return $res;
    }
}
?>