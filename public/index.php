<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\PersonController;

$controller = new PersonController();
$controller->handleRequest();
