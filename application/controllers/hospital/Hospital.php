<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/hospital_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('hospital/hospital_m');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['row'] = $this->hospital_m->get();
		$this->template->load('template', 'hospital/data_hospital', $data);
	}

	public function add()
	{
		
		$this->form_validation->set_rules('nama', 'Hospital Name', 'required');
		$this->form_validation->set_rules('alamat', 'Address', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required');
		$this->form_validation->set_rules('emergency_contact', 'Emergency Contact', 'required');
		$this->form_validation->set_rules('keterangan', 'Note', 'required');
		$this->form_validation->set_message('required', '%s is empty, please input value');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'hospital/hospital_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$config['upload_path']          = './assets/img/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 2048;
			$config['file_name']             = 'logo-'.date('ymd').'-'.substr(md5(rand()),0,10);
			$this->load->library('upload', $config);
			if(@_FILES['image_hospital']['name'] != null) {
				if($this->upload->do_upload('image_hospital')){
					$post['image_hospital'] = $this->upload->data('file_name');
					$this->hospital_m->add($post);
					if($this->db->affected_rows() > 0) {
						echo "<script>alert('Data saved... ');</script>";
					}
					echo "<script>window.location='".site_url('hospital/hospital')."';</script>";
				}
			}
			// $this->hospital_m->add($post);
			// if($this->db->affected_rows() > 0) {
			// 	echo "<script>alert('Data saved... ');</script>";
			// }
			// echo "<script>window.location='".site_url('hospital/hospital')."';</script>";
		}
	}

	public function edit($id)
	{
		
		$this->form_validation->set_rules('nama', 'Hospital Name', 'required');
		$this->form_validation->set_rules('alamat', 'Address', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required');
		$this->form_validation->set_rules('emergency_contact', 'Emergency Contact', 'required');
		$this->form_validation->set_rules('keterangan', 'Note', 'required');
		
		$this->form_validation->set_message('required', '%s is empty, please input value');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		if ($this->form_validation->run() == FALSE) {
			$query = $this->hospital_m->get($id);
			if($query->num_rows() > 0 ) {
				$data['row'] = $query->row();
				$this->template->load('template', 'hospital/hospital_form_edit', $data);
			} else {
				echo "<script>alert('Data not found... ');</script>";
				echo "<script>window.location='".site_url('hospital/hospital')."';</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$config['upload_path']          = './assets/img/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 2048;
			$config['file_name']             = 'logo-'.date('ymd').'-'.substr(md5(rand()),0,10);
			$this->load->library('upload', $config);
			if(@_FILES['image_hospital']['name'] != null) {
				if($this->upload->do_upload('image_hospital')){

					$query = $this->hospital_m->get($post['image_hospital'])->row();
					if($query->image_hospital !=  null ){
						$target_file = './assets/img/'.$query->image_hospital;
						unlink($target_file); 
					}

					$post['image_hospital'] = $this->upload->data('file_name');
					$this->hospital_m->edit($post);
					if($this->db->affected_rows() > 0) {
						echo "<script>alert('Data saved... ');</script>";
					}
					echo "<script>window.location='".site_url('hospital/hospital')."';</script>";
				}
			}
			// $this->hospital_m->edit($post);
			// if($this->db->affected_rows() > 0) {
			// 	echo "<script>alert('Data saved... ');</script>";
			// }
			// echo "<script>window.location='".site_url('hospital/hospital')."';</script>";
		}
	}

	

	public function del()
	{
		$id = $this->input->post('id_hospital');
		$this->hospital_m->del($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data deleted... ');</script>";
		}
		echo "<script>window.location='".site_url('hospital/hospital')."';</script>";
	}
}