<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('master/principal_m');
		$this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->principal_m->get();
        $this->template->load('template', 'master/principal/principal_data', $data);
    }

    public function add(){
        $principal = new stdClass();
        $principal->id = null;
        $principal->kode_principal = null;
        $principal->nama_principal = null;
        $data = array(
            'page' => 'add',
            'row' => $principal
        );
        $this->template->load('template', 'master/principal/principal_form', $data);
    }

    public function edit($id){
        $query = $this->principal_m->get($id);
        if($query->num_rows() > 0) {
            $principal = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $principal
            );
            $this->template->load('template', 'master/principal/principal_form', $data);
        } else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->principal_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->principal_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('principal');
    }

    public function del($id){
        $this->principal_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('principal');
    }

}
    