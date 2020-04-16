<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poliklinik extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('master/poliklinik_m');
		$this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->poliklinik_m->get();
        $this->template->load('template', 'master/poliklinik/poliklinik_data', $data);
    }

    public function add(){
        $poliklinik = new stdClass();
        $poliklinik->id = null;
        $poliklinik->kode_poliklinik = null;
        $poliklinik->nama_poliklinik = null;
        $data = array(
            'page' => 'add',
            'row' => $poliklinik
        );
        $this->template->load('template', 'master/poliklinik/poliklinik_form', $data);
    }

    public function edit($id){
        $query = $this->poliklinik_m->get($id);
        if($query->num_rows() > 0) {
            $poliklinik = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $poliklinik
            );
            $this->template->load('template', 'master/poliklinik/poliklinik_form', $data);
        } else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->poliklinik_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->poliklinik_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('poliklinik');
    }

    public function del($id){
        $this->poliklinik_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('poliklinik');
    }

}
    