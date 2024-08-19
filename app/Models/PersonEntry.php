<?php

namespace App\Models;

use App\Interfaces\PersonEntryInterface;

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

    public function getFullNameWithAgeAndMovie(): string
    {
        return $this->getName() . ' (' . $this->getAge() . ')<br />' . $this->getMovie();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function getMovie(): string
    {
        return $this->movie;
    }
}