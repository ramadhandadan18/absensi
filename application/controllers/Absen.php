<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Absen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_absen');
    }

    public function index()
    {
        $x['data'] = $this->m_absen->show_absen();
        $this->load->view('v_absen', $x);
    }
}
