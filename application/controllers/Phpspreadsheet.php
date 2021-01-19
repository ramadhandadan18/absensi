<?php

/**
 * @package Phpspreadsheet :  Phpspreadsheet
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *   
 * Description of Phpspreadsheet Controller
 */

defined('BASEPATH') or exit('No direct script access allowed');
//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Phpspreadsheet extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('Site', 'site');
    }
    // index
    public function index()
    {
        $data = array();
        $data['title'] = 'Import Excel Sheet | TechArise';
        $data['breadcrumbs'] = array('Home' => '#');
        $this->load->view('index', $data);
    }

    // file upload functionality
    public function upload()
    {
        $data = array();
        $data['title'] = 'Import Excel Sheet | TechArise';
        $data['breadcrumbs'] = array('Home' => '#');
        // Load form validation library
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
        if ($this->form_validation->run() == false) {

            $this->load->view('index', $data);
        } else {
            // If file uploaded
            if (!empty($_FILES['fileURL']['name'])) {
                // get file extension
                $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

                if ($extension == 'csv') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif ($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }
                // file path
                $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                // array Count
                $arrayCount = count($allDataInSheet);
                $flag = 0;
                $createArray = array('name', 'date', 'clock_in', 'clock_out', 'late',);
                $makeArray = array('name' => 'name', 'date' => 'date', 'clock_in' => 'clock_in', 'clock_out' => 'clock_out', 'late' => 'late',);
                foreach ($allDataInSheet as $dataInSheet) {
                    foreach ($dataInSheet as $key => $value) {
                        if (in_array(trim($value), $createArray)) {
                            $value = preg_replace('/\s+/', '', $value);
                            $SheetDataKey[trim($value)] = $key;
                        }
                    }
                }
                $dataDiff = array_diff_key($makeArray, $SheetDataKey);
                if (empty($dataDiff)) {
                    $flag = 1;
                }
                // match excel sheet column
                if ($flag == 1) {
                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $addresses = array();
                        $name = $SheetDataKey['name'];
                        $date = $SheetDataKey['date'];
                        $clock_in = $SheetDataKey['clock_in'];
                        $clock_out = $SheetDataKey['clock_out'];
                        $late = $SheetDataKey['late'];

                        $name = filter_var(trim($allDataInSheet[$i][$name]), FILTER_SANITIZE_STRING);
                        $date = filter_var(trim($allDataInSheet[$i][$date]), FILTER_SANITIZE_STRING);
                        $clock_in = filter_var(trim($allDataInSheet[$i][$clock_in]), FILTER_SANITIZE_STRING);
                        $clock_out = filter_var(trim($allDataInSheet[$i][$clock_out]), FILTER_SANITIZE_STRING);
                        $late = filter_var(trim($allDataInSheet[$i][$late]), FILTER_SANITIZE_STRING);
                        $fetchData[] = array('name' => $name, 'date' => $date, 'clock_in' => $clock_in, 'clock_out' => $clock_out, 'late' => $late,);
                    }
                    $data['dataInfo'] = $fetchData;
                    $this->site->setBatchImport($fetchData);
                    $this->site->importData();
                } else {
                    echo "Please import correct file, did not match excel sheet column";
                }
                $this->load->view('display', $data);
            }
        }
    }

    // checkFileValidation
    public function checkFileValidation($string)
    {
        $file_mimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );
        if (isset($_FILES['fileURL']['name'])) {
            $arr_file = explode('.', $_FILES['fileURL']['name']);
            $extension = end($arr_file);
            if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)) {
                return true;
            } else {
                $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
                return false;
            }
        } else {
            $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
            return false;
        }
    }
}
