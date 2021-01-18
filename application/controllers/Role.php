<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Role extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_role');
    }

    public function index()
    {
        $x['data'] = $this->m_role->show_role();
        $this->load->view('v_role', $x);
    }
}
