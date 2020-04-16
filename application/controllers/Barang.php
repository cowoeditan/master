<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('master/barang_m');
		$this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->barang_m->get();
        $this->template->load('template', 'master/barang/barang_data', $data);
    }

    public function add(){
        $barang = new stdClass();
        $barang->id = null;
        $barang->kode_barang = null;
        $barang->nama_barang = null;
        $barang->satuan = null;
        $data = array(
            'page' => 'add',
            'row' => $barang
        );
        $this->template->load('template', 'master/barang/barang_form', $data);
    }

    public function edit($id){
        $query = $this->barang_m->get($id);
        if($query->num_rows() > 0) {
            $barang = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $barang
            );
            $this->template->load('template', 'master/barang/barang_form_edit', $data);
        } else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->barang_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->barang_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('barang');
    }

    public function del($id){
        $this->barang_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('barang');
    }

}
    