<?php

namespace App\Repository;

use App\Model\Person;

interface PersonRepositoryInterface
{
    public function save(Person $person): void;

    public function findAllByType(string $type): array;
}
