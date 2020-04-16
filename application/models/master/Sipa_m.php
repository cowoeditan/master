<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sipa_m extends CI_Model {

    public function get($id=null){
        $this->db->from('mst_sipa');
        if($id != null){
            $this->db->where('id', $id);
        } 
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['nama_petugas'] = $post['nama_petugas'];
        $params['alamat'] = $post['alamat'];
        $params['sip'] = $post['sip'];
        $params['jabatan'] = $post['jabatan'];
        $this->db->insert('mst_sipa', $params);
    }

    public function edit($post){
        $params['nama_petugas'] = $post['nama_petugas'];
        $params['alamat'] = $post['alamat'];
        $params['sip'] = $post['sip'];
        $params['jabatan'] = $post['jabatan'];
        $this->db->where('id', $post['id']);
        $this->db->update('mst_sipa', $params);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_sipa');
    }
}
