<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

require_once './vendor/autoload.php';

class Sheet extends CI_Model {

    public function read($file) {
        try {
            $sheet = IOFactory::load($file);
            return $sheet->getActiveSheet()->toArray(null, true, true, true);
        } catch (Exception $e) {
            throw $e;
        }
    }
}