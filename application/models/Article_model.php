<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model{

   
    public function getArticles($param=array()){
        if(isset($param['offset']) && isset($param['limit'])){
            $this->db->limit($param['offset'],$param['limit']);
        }
        if(isset($param['q'])){
            $this->db->or_like('author',trim($param['q']));
            $this->db->or_like('title',trim($param['q']));
        }
        $query=$this->db->get('article');
        // echo $this->db->last_query();
        $articles=$query->result_array();
        return $articles;

    }
    public function getArticlesCount($param=array()){
        if(isset($param['offset']) && isset($param['limit'])){
            $this->db->limit($param['offset'],$param['limit']);
        }
        if(isset($param['q'])){
            $this->db->or_like('author',trim($param['q']));
            $this->db->or_like('title',trim($param['q']));

        }
        if(isset($param['category_id'])){
            $this->db->where('category',$param['category_id']);
        }
        $res=$this->db->count_all_results('article');
        // echo $this->db->last_query();

        return $res;
        
    }
    public function getArticlesById($id){
        $this->db->select('article.*, categories.name as category_name');
        $this->db->where('article.id',$id);
        $this->db->join('categories','categories.id=article.category','left');
        $res=$this->db->get('article')->row_array();
        return $res;
        
    }
    
    public function addArticle($formArray){
        $this->db->insert('article',$formArray);
        return $this->db->insert_id();
    }
    public function updateArticle($id,$formArray){
        $this->db->where('id',$id);
        $this->db->update('article',$formArray);        
    }
    public function deleteArticle($id){
        $this->db->where('id',$id);
       $this->db->delete('article');
       
    }
//    Front end
    public function getArticlesFront($param=array()){
        if(isset($param['offset']) && isset($param['limit'])){
            $this->db->limit($param['offset'],$param['limit']);
        }
        if(isset($param['q'])){
            $this->db->or_like('author',trim($param['q']));
            $this->db->or_like('title',trim($param['q']));
        }
        $this->db->select('article.*, categories.name as category_name');
        $this->db->where('article.status',1);
        if(isset($param['category_id'])){
            $this->db->where('category',$param['category_id']);
        }
        $this->db->order_by('article.created_at','DESC');
        $this->db->join('categories','categories.id=article.category','left');
        $query=$this->db->get('article');
        // echo $this->db->last_query();
        $articles=$query->result_array();
        return $articles;

    }
}

?>