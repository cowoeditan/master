<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor_m extends CI_Model {

    public function get($id=null){
        $this->db->from('mst_distributor');
        if($id != null){
            $this->db->where('id', $id);
        } 
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['kode_distributor'] = $post['kode_distributor'];
        $params['nama_distributor'] = $post['nama_distributor'];
        $params['alamat'] = $post['alamat'];
        $params['telp'] = $post['telp'];
        $params['bank'] = $post['bank'];
        $params['nomor_rekening'] = $post['nomor_rekening'];
        $params['cd'] = date('Y-m-d H:i:s');
        $params['cd_usr'] = $this->fungsi->user_login()->id;
        
        $this->db->insert('mst_distributor', $params);
    }

    public function edit($post){
        $params['kode_distributor'] = $post['kode_distributor'];
        $params['nama_distributor'] = $post['nama_distributor'];
        $params['alamat'] = $post['alamat'];
        $params['telp'] = $post['telp'];
        $params['bank'] = $post['bank'];
        $params['nomor_rekening'] = $post['nomor_rekening'];
        $params['ud'] = date('Y-m-d H:i:s');
        $params['ud_usr'] = $this->fungsi->user_login()->id;
        $this->db->where('id', $post['id']);
        $this->db->update('mst_distributor', $params);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_distributor');
    }
}
