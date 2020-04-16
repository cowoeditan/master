<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asuransi_m extends CI_Model {

    public function get($id=null){
        $this->db->from('mst_asuransi');
        if($id != null){
            $this->db->where('id', $id);
        } 
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['nama_asuransi'] = $post['nama_asuransi'];
        $params['cd'] = date('Y-m-d H:i:s');
        $params['cd_usr'] = $this->fungsi->user_login()->id;
        
        $this->db->insert('mst_asuransi', $params);
    }

    public function edit($post){
        $params['nama_asuransi'] = $post['nama_asuransi'];
        $params['ud'] = date('Y-m-d H:i:s');
        $params['ud_usr'] = $this->fungsi->user_login()->id;
        $this->db->where('id', $post['id']);
        $this->db->update('mst_asuransi', $params);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_asuransi');
    }
}
