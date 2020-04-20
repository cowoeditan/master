<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_data_pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model(['rekap/rekap_data_pasien_m']);
    }

    public function index()
    {
        $data['row'] = $this->rekap_data_pasien_m->get();
        $this->template->load('template', 'rekap/rekap_data_pasien_data', $data);
    }
}