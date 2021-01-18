<?php
class m_role extends CI_Model
{

    function show_role()
    {
        $hasil = $this->db->query("SELECT * FROM tbl_role");
        return $hasil;
    }
}
