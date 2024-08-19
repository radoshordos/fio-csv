<?php

namespace App\Services;

use App\Interfaces\CsvParserInterface;
use App\Models\PersonData;
use App\Models\PersonEntry;

class CsvParser implements CsvParserInterface
{
    public function parse(string $csvPath): PersonData
    {
        $data = new PersonData();
        if (($handle = fopen($csvPath, 'rb')) !== false) {
            fgetcsv($handle);
            while (($row = fgetcsv($handle)) !== false) {
                if (!is_null($row[0])) {
                    $data->addEntry(new PersonEntry($row[0], $row[1], $row[2], $row[3], $row[4]));
                }
            }
            fclose($handle);
        }
        return $data;
    }
}