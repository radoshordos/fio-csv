<?php

namespace App\Models;

use App\Interfaces\PersonDataInterface;
use App\Interfaces\PersonEntryInterface;

class PersonData implements PersonDataInterface
{
    public array $entries = [];

    public function addEntry(PersonEntryInterface $entry): void
    {
        $this->entries[] = $entry;
    }

    public function getEntriesByYear(): array
    {
        usort($this->entries, static fn($a, $b) => $a->getYear() <=> $b->getYear() ?: strcmp($a->getMovie(), $b->getMovie()));
        return $this->entries;
    }

    public function getFilmsWithBothAwards(): array
    {
        $films = [];
        /* @var $entry PersonEntry */
        foreach ($this->entries as $entry) {
            $film = $entry->getMovie();
            if (!isset($films[$film])) {
                $films[$film] = [$entry];
            } else {
                $films[$film][] = $entry;
            }
        }
        return array_filter($films, static fn($entries) => count($entries) > 1);
    }
}