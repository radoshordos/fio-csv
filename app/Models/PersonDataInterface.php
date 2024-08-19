<?php

namespace App\Models;

interface PersonDataInterface
{
    public function addEntry(PersonEntryInterface $entry): void;

    public function getEntriesByYear(): array;

    public function getFilmsWithBothAwards(): array;
}
