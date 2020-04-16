<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_m extends CI_Model {

    public function get($id=null){
        $this->db->select('
            id,
            no_rekamedis,
            nama_pasien,
            panggilan,
            YEAR(curdate()) - YEAR(tgl_lahir) AS usia,
            jenis_kelamin,
            riwayat_alergi,
            golongan_darah,
            no_telp,
            alamat,
            pekerjaan,
            DATE_FORMAT(tgl_lahir, "%d %M %Y") as tgl_lahir,
            golongan_darah,
            riwayat_alergi,
            nama_penjamin,
            alamat_penjamin,
            no_telp_penjamin,
            pekerjaan_penjamin
        ');
        $this->db->from('mst_pasien');
        if($id != null){
            $this->db->where('id', $id);
        } 
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['no_rekamedis'] = $post['no_rekamedis'];
        $params['nama_pasien'] = $post['nama_pasien'];
        $params['panggilan'] = $post['panggilan'];
        $params['golongan_darah'] = $post['golongan_darah'];
        $params['riwayat_alergi'] = $post['riwayat_alergi'];
        $params['jenis_kelamin'] = $post['jenis_kelamin'];
        $params['tgl_lahir'] = $post['tgl_lahir'];
        $params['alamat'] = $post['alamat'];
        $params['pekerjaan'] = $post['pekerjaan'];
        $params['no_telp'] = $post['no_telp'];
        $params['nama_penjamin'] = $post['nama_penjamin'];
        $params['pekerjaan_penjamin'] = $post['pekerjaan_penjamin'];
        $params['no_telp_penjamin'] = $post['no_telp_penjamin'];
        $params['alamat_penjamin'] = $post['alamat_penjamin'];
        $params['cd'] = date('Y-m-d H:i:s');
        $params['cd_usr'] = $this->fungsi->user_login()->id;
        
        $this->db->insert('mst_pasien', $params);
    }

    public function edit($post){
        // $params['no_rekamedis'] = $post['no_rekamedis'];
        $params['nama_pasien'] = $post['nama_pasien'];
        $params['panggilan'] = $post['panggilan'];
        $params['golongan_darah'] = $post['golongan_darah'];
        $params['riwayat_alergi'] = $post['riwayat_alergi'];
        $params['jenis_kelamin'] = $post['jenis_kelamin'];
        $params['tgl_lahir'] = $post['tgl_lahir'];
        $params['alamat'] = $post['alamat'];
        $params['pekerjaan'] = $post['pekerjaan'];
        $params['no_telp'] = $post['no_telp'];
        $params['nama_penjamin'] = $post['nama_penjamin'];
        $params['pekerjaan_penjamin'] = $post['pekerjaan_penjamin'];
        $params['no_telp_penjamin'] = $post['no_telp_penjamin'];
        $params['alamat_penjamin'] = $post['alamat_penjamin'];
        $params['ud'] = date('Y-m-d H:i:s');
        $params['ud_usr'] = $this->fungsi->user_login()->id;
        $this->db->where('id', $post['id']);
        $this->db->update('mst_pasien', $params);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_pasien');
    }

    function get_no(){
        $q = $this->db->query("SELECT MAX(RIGHT(no_rekamedis,4)) AS kd_max FROM mst_pasien WHERE DATE(cd)=CURDATE()");
        $kd = "";
        $nm = "RM";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $nm.date('dmy').'-'.$kd;
    }
}
