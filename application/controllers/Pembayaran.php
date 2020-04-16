<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('master/pembayaran_m');
		$this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->pembayaran_m->get();
        $this->template->load('template', 'master/pembayaran/pembayaran_data', $data);
    }

    public function add(){
        $pembayaran = new stdClass();
        $pembayaran->id = null;
        $pembayaran->kode_pembayaran = null;
        $pembayaran->nama_pembayaran = null;
        $data = array(
            'page' => 'add',
            'row' => $pembayaran
        );
        $this->template->load('template', 'master/pembayaran/pembayaran_form', $data);
    }

    public function edit($id){
        $query = $this->pembayaran_m->get($id);
        if($query->num_rows() > 0) {
            $pembayaran = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $pembayaran
            );
            $this->template->load('template', 'master/pembayaran/pembayaran_form', $data);
        } else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->pembayaran_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->pembayaran_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('pembayaran');
    }

    public function del($id){
        $this->pembayaran_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('pembayaran');
    }

}
    