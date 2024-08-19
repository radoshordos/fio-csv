<?php

namespace App\Services;

class PersonService implements PersonServiceInterface {
    private CsvParserInterface $csvParser;

    public function __construct() {
        $this->csvParser = new CsvParser();
    }

    public function getPersonOverview(string $femaleCsv, string $maleCsv): array {
        $femaleData = $this->csvParser->parse($femaleCsv);
        $maleData = $this->csvParser->parse($maleCsv);

        $overview = [];
        foreach ($femaleData->getEntriesByYear() as $entry) {
            $overview[$entry->year]['female'] = $entry;
        }
        foreach ($maleData->getEntriesByYear() as $entry) {
            $overview[$entry->year]['male'] = $entry;
        }
        return $overview;
    }

    public function getFilmsWithBothAwards(string $femaleCsv, string $maleCsv): array {
        $femaleData = $this->csvParser->parse($femaleCsv);
        $maleData = $this->csvParser->parse($maleCsv);

        $combinedData = new PersonData();
        foreach ($femaleData->entries as $entry) {
            $combinedData->addEntry($entry);
        }
        foreach ($maleData->entries as $entry) {
            $combinedData->addEntry($entry);
        }
        return $combinedData->getFilmsWithBothAwards();
    }
}