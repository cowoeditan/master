<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model(['master/obat_m', 'master/principal_m', 'master/pbf_m']);
		$this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->obat_m->get();
        $this->template->load('template', 'master/obat/obat_data', $data);
    }

    public function add(){
        $obat = new stdClass();
        $obat->id = null;
        $obat->kode_obat = null;
        $obat->nama_obat = null;
        $obat->satuan = null;
        $obat->sediaan = null;
        $obat->jenis = null;
        $obat->komposisi = null;
        $obat->id_principal = null;
        $obat->id_pbf = null;
        $pbf = $this->pbf_m->get();
        $principal = $this->principal_m->get();
        $data = array(
            'page' => 'add',
            'row' => $obat,
            'pbf' => $pbf, 
            'principal' => $principal, 
        );
        $this->template->load('template', 'master/obat/obat_form', $data);
    }

    public function edit($id){
        $query = $this->obat_m->get($id);
        $pbf = $this->pbf_m->get();
        $principal = $this->principal_m->get();
        if($query->num_rows() > 0) {
            $obat = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $obat,
                'pbf' => $pbf, 
                'principal' => $principal, 
            );
            $this->template->load('template', 'master/obat/obat_form', $data);
        } else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->obat_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->obat_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('obat');
    }

    public function del($id){
        $this->obat_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('obat');
    }

}
    