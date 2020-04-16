<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panggilan_m extends CI_Model {

    public function get($id=null){
        $this->db->from('mst_panggilan');
        if($id != null){
            $this->db->where('id', $id);
        } 
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }
}
