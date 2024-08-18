<?php

namespace App\Services;

use App\Model\Person;
use App\Repository\PersonRepositoryInterface;

class PersonService implements PersonServiceInterface
{
    private PersonRepositoryInterface $personRepository;

    /**
     * PersonService constructor.
     *
     * @param PersonRepositoryInterface $personRepository
     */
    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * Načte data osob z CSV souborů a vrátí přehled ocenění podle roku.
     *
     * @param array $femaleData Data pro ženy.
     * @param array $maleData Data pro muže.
     * @return array Přehled ocenění podle roku.
     */
    public function getAwardsByYear(array $femaleData, array $maleData): array
    {
        $awardsByYear = [];

        foreach ($femaleData as $female) {
            $year = $female['year'];
            $person = new Person($female['name'], $female['age'], $female['movie']);
            if (!isset($awardsByYear[$year])) {
                $awardsByYear[$year] = ['female' => $person, 'male' => null];
            } else {
                $awardsByYear[$year]['female'] = $person;
            }
        }

        foreach ($maleData as $male) {
            $year = $male['year'];
            $person = new Person($male['name'], $male['age'], $male['movie']);
            if (!isset($awardsByYear[$year])) {
                $awardsByYear[$year] = ['female' => null, 'male' => $person];
            } else {
                $awardsByYear[$year]['male'] = $person;
            }
        }

        return $awardsByYear;
    }

    /**
     * Vrátí seznam filmů, které získaly oscary za mužskou i ženskou hlavní roli.
     *
     * @param array $femaleData Data pro ženy.
     * @param array $maleData Data pro muže.
     * @return array Seznam filmů s oceněními.
     */
    public function getFilmsWithBothRoles(array $femaleData, array $maleData): array
    {
        $femaleFilms = [];
        $maleFilms = [];

        foreach ($femaleData as $female) {
            $femaleFilms[$female['movie']] = ['year' => $female['year'], 'actress' => $female['name']];
        }

        foreach ($maleData as $male) {
            if (isset($femaleFilms[$male['movie']]) && $femaleFilms[$male['movie']]['year'] === $male['year']) {
                $maleFilms[$male['movie']] = [
                    'year' => $male['year'],
                    'actress' => $femaleFilms[$male['movie']]['actress'],
                    'actor' => $male['name']
                ];
            }
        }

        // Seřazení podle názvu filmu
        ksort($maleFilms);

        return array_map(
            function ($film, $details) {
                return [
                    'movie' => $film,
                    'year' => $details['year'],
                    'actress' => $details['actress'],
                    'actor' => $details['actor']
                ];
            },
            array_keys($maleFilms),
            $maleFilms
        );
    }
}
