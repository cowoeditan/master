<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_m extends CI_Model {

    public function get($id=null){
        $this->db->select('mst_obat.*, mst_pbf.id as id_pbf, mst_pbf.nama_pbf, mst_principal.id as id_principal, mst_principal.nama_principal');
        $this->db->from('mst_obat');
        $this->db->join('mst_pbf', 'mst_pbf.id = mst_obat.id_pbf', 'left');
        $this->db->join('mst_principal', 'mst_principal.id = mst_obat.id_principal', 'left');
        if($id != null){
            $this->db->where('mst_obat.id', $id);
        } 
        $this->db->order_by("mst_obat.id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['kode_obat'] = $post['kode_obat'];
        $params['nama_obat'] = $post['nama_obat'];
        $params['satuan'] = $post['satuan'];
        $params['sediaan'] = $post['sediaan'];
        $params['id_pbf'] = $post['id_pbf'];
        $params['id_principal'] = $post['id_principal'];
        $params['komposisi'] = $post['komposisi'];
        $params['jenis'] = $post['jenis'];
        $params['cd'] = date('Y-m-d H:i:s');
        $params['cd_usr'] = $this->fungsi->user_login()->id;
        
        $this->db->insert('mst_obat', $params);
    }

    public function edit($post){
        $params['kode_obat'] = $post['kode_obat'];
        $params['nama_obat'] = $post['nama_obat'];
        $params['satuan'] = $post['satuan'];
        $params['sediaan'] = $post['sediaan'];
        $params['id_pbf'] = $post['id_pbf'];
        $params['id_principal'] = $post['id_principal'];
        $params['komposisi'] = $post['komposisi'];
        $params['jenis'] = $post['jenis'];
        $params['ud'] = date('Y-m-d H:i:s');
        $params['ud_usr'] = $this->fungsi->user_login()->id;
        $this->db->where('id', $post['id']);
        $this->db->update('mst_obat', $params);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_obat');
    }
}
