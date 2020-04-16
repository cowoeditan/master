<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pbf_m extends CI_Model {

    public function get($id=null){
        $this->db->from('mst_pbf');
        if($id != null){
            $this->db->where('id', $id);
        } 
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['kode_pbf'] = $post['kode_pbf'];
        $params['nama_pbf'] = $post['nama_pbf'];
        $params['cd'] = date('Y-m-d H:i:s');
        $params['cd_usr'] = $this->fungsi->user_login()->id;
        
        $this->db->insert('mst_pbf', $params);
    }

    public function edit($post){
        $params['kode_pbf'] = $post['kode_pbf'];
        $params['nama_pbf'] = $post['nama_pbf'];
        $params['ud'] = date('Y-m-d H:i:s');
        $params['ud_usr'] = $this->fungsi->user_login()->id;
        $this->db->where('id', $post['id']);
        $this->db->update('mst_pbf', $params);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_pbf');
    }
}
