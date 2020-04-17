<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_masuk_apotek_m extends CI_Model {
    public function get($id=null){
        // $id_poliklinik = $this->fungsi->user_login()->id_poliklinik;
        $this->db->select('
        tbl_pasien.*,  
        mst_pasien.nama_pasien, 
        mst_pasien.no_rekamedis, 
        mst_pasien.jenis_kelamin, 
        mst_pasien.id as id_pasien, 
        mst_pasien.riwayat_alergi, 
        mst_pasien.panggilan, 
        YEAR(curdate()) - YEAR(mst_pasien.tgl_lahir) AS usia,
        mst_pembayaran.nama_pembayaran,
        ');
        $this->db->from('tbl_pasien');
        $this->db->join('mst_pembayaran', 'mst_pembayaran.id = tbl_pasien.id_pembayaran', 'left');
        $this->db->join('mst_pasien', 'mst_pasien.id = tbl_pasien.id_pasien', 'left');
        $this->db->where_in('tbl_pasien.status', [3,5]);
        // $this->db->where('tbl_pasien.id_poliklinik', $id_poliklinik);
        if($id != null){
            $this->db->where('tbl_pasien.id', $id);
        } 
        $this->db->order_by("tbl_pasien.id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function obat($id=null){
        $this->db->select('
        riwayat_pemberian_obat_pasien.id,  
        riwayat_pemberian_obat_pasien.id_pasien,  
        riwayat_pemberian_obat_pasien.id_obat,  
        riwayat_pemberian_obat_pasien.jumlah,  
        riwayat_pemberian_obat_pasien.biaya,  
        mst_obat.nama_obat,
        ');
        $this->db->from('riwayat_pemberian_obat_pasien');
        $this->db->join('mst_obat', 'mst_obat.id = riwayat_pemberian_obat_pasien.id_obat', 'left');
        $this->db->where('riwayat_pemberian_obat_pasien.id_pasien', $id);
        $this->db->order_by("riwayat_pemberian_obat_pasien.id", "desc");
        $query = $this->db->get();
        return $query;
    }
    
    public function racikan($id=null){
        $this->db->select('
        riwayat_pemberian_racikan_pasien.id,  
        riwayat_pemberian_racikan_pasien.id_pasien,  
        riwayat_pemberian_racikan_pasien.id_obat,  
        riwayat_pemberian_racikan_pasien.jumlah,  
        riwayat_pemberian_racikan_pasien.biaya,  
        mst_obat.nama_obat,
        ');
        $this->db->from('riwayat_pemberian_racikan_pasien');
        $this->db->join('mst_obat', 'mst_obat.id = riwayat_pemberian_racikan_pasien.id_obat', 'left');
        $this->db->where('riwayat_pemberian_racikan_pasien.id_pasien', $id);
        $this->db->order_by("riwayat_pemberian_racikan_pasien.id", "desc");
        $query = $this->db->get();
        return $query;
    }
    
    public function alat($id=null){
        $this->db->select('
        riwayat_pemberian_alat_pasien.id,  
        riwayat_pemberian_alat_pasien.id_pasien,  
        riwayat_pemberian_alat_pasien.id_barang,  
        riwayat_pemberian_alat_pasien.jumlah,  
        riwayat_pemberian_alat_pasien.biaya,  
        mst_barang.nama_barang,
        ');
        $this->db->from('riwayat_pemberian_alat_pasien');
        $this->db->join('mst_barang', 'mst_barang.id = riwayat_pemberian_alat_pasien.id_barang', 'left');
        $this->db->where('riwayat_pemberian_alat_pasien.id_pasien', $id);
        $this->db->order_by("riwayat_pemberian_alat_pasien.id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function get_nama_pasien_soap($id=null){
      
        $query = $this->db->query(
            "SELECT 
                tbl_pasien.id as id_pasien,
                DATE_FORMAT(tbl_pasien.tgl_daftar, '%d %M %Y') as daftar,
                mst_pasien.no_rekamedis, 
                mst_pasien.nama_pasien 
            from tbl_pasien 
            left join mst_pasien on mst_pasien.id = tbl_pasien.id_pasien 
            where tbl_pasien.id = '$id' limit 1");
        return $query;
    }

    public function send($id){
        $params['status'] = 4;
        $this->db->where('id', $id);
        $this->db->update('tbl_pasien', $params);
    }
}