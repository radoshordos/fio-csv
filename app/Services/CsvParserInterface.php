<?php

namespace App\Services;

interface CsvParserInterface
{
    public function parse(string $csvPath): PersonDataInterface;
}