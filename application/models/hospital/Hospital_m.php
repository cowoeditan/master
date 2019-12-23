<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital_m extends CI_Model {

  

    public function get($id=null){
        $this->db->from('tbl_hospital');
        if($id != null){
            $this->db->where('id_hospital', $id);
        } 
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['nama'] = $post['nama'];
        $params['alamat'] = $post['alamat'];
        $params['no_telp'] = $post['no_telp'];
        $params['emergency_contact'] = $post['emergency_contact'];
        $params['image_hospital'] = $post['image_hospital'];
        $params['keterangan'] = $post['keterangan'];
        $this->db->insert('tbl_hospital', $params);
    }

    public function edit($post){
        $params['nama'] = $post['nama'];
        $params['alamat'] = $post['alamat'];
        $params['no_telp'] = $post['no_telp'];
        $params['emergency_contact'] = $post['emergency_contact'];
        $params['keterangan'] = $post['keterangan'];
        if($post['image_hospital'] != null){
            $params['image_hospital'] = $post['image_hospital'];
        }
        $this->db->where('id_hospital', $post['id_hospital']);
        $this->db->update('tbl_hospital', $params);
    }

    public function del($id){
        $this->db->where('id_hospital', $id);
        $this->db->delete('tbl_hospital');
    }
}
