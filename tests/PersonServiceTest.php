<?php

use PHPUnit\Framework\TestCase;
use Src\Services\PersonService;

class PersonServiceTest extends TestCase {
    private PersonService $personService;

    protected function setUp(): void {
        $this->personService = new PersonService();
    }

    public function testGetPersonOverview(): void {
        $overview = $this->personService->getPersonOverview('path/to/female.csv', 'path/to/male.csv');
        $this->assertIsArray($overview);
        $this->assertArrayHasKey(2021, $overview);
        $this->assertArrayHasKey('female', $overview[2021]);
        $this->assertArrayHasKey('male', $overview[2021]);
    }

    public function testGetFilmsWithBothAwards(): void {
        $films = $this->personService->getFilmsWithBothAwards('path/to/female.csv', 'path/to/male.csv');
        $this->assertIsArray($films);
        $this->assertArrayHasKey('The Silence of the Lambs', $films);
    }
}
