<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Admin_model extends CI_Model{

    public function getByUsername($username){
        $admin = $this->db->where('username',$username)
                 ->get('admins')->row_array();
        return $admin;

    }
}
?>