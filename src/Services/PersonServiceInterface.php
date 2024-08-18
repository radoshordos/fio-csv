<?php

namespace App\Services;

use App\Model\Person;

interface PersonServiceInterface
{
    public function getAwardsByYear(array $femaleData, array $maleData): array;

    public function getFilmsWithBothRoles(array $femaleData, array $maleData): array;
}
