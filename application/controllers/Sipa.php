<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sipa extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('master/sipa_m');
		$this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->sipa_m->get();
        $this->template->load('template', 'master/sipa/sipa_data', $data);
    }

    public function add(){
        $sipa = new stdClass();
        $sipa->id = null;
        $sipa->nama_petugas = null;
        $sipa->alamat = null;
        $sipa->jabatan = null;
        $sipa->sip = null;
        $data = array(
            'page' => 'add',
            'row' => $sipa
        );
        $this->template->load('template', 'master/sipa/sipa_form', $data);
    }

    public function edit($id){
        $query = $this->sipa_m->get($id);
        if($query->num_rows() > 0) {
            $sipa = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $sipa
            );
            $this->template->load('template', 'master/sipa/sipa_form', $data);
        } else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->sipa_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->sipa_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('sipa');
    }

    public function del($id){
        $this->sipa_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('sipa');
    }

}
    