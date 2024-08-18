<?php

namespace App\Repository;

use App\Model\Person;
use InvalidArgumentException;

class PersonRepository implements PersonRepositoryInterface
{
    private array $females = [];
    private array $males = [];

    /**
     * Uloží osobu do úložiště.
     *
     * @param Person $person Osoba k uložení.
     */
    public function save(Person $person): void
    {
        $type = $person->getGender(); // Předpokládáme, že osoba má metodu getGender(), která vrací 'female' nebo 'male'.

        if ($type === 'female') {
            $this->females[] = $person;
        } elseif ($type === 'male') {
            $this->males[] = $person;
        } else {
            throw new InvalidArgumentException('Neznámý typ osoby.');
        }
    }

    /**
     * Najde všechny osoby podle typu (muž/žena).
     *
     * @param string $type Typ osoby ('female' nebo 'male').
     * @return Person[] Pole osob.
     */
    public function findAllByType(string $type): array
    {
        if ($type === 'female') {
            return $this->females;
        }

        if ($type === 'male') {
            return $this->males;
        }

        throw new InvalidArgumentException('Neznámý typ osoby.');
    }
}
