<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pegawai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_pegawai');
    }

    public function index()
    {
        $x['data'] = $this->m_pegawai->show_pegawai();
        $this->load->view('v_pegawai', $x);
    }
}
