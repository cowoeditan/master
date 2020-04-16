<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sarana extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('master/sarana_m');
		$this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->sarana_m->get();
        $this->template->load('template', 'master/sarana/sarana_data', $data);
    }

    public function add(){
        $sarana = new stdClass();
        $sarana->id = null;
        $sarana->nama_sarana = null;
        $sarana->alamat = null;
        $sarana->no_izin = null;
        $data = array(
            'page' => 'add',
            'row' => $sarana
        );
        $this->template->load('template', 'master/sarana/sarana_form', $data);
    }

    public function edit($id){
        $query = $this->sarana_m->get($id);
        if($query->num_rows() > 0) {
            $sarana = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $sarana
            );
            $this->template->load('template', 'master/sarana/sarana_form', $data);
        } else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->sarana_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->sarana_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('sarana');
    }

    public function del($id){
        $this->sarana_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('sarana');
    }

}
    