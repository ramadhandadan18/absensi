<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Index extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_index'); // load model m_index
        $this->load->library('Excel'); //load librari excel

    }

    public function index()
    {
        $data['data'] = $this->M_index->getData(); // ambil data dari M_Index
        $this->load->view('V_Index', $data);
    }

    public function importExcel()
    {
        $fileName = $_FILES['file']['name'];

        $config['upload_path'] = './assets/'; //path upload
        $config['file_name'] = $fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze

        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            echo $this->upload->display_errors();
            exit();
        }

        $inputFileName = './assets/' . $fileName;

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray(
                'A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE
            );

            // Sesuaikan key array dengan nama kolom di database                                                         
            $data = array(
                "noinduk" => $rowData[0][1],
                "nama" => $rowData[0][2]
            );
            $insert = $this->db->insert("tb_siswa", $data);
        }
        redirect('Index');
    }
}
