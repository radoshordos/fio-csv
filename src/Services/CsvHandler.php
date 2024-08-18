<?php

namespace App\Services;

use App\Interfaces\CsvHandlerInterface;

class CsvHandler implements CsvHandlerInterface
{
    public function processUpload(array $file): array
    {
        $data = [];
        if (($handle = fopen($file['tmp_name'], 'rb')) !== false) {
            while (($row = fgetcsv($handle, 1000, ",")) !== false) {
                $data[] = $row;
            }
            fclose($handle);
        }
        return $data;
    }
}


/*

class CsvHandler
{
    public function parseCsv($url) {
        $csvData = [];
        if (($handle = fopen($url, 'rb')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $csvData[] = $data;
            }
            fclose($handle);
        }
        return $csvData;
    }

    public function readCsv(string $str): array
    {
        $arr = [];
        $rows = explode(PHP_EOL, $str);
        $data = array_map('str_getcsv', $rows);
        array_shift($data);
        foreach ($data as $row) {
            if (!is_null($row[0])) {
                $arr[] = new Person($row[0], $row[1], $row[2], $row[3], $row[4]);
            }
        }
        return $arr;
    }
    */
