<?php

namespace App\Models;

class PersonEntry implements PersonEntryInterface
{
    public function __construct(
        public string $index,
        public string $year,
        public string $age,
        public string $name,
        public string $movie,
    )
    {
        $this->index = trim($index);
        $this->year = trim($year);
        $this->age = trim($age);
        $this->name = trim($name);
        $this->movie = trim($movie);
    }

    public function getIndex(): string
    {
        return $this->index;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMovie(): string
    {
        return $this->movie;
    }

    public function getFullNameWithAge(): string
    {
        return $this->name . ' (' . $this->age . ')';
    }
}