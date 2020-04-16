<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model(['master/pasien_m', 'master/panggilan_m', 'master/jenis_kelamin_m']);
		$this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->pasien_m->get();
        $this->template->load('template', 'master/pasien/pasien_data', $data);
    }

    public function add(){
        $pasien = new stdClass();
        $pasien->id = null;
        $pasien->no_rekamedis = null;
        $pasien->nama_pasien = null;
        $pasien->golongan_darah = null;
        $pasien->riwayat_alergi = null;
        $pasien->jenis_kelamin = null;
        $pasien->tgl_lahir = null;
        $pasien->alamat = null;
        $pasien->pekerjaan = null;
        $pasien->no_telp = null;
        $pasien->nama_penjamin = null;
        $pasien->pekerjaan_penjamin = null;
        $pasien->no_telp_penjamin = null;
        $pasien->alamat_penjamin = null;
        $pasien->panggilan = null;
        $pasien->jenis_kelamin = null;
        $jenis_kelamin = $this->jenis_kelamin_m->get();
        $no_urut = $this->pasien_m->get_no();
        $panggilan = $this->panggilan_m->get();
        $data = array(
            'page' => 'add',
            'row' => $pasien,
            'panggilan' => $panggilan,
            'jenis_kelamin' => $jenis_kelamin,
            'no_urut' => $no_urut,
        );
        $this->template->load('template', 'master/pasien/pasien_form', $data);
    }

    public function edit($id){
        $query = $this->pasien_m->get($id);
        $jenis_kelamin = $this->jenis_kelamin_m->get();
        $panggilan = $this->panggilan_m->get();
        $no_urut = $this->pasien_m->get_no();
        if($query->num_rows() > 0) {
            $pasien = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $pasien,
                'panggilan' => $panggilan,
                'jenis_kelamin' => $jenis_kelamin,
                'no_urut' => $no_urut,
            );
            $this->template->load('template', 'master/pasien/pasien_form', $data);
        } else {
            echo "<script> alert('data tidak ditemukan');</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->pasien_m->add($post);
        } else if(isset($_POST['edit'])){
            $this->pasien_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('success', 'data berhasil disimpan');
        }
        redirect('pasien');
    }

    public function del($id){
        $this->pasien_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('pasien');
    }

}
    