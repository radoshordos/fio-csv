<?php

namespace App\Interfaces;

interface PersonEntryInterface
{
    public function __construct(string $index, string $year, string $name, string $age, string $film);
}