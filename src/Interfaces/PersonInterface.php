<?php

namespace App\Interfaces;

interface PersonInterface
{
    public function getIndex(): string;

    public function getYear(): string;

    public function getAge(): string;

    public function getName(): string;

    public function getMovie(): string;
}