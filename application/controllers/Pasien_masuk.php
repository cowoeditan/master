<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_masuk extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model(['pendaftaran/pasien_masuk_m', 'master/poliklinik_m', 'master/pembayaran_m', 'master/pasien_m']);
		$this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->pasien_masuk_m->get();
        $this->template->load('template', 'pendaftaran/pasien_masuk_data', $data);
    }

    // get sub category by category_id
	function get_dokter_poli(){
		$id_poliklinik = $this->input->post('id',TRUE);
		$data = $this->pasien_masuk_m->get_dokter_poli($id_poliklinik)->result();
		echo json_encode($data);
	}

    public function add(){
        $pasien_masuk = new stdClass();
        $pasien_masuk->id = null;
        $pasien_masuk->id_pasien = null;
        $pasien_masuk->no_regis = null;
        $pasien_masuk->tgl_daftar = null;
        $pasien_masuk->id_poliklinik = null;
        $pasien_masuk->id_pembayaran = null;
        $poliklinik = $this->poliklinik_m->get();
        $pembayaran = $this->pembayaran_m->get();
        $pasien = $this->pasien_m->get();
        $no_regis = $this->pasien_masuk_m->get_no();
        $data = array(
            'page' => 'add',
            'row' => $pasien_masuk, 
            'poliklinik' => $poliklinik, 
            'pasien' => $pasien, 
            'pembayaran' => $pembayaran, 
            'no_urut' => $no_regis, 
        );
        $this->template->load('template', 'pendaftaran/pasien_masuk_form', $data);
    }

    public function edit($id){
        $query = $this->pasien_masuk_m->get($id);
        $poliklinik = $this->poliklinik_m->get();
        $pembayaran = $this->pembayaran_m->get();
        $no_regis = $this->pasien_masuk_m->get_no();
        $pasien = $this->pasien_m->get();
        if($query->num_rows() > 0) {
            $pasien_masuk = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $pasien_masuk,
                'poliklinik' => $poliklinik, 
                'pasien' => $pasien, 
                'pembayaran' => $pembayaran, 
                'no_urut' => $no_regis, 
            );
            $this->template->load('template', 'pendaftaran/pasien_masuk_form', $data);
        } else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->pasien_masuk_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->pasien_masuk_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('pasien_masuk');
    }

    public function del($id){
        $this->pasien_masuk_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('pasien_masuk');
    }
    
    public function send($id){
        $this->pasien_masuk_m->send($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dikirim');
        }
        redirect('pasien_masuk');
    }

}
    