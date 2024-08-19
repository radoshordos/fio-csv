<?php

namespace App\Models;

interface PersonEntryInterface
{
    public function __construct(int $year, string $name, int $age, string $film);
}