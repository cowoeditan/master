<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_data_pasien_m extends CI_Model {
    public function get($id=null){
        $this->db->select('
        tbl_pasien.*,  
        DATE_FORMAT(tbl_pasien.tgl_daftar, "%d %M %Y") as tgl_daftar,
        mst_pasien.nama_pasien, 
        mst_pasien.no_rekamedis, 
        mst_pasien.jenis_kelamin, 
        mst_pasien.id as id_pasien, 
        mst_pasien.riwayat_alergi, 
        mst_pasien.panggilan, 
        mst_poliklinik.nama_poliklinik,
        user.name,
        YEAR(curdate()) - YEAR(mst_pasien.tgl_lahir) AS usia,
        mst_pembayaran.nama_pembayaran,
        ');
        $this->db->from('tbl_pasien');
        $this->db->join('mst_pembayaran', 'mst_pembayaran.id = tbl_pasien.id_pembayaran', 'left');
        $this->db->join('mst_pasien', 'mst_pasien.id = tbl_pasien.id_pasien', 'left');
        $this->db->join('mst_poliklinik', 'mst_poliklinik.id = tbl_pasien.id_poliklinik', 'left');
        $this->db->join('user', 'user.id = tbl_pasien.id_dokter', 'left');
        $this->db->where_in('tbl_pasien.status', [7]);
        // $this->db->where('tbl_pasien.id_poliklinik', $id_poliklinik);
        if($id != null){
            $this->db->where('tbl_pasien.id', $id);
        } 
        $this->db->order_by("tbl_pasien.id", "desc");
        $query = $this->db->get();
        return $query;
    }

}