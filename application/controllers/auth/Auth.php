<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	public function login()
	{
		check_already_login();
		$this->load->view('login/login');
	}

	public function process(){
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('user/user_m');
			$query  = $this->user_m->login($post);
			if($query->num_rows() > 0 ) {
				$row = $query->row();
				$param = array(
					'user_id' => $row->id,
					'level' => $row->level,
					'name' => $row->name
				);
				$this->session->set_userdata($param);
				echo "<script>window.location='".site_url('dashboard')."'</script>";
			} else {
				echo "<script>alert('Login Gagal !, Username / Password Salah !!');window.location='".site_url('auth/auth/login')."'</script>";
			}
		}
	}


	public function logout(){
		$params = array('user_id', 'level');
		$this->session->unset_userdata($params);
		redirect('auth/auth/login');
	}
}
