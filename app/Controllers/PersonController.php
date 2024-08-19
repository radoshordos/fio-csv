<?php

namespace App\Controllers;

use App\Interfaces\PersonServiceInterface;
use App\Services\PersonService;

class PersonController
{
    private PersonServiceInterface $personService;

    public function __construct()
    {
        $this->personService = new PersonService();
    }

    public function handleRequest(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['female_csv'], $_FILES['male_csv'])) {
            $femaleCsv = $_FILES['female_csv']['tmp_name'];
            $maleCsv = $_FILES['male_csv']['tmp_name'];

            $overview = $this->personService->getPersonOverview($femaleCsv, $maleCsv);
            $films = $this->personService->getFilmsWithBothAwards($femaleCsv, $maleCsv);

            include __DIR__ . '/../../public/views/overview.php';
            include __DIR__ . '/../../public/views/films.php';
        } else {
            include __DIR__ . '/../../public/views/upload_form.php';
        }
    }
}