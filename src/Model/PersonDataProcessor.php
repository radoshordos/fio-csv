<?php

namespace App\Model;

class PersonDataProcessor
{
    protected array $maleOscars;
    protected array $femaleOscars;

    public function __construct(
        public array $maleData,
        public array $femaleData,
    )
    {
        $this->maleOscars = $this->createOscarList($maleData);
        $this->femaleOscars = $this->createOscarList($femaleData);
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

    public function generateMoviesWithBothOscars()
    {
        $movies = [];
        foreach ($this->maleOscars as $maleOscar) {
            foreach ($this->femaleOscars as $femaleOscar) {
                if ($maleOscar->getMovie() == $femaleOscar->getMovie()) {
                    $movies[] = [
                        'movie'  => $maleOscar->getMovie(),
                        'year'   => $maleOscar->getYear(),
                        'male'   => $maleOscar,
                        'female' => $femaleOscar
                    ];
                }
            }
        }
        usort($movies, static function ($a, $b) {
            return strcmp($a['movie'], $b['movie']);
        });
        return $movies;
    }


    public function filmsWithBothAwards(): array
    {
        $filmsWithBothAwards = [];

        /* @var $male Person */
        foreach ($this->male as $male) {
            if (isset($this->oscarsByYearFemale[$male->year]) && $this->oscarsByYearFemale[$male->year]['movie'] === $male->movie) {
                $filmsWithBothAwards[] = [
                    'movie'  => $maleOscar->getMovie(),
                    'year'   => $maleOscar->getYear(),
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


    public function processPersonData(array $femaleData, array $maleData): array
    {
        $personData = [];

        foreach ($femaleData as $femaleRow) {
            $personData[$femaleRow[1]]['female'] = [
                'name' => $femaleRow[3],
                'age' => $femaleRow[2],
                'movie' => $femaleRow[4]];
        }
        foreach ($maleData as $maleRow) {
            $personData[$maleRow[1]]['male'] = [
                'name' => $maleRow[3],
                'age' => $maleRow[2],
                'movie' => $maleRow[4]
            ];
        }

        return $personData;
    }

    public function getMaleOscars(): array
    {
        return $this->oscarsByYearMale;
    }

    public function getOscarsByYearFemale(): array
    {
        return $this->oscarsByYearFemale;
    }
}