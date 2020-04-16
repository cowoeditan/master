<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sarana_m extends CI_Model {

    public function get($id=null){
        $this->db->from('mst_sarana');
        if($id != null){
            $this->db->where('id', $id);
        } 
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['nama_sarana'] = $post['nama_sarana'];
        $params['alamat'] = $post['alamat'];
        $params['no_izin'] = $post['no_izin'];
        $this->db->insert('mst_sarana', $params);
    }

    public function edit($post){
        $params['nama_sarana'] = $post['nama_sarana'];
        $params['alamat'] = $post['alamat'];
        $params['no_izin'] = $post['no_izin'];
        $this->db->where('id', $post['id']);
        $this->db->update('mst_sarana', $params);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_sarana');
    }
}
