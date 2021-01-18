<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang');
	}

	public function index()
	{
		$x['data'] = $this->m_barang->show_barang();
		$this->load->view('v_barang', $x);
	}
}
