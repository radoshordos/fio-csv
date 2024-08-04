<?php

namespace Model;

class Person
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

    public function getFullNameWithAge(): string
    {
        return $this->name . ' (' . $this->age . ')';
    }
}
