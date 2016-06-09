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
                if(!$header) {
                    $header = $row;

                    // clean the headers
                    $header = str_replace('"', '', $header);
                    $header = preg_replace('/[^A-Za-z0-9\-]/', '', $header);
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
