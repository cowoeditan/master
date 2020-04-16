<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pbf extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('master/pbf_m');
		$this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->pbf_m->get();
        $this->template->load('template', 'master/pbf/pbf_data', $data);
    }

    public function add(){
        $pbf = new stdClass();
        $pbf->id = null;
        $pbf->kode_pbf = null;
        $pbf->nama_pbf = null;
        $data = array(
            'page' => 'add',
            'row' => $pbf
        );
        $this->template->load('template', 'master/pbf/pbf_form', $data);
    }

    public function edit($id){
        $query = $this->pbf_m->get($id);
        if($query->num_rows() > 0) {
            $pbf = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $pbf
            );
            $this->template->load('template', 'master/pbf/pbf_form', $data);
        } else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->pbf_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->pbf_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('pbf');
    }

    public function del($id){
        $this->pbf_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('pbf');
    }

}
    