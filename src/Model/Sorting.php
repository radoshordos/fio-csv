<?php

namespace Model;

class Sorting
{
    protected array $oscarsByYearMale;
    protected array $oscarsByYearFemale;

    public function __construct(
        public array $male,
        public array $female,
    )
    {
        $this->oscarsByYearMale = $this->oscarsByYear($this->male);
        $this->oscarsByYearFemale = $this->oscarsByYear($this->female);
    }

    public function oscarsByYear(array $person): array
    {
        $oscarsByYear = [];

        /* @var $person Person */
        foreach ($person as $p) {
            $oscarsByYear[$p->year] = [
                'name'     => $p->name,
                'year'     => $p->year,
                'age'      => $p->age,
                'movie'    => $p->movie,
                'fullname' => $p->getFullNameWithAge()
            ];
        }
        return $oscarsByYear;
    }

    public function filmsWithBothAwards(): array
    {
        $filmsWithBothAwards = [];

        /* @var $male Person */
        foreach ($this->male as $male) {
            if (isset($this->oscarsByYearFemale[$male->year]) && $this->oscarsByYearFemale[$male->year]['movie'] === $male->movie) {
                $filmsWithBothAwards[] = [
                    'movie'  => $male->movie,
                    'year'   => $male->year,
                    'female' => $this->oscarsByYearFemale[$male->year]['name'],
                    'male'   => $male->name
                ];
            }
        }

        usort($filmsWithBothAwards, static function ($a, $b) {
            return strcmp($a['movie'], $b['movie']);
        });

        return $filmsWithBothAwards;
    }

    public function getOscarsByYearMale(): array
    {
        return $this->oscarsByYearMale;
    }

    public function getOscarsByYearFemale(): array
    {
        return $this->oscarsByYearFemale;
    }
}