<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_m extends CI_Model {

    public function get($id=null){
        $this->db->from('mst_barang');
        if($id != null){
            $this->db->where('id', $id);
        } 
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['kode_barang'] = $post['kode_barang'];
        $params['nama_barang'] = $post['nama_barang'];
        $params['satuan'] = $post['satuan'];
        $params['jenis'] = $post['jenis'];
        $params['cd'] = date('Y-m-d H:i:s');
        $params['cd_usr'] = $this->fungsi->user_login()->id;
        
        $this->db->insert('mst_barang', $params);
    }

    public function edit($post){
        $params['kode_barang'] = $post['kode_barang'];
        $params['nama_barang'] = $post['nama_barang'];
        $params['satuan'] = $post['satuan'];
        $params['jenis'] = $post['jenis'];
        $params['ud'] = date('Y-m-d H:i:s');
        $params['ud_usr'] = $this->fungsi->user_login()->id;
        $this->db->where('id', $post['id']);
        $this->db->update('mst_barang', $params);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_barang');
    }
}
