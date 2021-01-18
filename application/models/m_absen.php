<?php
class m_absen extends CI_Model
{

    function show_absen()
    {
        $hasil = $this->db->query("SELECT * FROM tbl_absen");
        return $hasil;
    }
}
