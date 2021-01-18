<?php
class m_cuti extends CI_Model
{

    function show_cuti()
    {
        $hasil = $this->db->query("SELECT * FROM tbl_cuti");
        return $hasil;
    }
}
