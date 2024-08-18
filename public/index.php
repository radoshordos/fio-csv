<?php

// Načte Composer autoloading
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\FileController;
use App\Services\CsvParser;
use App\Services\PersonService;
use App\Repository\PersonRepository;



// Inicializace služeb a repository
$csvParser = new CsvParser();
$personRepository = new PersonRepository();
$personService = new PersonService($personRepository);

// Vytvoření kontroleru
$fileController = new FileController($csvParser, $personService);

// Zpracování požadavku
$fileController->handleRequest();
