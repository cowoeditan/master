<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model(['master/tindakan_m', 'master/poliklinik_m']);
		$this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->tindakan_m->get();
        $this->template->load('template', 'master/tindakan/tindakan_data', $data);
    }

    public function add(){
        $tindakan = new stdClass();
        $tindakan->id = null;
        $tindakan->kode_tindakan = null;
        $tindakan->nama_tindakan = null;
        $tindakan->harga = null;
        $tindakan->id_poliklinik = null;

        $poliklinik = $this->poliklinik_m->get();

        $data = array(
            'page' => 'add',
            'row' => $tindakan,
            'poliklinik' => $poliklinik,
        );
        $this->template->load('template', 'master/tindakan/tindakan_form', $data);
    }

    public function edit($id){
        $query = $this->tindakan_m->get($id);
        $poliklinik = $this->poliklinik_m->get();
        if($query->num_rows() > 0) {
            $tindakan = $query->row();
            
            $data = array(
                'page' => 'edit',
                'row' => $tindakan,
                'poliklinik' => $poliklinik, 
            );
            $this->template->load('template', 'master/tindakan/tindakan_form', $data);
        } else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->tindakan_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->tindakan_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('tindakan');
    }

    public function del($id){
        $this->tindakan_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('tindakan');
    }

}
    