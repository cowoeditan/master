<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_masuk_poli extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model(['dokter/pasien_masuk_poli_m','master/tindakan_m']);
		$this->load->library('form_validation');
    }

    public function index(){
            $data['row'] = $this->pasien_masuk_poli_m->get();
            $this->template->load('template', 'dokter/pasien_masuk_poli_data', $data);
    }
    
    public function data_rekamedis($id){
        $query = $this->pasien_masuk_poli_m->get_rekamedis($id);
        $query_nama_pasien = $this->pasien_masuk_poli_m->get_nama_pasien($id);
        if($query->num_rows() > 0) {
            // $pasien_masuk_poli = $query->row();
            $data = array(
                'page' => 'add',
                'row' => $query,
                'data_pasien' => $query_nama_pasien
            );
            $this->template->load('template', 'dokter/data_rekamedis', $data);
        }else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function simpan(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['submit_tindakan']))
        {   
            $id = $this->input->post('id');
            $nama_tindakan  =  $this->input->post('tindakan');
            if( $nama_tindakan == ''){
                redirect(site_url('pasien_masuk_poli/soap/'.$id.'?tab=tindakan'));
            } else {
                $id = $this->input->post('id');
                $this->pasien_masuk_poli_m->simpan_tindakan($post);
                redirect(site_url('pasien_masuk_poli/soap/'.$id.'?tab=tindakan'));
            }
        } 
        else if(isset($_POST['del_tindakan'])) {
            $id_pasien = $this->input->post('id_pasien');
            $id = $this->input->post('id');
            $this->pasien_masuk_poli_m->del_tindakan($post);
            redirect(site_url('pasien_masuk_poli/soap/'.$id_pasien.'?tab=tindakan'));
        }

        else if(isset($_POST['submit_obat']))
        {   
            $id = $this->input->post('id');
            $nama_obat  =  $this->input->post('obat');
            if( $nama_obat == ''){
                redirect(site_url('pasien_masuk_poli/soap/'.$id.'?tab=obat'));
            } else {
                $id = $this->input->post('id');
                $this->pasien_masuk_poli_m->simpan_obat($post);
                redirect(site_url('pasien_masuk_poli/soap/'.$id.'?tab=obat'));
            }
        } 
        else if(isset($_POST['del_obat'])) {
            $id_pasien = $this->input->post('id_pasien');
            $id = $this->input->post('id');
            $this->pasien_masuk_poli_m->del_obat($post);
            redirect(site_url('pasien_masuk_poli/soap/'.$id_pasien.'?tab=obat'));
        }

        else if(isset($_POST['submit_alat']))
        {   
            $id = $this->input->post('id');
            $nama_alat  =  $this->input->post('alat');
            if( $nama_alat == ''){
                redirect(site_url('pasien_masuk_poli/soap/'.$id.'?tab=alat'));
            } else {
                $id = $this->input->post('id');
                $this->pasien_masuk_poli_m->simpan_alat($post);
                redirect(site_url('pasien_masuk_poli/soap/'.$id.'?tab=alat'));
            }
        } 
        else if(isset($_POST['del_alat'])) {
            $id_pasien = $this->input->post('id_pasien');
            $id = $this->input->post('id');
            $this->pasien_masuk_poli_m->del_alat($post);
            redirect(site_url('pasien_masuk_poli/soap/'.$id_pasien.'?tab=alat'));
        }

        else if(isset($_POST['submit_racikan']))
        {   
            $id = $this->input->post('id');
            $nama_racikan  =  $this->input->post('obat_racikan');
            if( $nama_racikan == ''){
                redirect(site_url('pasien_masuk_poli/soap/'.$id.'?tab=racikan'));
            } else {
                $id = $this->input->post('id');
                $this->pasien_masuk_poli_m->simpan_racikan($post);
                redirect(site_url('pasien_masuk_poli/soap/'.$id.'?tab=racikan'));
            }
        } 
        else if(isset($_POST['del_racikan'])) {
            $id_pasien = $this->input->post('id_pasien');
            $id = $this->input->post('id');
            $this->pasien_masuk_poli_m->del_racikan($post);
            redirect(site_url('pasien_masuk_poli/soap/'.$id_pasien.'?tab=racikan'));
        } else {
            $id = $this->input->post('id');
            redirect(site_url('pasien_masuk_poli/soap/'.$id.'?tab=tindakan'));
        }
    }

    public function soap($id){
        
        $query = $this->pasien_masuk_poli_m->get($id);
        $querytindakan = $this->pasien_masuk_poli_m->tindakan($id);
        $tindakan = $this->pasien_masuk_poli_m->get_tindakan();
        $queryobat = $this->pasien_masuk_poli_m->obat($id);
        $obat = $this->pasien_masuk_poli_m->get_obat();
        $queryalat = $this->pasien_masuk_poli_m->alat($id);
        $alat = $this->pasien_masuk_poli_m->get_alat();
        $queryracikan = $this->pasien_masuk_poli_m->racikan($id);
        $racikan = $this->pasien_masuk_poli_m->get_racikan();
        $query_nama_pasien = $this->pasien_masuk_poli_m->get_nama_pasien_soap($id);
        if($query->num_rows() > 0) {
            $pasien_masuk_poli = $query->row();
            // $datatindakan = $querytindakan;
            $data = array(
                'page' => 'add',
                'row' => $pasien_masuk_poli, 
                'tindakan' => $tindakan, 
                'obat' => $obat, 
                'alat' => $alat, 
                'racikan' => $racikan, 
                'querytindakan' => $querytindakan, 
                'queryobat' => $queryobat, 
                'queryalat' => $queryalat, 
                'queryracikan' => $queryracikan, 
                'query_nama_pasien' => $query_nama_pasien, 

            );
            $this->template->load('template', 'dokter/pasien_masuk_poli_soap', $data);
        }else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
        // $this->template->load('template', 'dokter/pasien_masuk_poli_data', $data);
        
        
    }

    public function data_soap($id){
        
        $query = $this->pasien_masuk_poli_m->get($id);
        $querytindakan = $this->pasien_masuk_poli_m->tindakan($id);
        $tindakan = $this->pasien_masuk_poli_m->get_tindakan();
        $queryobat = $this->pasien_masuk_poli_m->obat($id);
        $obat = $this->pasien_masuk_poli_m->get_obat();
        $queryalat = $this->pasien_masuk_poli_m->alat($id);
        $alat = $this->pasien_masuk_poli_m->get_alat();
        $queryracikan = $this->pasien_masuk_poli_m->racikan($id);
        $racikan = $this->pasien_masuk_poli_m->get_racikan();
        $query_nama_pasien = $this->pasien_masuk_poli_m->get_nama_pasien_soap($id);
        if($query->num_rows() > 0) {
            $pasien_masuk_poli = $query->row();
            // $datatindakan = $querytindakan;
            $data = array(
                'page' => 'add',
                'row' => $pasien_masuk_poli, 
                'tindakan' => $tindakan, 
                'obat' => $obat, 
                'alat' => $alat, 
                'racikan' => $racikan, 
                'querytindakan' => $querytindakan, 
                'queryobat' => $queryobat, 
                'queryalat' => $queryalat, 
                'queryracikan' => $queryracikan, 
                'query_nama_pasien' => $query_nama_pasien, 

            );
            $this->template->load('template', 'dokter/data_soap', $data);
        }else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
        // $this->template->load('template', 'dokter/pasien_masuk_poli_data', $data);
        
        
    }

    public function data_soap_rekamedis($id){
        
        $query = $this->pasien_masuk_poli_m->get_soap_rekamedis($id);
        $querytindakan = $this->pasien_masuk_poli_m->tindakan($id);
        $tindakan = $this->pasien_masuk_poli_m->get_tindakan();
        $queryobat = $this->pasien_masuk_poli_m->obat($id);
        $obat = $this->pasien_masuk_poli_m->get_obat();
        $queryalat = $this->pasien_masuk_poli_m->alat($id);
        $alat = $this->pasien_masuk_poli_m->get_alat();
        $queryracikan = $this->pasien_masuk_poli_m->racikan($id);
        $racikan = $this->pasien_masuk_poli_m->get_racikan();
        $query_nama_pasien = $this->pasien_masuk_poli_m->get_nama_pasien_soap($id);
        if($query->num_rows() > 0) {
            $pasien_masuk_poli = $query->row();
            // $datatindakan = $querytindakan;
            $data = array(
                'page' => 'add',
                'row' => $pasien_masuk_poli, 
                'tindakan' => $tindakan, 
                'obat' => $obat, 
                'alat' => $alat, 
                'racikan' => $racikan, 
                'querytindakan' => $querytindakan, 
                'queryobat' => $queryobat, 
                'queryalat' => $queryalat, 
                'queryracikan' => $queryracikan, 
                'query_nama_pasien' => $query_nama_pasien, 

            );
            $this->template->load('template', 'dokter/data_soap', $data);
        }else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
        // $this->template->load('template', 'dokter/pasien_masuk_poli_data', $data);
        
        
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->pasien_masuk_poli_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->pasien_masuk_poli_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('pasien_masuk_poli');
        // redirect(site_url('pasien_masuk_poli/soap/'.$id.'?tab=tindakan'));
    }

    // public function del($id){
    //     $this->pasien_masuk_m->del($id);
    //     if($this->db->affected_rows() > 0) {
    //         $this->session->set_flashdata('success', 'data berhasil dihapus');
    //     }
    //     redirect('pasien_masuk');
    // }
    
    public function send($id){
        $this->pasien_masuk_poli_m->send($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dikirim');
        }
        redirect('pasien_masuk_poli');
    }
    
    public function del_tindakan($id){
        $id_pasien = $this->input->post('id_pasien');
        $this->pasien_masuk_poli_m->del_tindakan($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('pasien_masuk');
    }
    
    // public function simpan_tindakan($id){
    //     $this->pasien_masuk_m->send($id);
    //     if($this->db->affected_rows() > 0) {
    //         $this->session->set_flashdata('success', 'data berhasil dikirim');
    //     }
    //     redirect('pasien_masuk');
    // }

}
    