<?php

namespace App\Controllers;

use App\Interfaces\CsvHandlerInterface;
use App\Interfaces\PersonDataProcessorInterface;

class PersonController
{
    private CsvHandlerInterface $csvHandler;
    private PersonDataProcessorInterface $dataProcessor;

    public function __construct(CsvHandlerInterface $csvHandler, PersonDataProcessorInterface $dataProcessor)
    {
        $this->csvHandler = $csvHandler;
        $this->dataProcessor = $dataProcessor;
    }

    public function showForm(): void
    {
        include __DIR__ . '/../../templates/header.php';
        include __DIR__ . '/../../templates/overview.php';
        include __DIR__ . '/../../templates/footer.php';
    }

    public function handleUpload(): void
    {
        if (isset($_FILES['female_file'], $_FILES['male_file'])) {
            $femaleData = $this->csvHandler->processUpload($_FILES['female_file']);
            $maleData = $this->csvHandler->processUpload($_FILES['male_file']);

            if ($femaleData && $maleData) {
                $personData = $this->dataProcessor->processPersonData($femaleData, $maleData);

                include __DIR__ . '/../../templates/header.php';
                include __DIR__ . '/../../templates/overview.php';
                include __DIR__ . '/../../templates/footer.php';
            } else {
                $_SESSION['error'] = 'Chyba při zpracování souborů. Ujistěte se, že jste nahráli platné CSV soubory.';
                $this->showForm();
            }
        } else {
            $_SESSION['error'] = 'Prosím, nahrajte oba CSV soubory.';
            $this->showForm();
        }
    }
}