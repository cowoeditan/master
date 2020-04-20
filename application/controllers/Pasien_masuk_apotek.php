<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_masuk_apotek extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model(['apotek/pasien_masuk_apotek_m','master/tindakan_m']);
		$this->load->library('form_validation');
    }

    public function index(){
            $data['row'] = $this->pasien_masuk_apotek_m->get();
            $this->template->load('template', 'apotek/pasien_masuk_apotek_data', $data);
    }

    public function soap($id){
        
        $query = $this->pasien_masuk_apotek_m->get($id);
        $queryobat = $this->pasien_masuk_apotek_m->obat($id);
        $queryalat = $this->pasien_masuk_apotek_m->alat($id);
        $queryracikan = $this->pasien_masuk_apotek_m->racikan($id);
        $query_nama_pasien = $this->pasien_masuk_apotek_m->get_nama_pasien_soap($id);
        if($query->num_rows() > 0) {
            $pasien_masuk_poli = $query->row();
            // $datatindakan = $querytindakan;
            $data = array(
                'page' => 'add',
                'row' => $pasien_masuk_poli, 
                'queryobat' => $queryobat, 
                'queryalat' => $queryalat, 
                'queryracikan' => $queryracikan, 
                'query_nama_pasien' => $query_nama_pasien, 

            );
            $this->template->load('template', 'apotek/pasien_masuk_apotek_soap', $data);
        }else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
        // $this->template->load('template', 'dokter/pasien_masuk_poli_data', $data);
        
        
    }

    public function send($id){
        $this->pasien_masuk_apotek_m->send($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dikirim ke kasir');
        }
        redirect('pasien_masuk_apotek');
    }
    
    public function ambilobat($id){
        $this->pasien_masuk_apotek_m->ambilobat($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'obat/resep telah di ambil ');
        }
        redirect('pasien_masuk_apotek');
    }
}