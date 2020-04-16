<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asuransi extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('master/asuransi_m');
		$this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->asuransi_m->get();
        $this->template->load('template', 'master/asuransi/asuransi_data', $data);
    }

    public function add(){
        $asuransi = new stdClass();
        $asuransi->id = null;
        $asuransi->nama_asuransi = null;
        $data = array(
            'page' => 'add',
            'row' => $asuransi
        );
        $this->template->load('template', 'master/asuransi/asuransi_form', $data);
    }

    public function edit($id){
        $query = $this->asuransi_m->get($id);
        if($query->num_rows() > 0) {
            $asuransi = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $asuransi
            );
            $this->template->load('template', 'master/asuransi/asuransi_form', $data);
        } else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->asuransi_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->asuransi_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('asuransi');
    }

    public function del($id){
        $this->asuransi_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('asuransi');
    }

}
    