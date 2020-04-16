<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal_m extends CI_Model {

    public function get($id=null){
        $this->db->from('mst_principal');
        if($id != null){
            $this->db->where('id', $id);
        } 
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['kode_principal'] = $post['kode_principal'];
        $params['nama_principal'] = $post['nama_principal'];
        $params['cd'] = date('Y-m-d H:i:s');
        $params['cd_usr'] = $this->fungsi->user_login()->id;
        
        $this->db->insert('mst_principal', $params);
    }

    public function edit($post){
        $params['kode_principal'] = $post['kode_principal'];
        $params['nama_principal'] = $post['nama_principal'];
        $params['ud'] = date('Y-m-d H:i:s');
        $params['ud_usr'] = $this->fungsi->user_login()->id;
        $this->db->where('id', $post['id']);
        $this->db->update('mst_principal', $params);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_principal');
    }
}
