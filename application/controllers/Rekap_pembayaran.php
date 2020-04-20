<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model(['rekap/rekap_pembayaran_m']);
    }

    public function index()
    {
        $data['row'] = $this->rekap_pembayaran_m->get();
        $this->template->load('template', 'rekap/rekap_pembayaran_data', $data);
    }
}