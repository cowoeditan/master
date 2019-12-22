<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('user/user_m');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/data_user', $data);
	}

	public function add()
	{
		
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',
			array('matches' => '%s Not match with password')
		);
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s is empty, please input value');
		$this->form_validation->set_message('min_length', '{field} min value 5 character');
		$this->form_validation->set_message('is_unique', '{field} already use, change more value');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'user/user_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->add($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data saved... ');</script>";
			}
			echo "<script>window.location='".site_url('user/user')."';</script>";
		}
	}

	public function edit($id)
	{
		
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
		if($this->input->post('password')){
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',
				array('matches' => '%s Not match with password')
			);
		}

		if($this->input->post('passconf')){
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',
				array('matches' => '%s Not match with password')
			);
		}
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s is empty, please input value');
		$this->form_validation->set_message('min_length', '{field} min value 5 character');
		$this->form_validation->set_message('is_unique', '{field} already use, change more value');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get();
			if($query->num_rows() > 0 ) {
				$data['row'] = $query->row();
				$this->template->load('template', 'user/user_form_edit', $data);
			} else {
				echo "<script>alert('Data not found... ');</script>";
				echo "<script>window.location='".site_url('user/user')."';</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->edit($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data saved... ');</script>";
			}
			echo "<script>window.location='".site_url('user/user')."';</script>";
		}
	}

	function username_check(){
		
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username != '$post[username]' AND id != '$post[id]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '{field} already use, change more value');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function del()
	{
		$id = $this->input->post('id');
		$this->user_m->del($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data deleted... ');</script>";
		}
		echo "<script>window.location='".site_url('user/user')."';</script>";
	}
}