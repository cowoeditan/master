<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class distributor extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('master/distributor_m');
		$this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->distributor_m->get();
        $this->template->load('template', 'master/distributor/distributor_data', $data);
    }

    public function add(){
        $distributor = new stdClass();
        $distributor->id = null;
        $distributor->kode_distributor = null;
        $distributor->nama_distributor = null;
        $distributor->alamat = null;
        $distributor->telp = null;
        $distributor->bank = null;
        $distributor->nomor_rekening = null;
        $data = array(
            'page' => 'add',
            'row' => $distributor
        );
        $this->template->load('template', 'master/distributor/distributor_form', $data);
    }

    public function edit($id){
        $query = $this->distributor_m->get($id);
        if($query->num_rows() > 0) {
            $distributor = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $distributor
            );
            $this->template->load('template', 'master/distributor/distributor_form', $data);
        } else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->distributor_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->distributor_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('distributor');
    }

    public function del($id){
        $this->distributor_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('distributor');
    }

}
    