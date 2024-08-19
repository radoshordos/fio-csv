<?php

namespace App\Models;

class PersonData implements PersonDataInterface
{
    public array $entries = [];

    public function addEntry(PersonEntryInterface $entry): void
    {
        $this->entries[] = $entry;
    }

    public function getEntriesByYear(): array
    {
        usort($this->entries, static fn($a, $b) => $a->year <=> $b->year);
        return $this->entries;
    }

    public function getFilmsWithBothAwards(): array
    {
        $films = [];
        foreach ($this->entries as $entry) {
            $film = $entry->film;
            if (!isset($films[$film])) {
                $films[$film] = [$entry];
            } else {
                $films[$film][] = $entry;
            }
        }
        return array_filter($films, static fn($entries) => count($entries) > 1);
    }
}