<?php
class m_barang extends CI_Model
{

	function show_barang()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_barang");
		return $hasil;
	}
}
