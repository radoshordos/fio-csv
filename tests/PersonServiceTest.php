<?php

use App\Enums\Gender;
use App\Services\CsvLoader;
use App\Services\PersonService;
use PHPUnit\Framework\TestCase;

class PersonServiceTest extends TestCase {
    private PersonService $personService;

    protected function setUp(): void {
        $this->personService = new PersonService();
    }

    public function testGetPersonOverview(): void {
        $overview = $this->personService->getPersonOverview(CsvLoader::FEMALE_FILE, CsvLoader::MALE_FILE);
        $this->assertIsArray($overview);
        $this->assertArrayHasKey(2016, $overview);
        $this->assertArrayHasKey(Gender::FEMALE->value, $overview[2016]);
        $this->assertArrayHasKey(Gender::MALE->value, $overview[2016]);
    }

    public function testGetFilmsWithBothAwards(): void {
        $films = $this->personService->getFilmsWithBothAwards(CsvLoader::FEMALE_FILE, CsvLoader::MALE_FILE);
        $this->assertIsArray($films);
        $this->assertArrayHasKey('The Silence of the Lambs', $films);
    }
}
