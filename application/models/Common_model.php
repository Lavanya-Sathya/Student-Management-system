<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model{
    public function getCountry(){
        $countries = $this->db->get('country')->result_array();
        return $countries;
    }
    // return state based on country id
    public function getState($id){
        $this->db->where('country_id',$id);
        $states = $this->db->get('state')->result_array();
        return $states;
    }
    // return city based on state id
    public function getCity($id){
        $this->db->where('state_id',$id);
        $city = $this->db->get('city')->result_array();
        return $city;
    }

}

?>