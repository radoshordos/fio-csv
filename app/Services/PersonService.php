<?php

namespace App\Services;

use App\Enums\Gender;
use App\Interfaces\DataLoaderInterface;
use App\Interfaces\PersonServiceInterface;
use App\Models\PersonData;

class PersonService implements PersonServiceInterface
{
    private DataLoaderInterface $csvParser;

    public function __construct()
    {
        $this->csvParser = new CsvLoader();
    }

    public function getPersonOverview(string $femaleCsv, string $maleCsv): array
    {
        $femaleData = $this->csvParser->parse($femaleCsv);
        $maleData = $this->csvParser->parse($maleCsv);

        $overview = [];
        foreach ($femaleData->getEntriesByYear() as $entry) {
            $overview[$entry->year][Gender::FEMALE->value] = $entry;
        }
        foreach ($maleData->getEntriesByYear() as $entry) {
            $overview[$entry->year][Gender::MALE->value] = $entry;
        }
        return $overview;
    }

    public function getFilmsWithBothAwards(string $femaleCsv, string $maleCsv): array
    {
        $femaleData = $this->csvParser->parse($femaleCsv);
        $maleData = $this->csvParser->parse($maleCsv);

        $combinedData = new PersonData();
        foreach ($femaleData->entries as $entry) {
            $combinedData->addEntry($entry);
        }
        foreach ($maleData->entries as $entry) {
            $combinedData->addEntry($entry);
        }
        $combined = $combinedData->getFilmsWithBothAwards();
        ksort($combined);
        return $combined;
    }
}