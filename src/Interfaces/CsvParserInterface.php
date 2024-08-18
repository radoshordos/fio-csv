<?php

namespace App\Interfaces;

interface CsvParserInterface
{
    public function parseCsv(string $filePath): array;
}