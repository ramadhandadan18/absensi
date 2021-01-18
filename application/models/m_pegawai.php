<?php
class m_pegawai extends CI_Model
{

    function show_pegawai()
    {
        $hasil = $this->db->query("SELECT * FROM tbl_pegawai");
        return $hasil;
    }
}
