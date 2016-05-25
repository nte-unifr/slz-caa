<?php

namespace AppBundle\Services;

class ConvertCsvToArray {

    public function __construct()
    {

    }

    public function convert($file)
    {
        if(!file_exists($file) || !is_readable($file)) {
            return false;
        }

        $header = NULL;
        $data = array();

        if (($handle = fopen($file, 'r')) !== false) {
            while (($row = fgetcsv($handle)) !== false) {
                $row = array_map("utf8_encode", $row);
                if(!$header) {
                    $header = $row;
                }
                else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }
        return $data;
    }
}
