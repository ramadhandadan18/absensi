<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cuti extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_cuti');
    }

    public function index()
    {
        $x['data'] = $this->m_cuti->show_cuti();
        $this->load->view('v_cuti', $x);
    }
}
