<?php

namespace App\Services;

interface PersonServiceInterface
{
    public function getPersonOverview(string $femaleCsv, string $maleCsv): array;

    public function getFilmsWithBothAwards(string $femaleCsv, string $maleCsv): array;
}