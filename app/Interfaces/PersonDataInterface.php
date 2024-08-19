<?php

namespace App\Interfaces;

interface PersonDataInterface
{
    public function addEntry(PersonEntryInterface $entry): void;

    public function getEntriesByYear(): array;

    public function getFilmsWithBothAwards(): array;
}