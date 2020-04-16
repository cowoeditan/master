<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan_m extends CI_Model {

    public function get($id=null){
        $this->db->select('mst_tindakan.*, mst_poliklinik.id as id_poliklinik, mst_poliklinik.nama_poliklinik');
        $this->db->from('mst_tindakan');
        $this->db->join('mst_poliklinik', 'mst_poliklinik.id = mst_tindakan.id_poliklinik', 'left');
        if($id != null){
            $this->db->where('mst_tindakan.id', $id);
        } 
        $this->db->order_by("mst_tindakan.id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['kode_tindakan'] = $post['kode_tindakan'];
        $params['nama_tindakan'] = $post['nama_tindakan'];
        $params['harga'] = $post['harga'];
        $params['id_poliklinik'] = $post['id_poliklinik'];
        $params['cd'] = date('Y-m-d H:i:s');
        $params['cd_usr'] = $this->fungsi->user_login()->id;
        
        $this->db->insert('mst_tindakan', $params);
    }

    public function edit($post){
        $params['kode_tindakan'] = $post['kode_tindakan'];
        $params['nama_tindakan'] = $post['nama_tindakan'];
        $params['harga'] = $post['harga'];
        $params['id_poliklinik'] = $post['id_poliklinik'];
        $params['ud'] = date('Y-m-d H:i:s');
        $params['ud_usr'] = $this->fungsi->user_login()->id;
        $this->db->where('id', $post['id']);
        $this->db->update('mst_tindakan', $params);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_tindakan');
    }
}
