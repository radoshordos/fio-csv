<?php

namespace App\Interfaces;

interface CsvParserInterface
{
    public function parse(string $csvPath): PersonDataInterface;
}