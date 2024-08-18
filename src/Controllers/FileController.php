<?php

namespace App\Controller;

use App\Services\CsvParserInterface;
use App\Services\PersonServiceInterface;

class FileController
{
    private CsvParserInterface $csvParser;
    private PersonServiceInterface $personService;

    /**
     * FileController constructor.
     *
     * @param CsvParserInterface $csvParser
     * @param PersonServiceInterface $personService
     */
    public function __construct(CsvParserInterface $csvParser, PersonServiceInterface $personService)
    {
        $this->csvParser = $csvParser;
        $this->personService = $personService;
    }

    /**
     * Zpracovává příchozí požadavek a zobrazuje výsledky.
     */
    public function handleRequest(): void
    {
        $femaleData = [];
        $maleData = [];

        // Zpracování uploadu souborů přes POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['female_csv']) && isset($_FILES['male_csv'])) {
            $femaleFile = $_FILES['female_csv']['tmp_name'];
            $maleFile = $_FILES['male_csv']['tmp_name'];

            // Načtení CSV dat z nahraných souborů
            $femaleData = $this->csvParser->parse($femaleFile);
            $maleData = $this->csvParser->parse($maleFile);
        }

        // Zpracování dat pomocí služby PersonService
        $awardsByYear = $this->personService->getAwardsByYear($femaleData, $maleData);
        $filmsWithBothRoles = $this->personService->getFilmsWithBothRoles($femaleData, $maleData);

        // Zobrazení výsledků
        include __DIR__ . '/../views/results.php';
    }
}
