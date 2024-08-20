<?php

namespace App\Services;

use App\Interfaces\DataLoaderInterface;
use App\Models\PersonData;
use App\Models\PersonEntry;

class CsvLoader implements DataLoaderInterface
{
    public const string SOURCE_URL = 'https://people.sc.fsu.edu/~jburkardt/data/csv/';

    public const string MALE_FILE = 'oscar_age_female.csv';
    public const string FEMALE_FILE = 'oscar_age_male.csv';

    public function parse(string $source): PersonData
    {
        $data = new PersonData();
        if (($handle = fopen(self::SOURCE_URL . $source, 'rb')) !== false) {
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