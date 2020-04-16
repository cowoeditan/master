<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_masuk_m extends CI_Model {

    public function get($id=null){
        $this->db->select('
        tbl_pasien.id, 
        DATE_FORMAT(tbl_pasien.tgl_daftar, "%d %M %Y") as tgl_daftar,
        tbl_pasien.no_regis, 
        tbl_pasien.status, 
        mst_pasien.nama_pasien, 
        mst_pasien.id as id_pasien, 
        mst_pasien.panggilan, 
        YEAR(curdate()) - YEAR(mst_pasien.tgl_lahir) AS usia,
        mst_poliklinik.id as id_poliklinik, 
        mst_poliklinik.nama_poliklinik, 
        mst_pembayaran.id as id_pembayaran, 
        mst_pembayaran.nama_pembayaran,
        user.name as nama_dokter
        ');
        $this->db->from('tbl_pasien');
        $this->db->join('mst_poliklinik', 'mst_poliklinik.id = tbl_pasien.id_poliklinik', 'left');
        $this->db->join('mst_pembayaran', 'mst_pembayaran.id = tbl_pasien.id_pembayaran', 'left');
        $this->db->join('mst_pasien', 'mst_pasien.id = tbl_pasien.id_pasien', 'left');
        $this->db->join('user', 'user.id = tbl_pasien.id_dokter', 'left');
        $this->db->where_in('tbl_pasien.status', [2,1]);
        if($id != null){
            $this->db->where('tbl_pasien.id', $id);
        } 
        $this->db->order_by("tbl_pasien.id", "desc");
        $query = $this->db->get();
        return $query;
    }

    function get_dokter_poli($id_poliklinik){
		$query = $this->db->get_where('user', array('id_poliklinik' => $id_poliklinik));
		return $query;
	}

    public function add($post){
        $params['no_regis'] = $post['no_regis'];
        $params['id_pasien'] = $post['id_pasien'];
        $params['id_pembayaran'] = $post['id_pembayaran'];
        $params['id_poliklinik'] = $post['id_poliklinik'];
        $params['id_dokter'] = $post['id_dokter'];
        $params['tgl_daftar'] = $post['tgl_daftar'];
        $params['status'] = 2;
        $params['cd'] = date('Y-m-d H:i:s');
        $params['cd_usr'] = $this->fungsi->user_login()->id;
        
        $this->db->insert('tbl_pasien', $params);
    }

    public function edit($post){
        // $params['no_regis'] = $post['no_regis'];
        $params['id_pasien'] = $post['id_pasien'];
        $params['id_pembayaran'] = $post['id_pembayaran'];
        $params['id_poliklinik'] = $post['id_poliklinik'];
        $params['id_dokter'] = $post['id_dokter'];
        $params['tgl_daftar'] = $post['tgl_daftar'];
        $params['status'] = 2;
        $params['ud'] = date('Y-m-d H:i:s');
        $params['ud_usr'] = $this->fungsi->user_login()->id;
        $this->db->where('id', $post['id']);
        $this->db->update('tbl_pasien', $params);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_pasien');
    }

    public function send($id){
        $params['status'] = 2;
        $this->db->where('id', $id);
        $this->db->update('tbl_pasien', $params);
    }

    function get_no(){
        $q = $this->db->query("SELECT MAX(RIGHT(no_regis,4)) AS kd_max FROM tbl_pasien WHERE DATE(tgl_daftar)=CURDATE()");
        $kd = "";
        $nm = "PEN";
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
