<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once '..libraries/PHPExcel/Classes/PHPExcel';
class Excel_import extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('excel_import_model');
        $this->load->library('excel');
    }

    public function index() {
        $this->load->view('excel_import');
    }

    public function fetch() {
        $data = $this->excel_import_model->select();
        $output = ' <table class="table table-bordered" width="100%" cellspacing="0">
                        <tr>
                            <th>NAMA</th>
                            <th>GENDER</th>
                            <th>SEMESTER</th>
                            <th>ANGKATAN</th>
                            <th>PROGRAM STUDI</th>
                            <th>PEMINATAN</th>
                        </tr>
                ';
     
        foreach($data->result() as $row) {
            $output .= '
                <tr>
                    <td>'.$row->nama.'</td>
                    <td>'.$row->gender.'</td>
                    <td>'.$row->semester.'</td>
                    <td>'.$row->angkatan.'</td>
                    <td>'.$row->program_studi.'</td>
                    <td>'.$row->peminatan.'</td>
                </tr>
                ';
        }
        $output .= '</table> <i><h5 align="left" style="color:grey;">Total Mahasiswa: '.$data->num_rows().'</h5></i>';
        echo $output;
    }

    public function import() {
        if(isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                
                for($row=2; $row<=$highestRow; $row++) {
                    $nama           = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $gender         = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $semester       = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $angkatan       = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $program_studi  = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $peminatan      = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                    $data[] = array(
                        'nama'          => $nama,
                        'gender'        => $gender,
                        'semester'      => $semester,
                        'angkatan'      => $angkatan,
                        'program_studi' => $program_studi,
                        'peminatan'     => $peminatan
                    );
                }
            }
                $this->excel_import_model->insert($data);
                echo 'Data berhasil di import';
        }
    }
}
?>