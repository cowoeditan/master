<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_kelamin_m extends CI_Model {

    public function get($id=null){
        $this->db->from('mst_jenis_kelamin');
        if($id != null){
            $this->db->where('id', $id);
        } 
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }
}
