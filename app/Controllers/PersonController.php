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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_csv'], $_POST['female_csv'], $_POST['male_csv'])) {
            if ((int)$_POST['action_csv'] === 1) {
                $years = $this->personService->getPersonOverview($_POST['female_csv'], $_POST['male_csv']);
            } elseif ((int)$_POST['action_csv'] === 2) {
                $both_awards = $this->personService->getFilmsWithBothAwards($_POST['female_csv'], $_POST['male_csv']);
            }
        }
        include __DIR__ . '/../../public/views/template.php';
    }
}