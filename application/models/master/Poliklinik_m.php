<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poliklinik_m extends CI_Model {

    public function get($id=null){
        $this->db->from('mst_poliklinik');
        if($id != null){
            $this->db->where('id', $id);
        } 
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['kode_poliklinik'] = $post['kode_poliklinik'];
        $params['nama_poliklinik'] = $post['nama_poliklinik'];
        $params['cd'] = date('Y-m-d H:i:s');
        $params['cd_usr'] = $this->fungsi->user_login()->id;
        
        $this->db->insert('mst_poliklinik', $params);
    }

    public function edit($post){
        $params['kode_poliklinik'] = $post['kode_poliklinik'];
        $params['nama_poliklinik'] = $post['nama_poliklinik'];
        $params['ud'] = date('Y-m-d H:i:s');
        $params['ud_usr'] = $this->fungsi->user_login()->id;
        $this->db->where('id', $post['id']);
        $this->db->update('mst_poliklinik', $params);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_poliklinik');
    }
}
