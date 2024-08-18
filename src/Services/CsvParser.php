<?php

namespace App\Services;

class CsvParser implements CsvParserInterface
{
    public function parse(string $url): array
    {
        $data = [];
        if (($handle = fopen($url, 'rb')) !== false) {
            $header = fgetcsv($handle);
            while (($row = fgetcsv($handle)) !== false) {
                $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }
}
