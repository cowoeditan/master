<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_masuk_poli_m extends CI_Model {

    public function get($id=null){
        $id_poliklinik = $this->fungsi->user_login()->id_poliklinik;
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
        $this->db->where_in('tbl_pasien.status', [2]);
        $this->db->where('tbl_pasien.id_poliklinik', $id_poliklinik);
        if($id != null){
            $this->db->where('tbl_pasien.id', $id);
        } 
        $this->db->order_by("tbl_pasien.id", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function get_soap_rekamedis($id=null){
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
        if($id != null){
            $this->db->where('tbl_pasien.id', $id);
        } 
        $this->db->order_by("tbl_pasien.id", "desc");
        $query = $this->db->get();
        return $query;
    }
    
    public function get_rekamedis($id=null){
        $this->db->select('
        tbl_pasien.*,  
        mst_pasien.nama_pasien, 
        mst_pasien.no_rekamedis, 
        mst_pasien.jenis_kelamin, 
        mst_pasien.riwayat_alergi, 
        DATE_FORMAT(tbl_pasien.tgl_daftar, "%d %M %Y") as daftar,
        mst_pasien.panggilan, 
        YEAR(curdate()) - YEAR(mst_pasien.tgl_lahir) AS usia,
        mst_pembayaran.nama_pembayaran,
        mst_poliklinik.nama_poliklinik,
        user.name as nama_dokter
        ');
        $this->db->from('tbl_pasien');
        $this->db->join('mst_pembayaran', 'mst_pembayaran.id = tbl_pasien.id_pembayaran', 'left');
        $this->db->join('mst_poliklinik', 'mst_poliklinik.id = tbl_pasien.id_poliklinik', 'left');
        $this->db->join('mst_pasien', 'mst_pasien.id = tbl_pasien.id_pasien', 'left');
        $this->db->join('user', 'user.id = tbl_pasien.id_dokter', 'left');
        // $this->db->where('mst_pasien.id', $id);
        // $this->db->where('tbl_pasien.id_poliklinik', $id_poliklinik);
        if($id != null){
            $this->db->where('mst_pasien.id', $id);
        } 
        $this->db->order_by("tbl_pasien.tgl_daftar", "asc");
        $query = $this->db->get();
        return $query;
    }

    public function get_nama_pasien_soap($id=null){
      
        $query = $this->db->query(
            "SELECT 
                DATE_FORMAT(tbl_pasien.tgl_daftar, '%d %M %Y') as daftar,
                mst_pasien.no_rekamedis, 
                mst_pasien.nama_pasien 
            from tbl_pasien 
            left join mst_pasien on mst_pasien.id = tbl_pasien.id_pasien 
            where tbl_pasien.id = '$id' limit 1");
        return $query;
    }

    public function get_nama_pasien($id=null){
      
        $query = $this->db->query(
            "SELECT
                mst_pasien.no_rekamedis, 
                mst_pasien.nama_pasien 
            from tbl_pasien 
            left join mst_pasien on mst_pasien.id = tbl_pasien.id_pasien 
            where mst_pasien.id = '$id' limit 1");
        return $query;
    }

    function get_dokter_poli($id_poliklinik){
		$query = $this->db->get_where('user', array('id_poliklinik' => $id_poliklinik));
		return $query;
	}

    public function add($post){
        $params['keterangan_sakit'] = $post['keterangan_sakit'];
        $params['td'] = $post['td'];
        $params['n'] = $post['n'];
        $params['rr'] = $post['rr'];
        $params['s'] = $post['s'];
        if ($post['id_poliklinik'] == 10) {
            $params['kepala'] = $post['kepala'];
            $params['leher'] = $post['leher'];
            $params['thorax'] = $post['thorax'];
            $params['abdomen'] = $post['abdomen'];
            $params['extremitas'] = $post['extremitas'];
        } else if ($post['id_poliklinik'] == 3){
            $params['gigi'] = $post['gigi'];
            $params['periodontal'] = $post['periodontal'];
            $params['lidah'] = $post['lidah'];
            $params['bukal'] = $post['bukal'];
            $params['palatum'] = $post['palatum'];
            $params['bibir'] = $post['bibir'];
            $params['bukal'] = $post['bukal'];
            $params['leher_atas'] = $post['leher_atas'];
        } else if ($post['id_poliklinik'] == 4){
            $params['hpl'] = $post['hpl'];
            $params['hpht'] = $post['hpht'];
            $params['usia_kehamilan'] = $post['usia_kehamilan'];
            $params['bb'] = $post['bb'];
            $params['djj'] = $post['djj'];
            $params['abdomen_bidan'] = $post['abdomen_bidan'];
            $params['therapy'] = $post['therapy'];
            $params['pemeriksaan_penunjang'] = $post['pemeriksaan_penunjang'];
            $params['lila'] = $post['lila'];
        }
        
       
        $params['diagnosa'] = $post['diagnosa'];
        $params['perawat'] = $post['perawat'];
        $this->db->where('id', $post['id']);
        $this->db->update('tbl_pasien', $params);;
    }

    public function simpan_tindakan($post){
        $id             =  $this->input->post('id');
        $id_dokter      = $this->fungsi->user_login()->id;
        $nama_tindakan  =  $this->input->post('tindakan');
        $id_tindakan    = $this->db->get_where('mst_tindakan',array('nama_tindakan'=>$nama_tindakan))->row_array();
        $data           = array('id_tindakan'=>$id_tindakan['id'],
                                'id_pasien'=>$id,
                                'biaya'=>$id_tindakan['harga'],
                                'id_dokter'=>$id_dokter);
        $this->db->insert('riwayat_tindakan_pasien',$data);
    }
    
    public function simpan_obat($post){
        $id         =  $this->input->post('id');
        $jumlah     =  $this->input->post('jumlah');
        $id_dokter  = $this->fungsi->user_login()->id;
        $nama_obat  =  $this->input->post('obat');
        $id_obat    = $this->db->get_where('mst_obat',array('nama_obat'=>$nama_obat))->row_array();
        $id_obat_apotek    = $this->db->get_where('obat_masuk_apotek',array('id_obat'=>$id_obat['id']))->row_array();
        $data           = array('id_obat'=>$id_obat_apotek['id_obat'],
                                'id_pasien'=>$id,
                                'jumlah'=>$jumlah,
                                'biaya'=>$id_obat_apotek['harga_jual'],
                                'id_dokter'=>$id_dokter);
        $this->db->insert('riwayat_pemberian_obat_pasien',$data);
    }
    
    public function simpan_racikan($post){
        $id             =  $this->input->post('id');
        $jumlah             =  $this->input->post('jumlah');
        $id_dokter      = $this->fungsi->user_login()->id;
        $nama_racikan  =  $this->input->post('obat_racikan');
        $id_obat    = $this->db->get_where('mst_obat',array('nama_obat'=>$nama_racikan))->row_array();
        $id_obat_apotek    = $this->db->get_where('obat_masuk_apotek',array('id_obat'=>$id_obat['id']))->row_array();
        $data           = array('id_obat'=>$id_obat_apotek['id_obat'],
                                'id_pasien'=>$id,
                                'jumlah'=>$jumlah,
                                'biaya'=>$id_obat_apotek['harga_jual'],
                                'id_dokter'=>$id_dokter);
        $this->db->insert('riwayat_pemberian_racikan_pasien',$data);
    }
    
    public function simpan_alat($post){
        $id             =  $this->input->post('id');
        $jumlah             =  $this->input->post('jumlah');
        $id_dokter      = $this->fungsi->user_login()->id;
        $nama_alat  =  $this->input->post('alat');
        $id_barang    = $this->db->get_where('mst_barang',array('nama_barang'=>$nama_alat))->row_array();
        $id_barang_apotek    = $this->db->get_where('barang_masuk_apotek',array('id_barang'=>$id_barang['id']))->row_array();
        $data           = array('id_barang'=>$id_barang_apotek['id_barang'],
                                'id_pasien'=>$id,
                                'jumlah'=>$jumlah,
                                'biaya'=>$id_barang_apotek['harga_jual'],
                                'id_dokter'=>$id_dokter);
        $this->db->insert('riwayat_pemberian_alat_pasien',$data);
    }

    public function get_tindakan($id=null){
        $id_poliklinik = $this->fungsi->user_login()->id_poliklinik;
        $this->db->select('mst_tindakan.*, mst_poliklinik.id as id_poliklinik, mst_poliklinik.nama_poliklinik');
        $this->db->from('mst_tindakan');
        $this->db->join('mst_poliklinik', 'mst_poliklinik.id = mst_tindakan.id_poliklinik', 'left');
        $this->db->where('mst_tindakan.id_poliklinik', $id_poliklinik);
        $this->db->order_by("mst_tindakan.id", "desc");
        $query = $this->db->get();
        return $query;
    }
    
    public function get_obat($id=null){
        $this->db->select('obat_masuk_apotek.*, mst_obat.id as id_obat, mst_obat.nama_obat');
        $this->db->from('obat_masuk_apotek');
        $this->db->join('mst_obat', 'mst_obat.id = obat_masuk_apotek.id_obat', 'left');
        $this->db->order_by("obat_masuk_apotek.id", "desc");
        $query = $this->db->get();
        return $query;
    }
    
    public function get_racikan($id=null){
        $this->db->select('obat_masuk_apotek.*, mst_obat.id as id_obat, mst_obat.nama_obat');
        $this->db->from('obat_masuk_apotek');
        $this->db->join('mst_obat', 'mst_obat.id = obat_masuk_apotek.id_obat', 'left');
        $this->db->order_by("obat_masuk_apotek.id", "desc");
        $query = $this->db->get();
        return $query;
    }
    
    public function get_alat($id=null){
        $this->db->select('barang_masuk_apotek.*, mst_barang.id as id_barang, mst_barang.nama_barang');
        $this->db->from('barang_masuk_apotek');
        $this->db->join('mst_barang', 'mst_barang.id = barang_masuk_apotek.id_barang', 'left');
        $this->db->order_by("barang_masuk_apotek.id", "desc");
        $query = $this->db->get();
        return $query;
    }


    public function tindakan($id=null){
        $this->db->select('
        riwayat_tindakan_pasien.id,  
        riwayat_tindakan_pasien.id_pasien,  
        riwayat_tindakan_pasien.id_tindakan,  
        riwayat_tindakan_pasien.biaya,  
        mst_tindakan.nama_tindakan,
        ');
        $this->db->from('riwayat_tindakan_pasien');
        $this->db->join('mst_tindakan', 'mst_tindakan.id = riwayat_tindakan_pasien.id_tindakan', 'left');
        $this->db->where('riwayat_tindakan_pasien.id_pasien', $id);
        $this->db->order_by("riwayat_tindakan_pasien.id", "desc");
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


    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_pasien');
    }
    
    public function del_tindakan($id){
        $id    =  $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('riwayat_tindakan_pasien');
    }
    
    public function del_obat($id){
        $id    =  $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('riwayat_pemberian_obat_pasien');
    }
    
    public function del_racikan($id){
        $id    =  $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('riwayat_pemberian_racikan_pasien');
    }
    
    public function del_alat($id){
        $id    =  $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('riwayat_pemberian_alat_pasien');
    }

    public function send($id){
        $params['status'] = 3;
        $this->db->where('id', $id);
        $this->db->update('tbl_pasien', $params);
    }
}
