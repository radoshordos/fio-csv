<?php

namespace App\Services;

class CsvParser implements CsvParserInterface
{
    public function parse(string $csvPath): PersonData
    {
        $data = new PersonData();
        if (($handle = fopen($csvPath, 'rb')) !== FALSE) {
            fgetcsv($handle); // Skip header
            while (($row = fgetcsv($handle)) !== FALSE) {
                $data->addEntry(new PersonEntry($row[0], $row[1], $row[2], $row[3], $row[4]));
            }
            fclose($handle);
        }
        return $data;
    }
}