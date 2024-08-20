<?php

namespace App\Interfaces;

interface DataLoaderInterface
{
    public function parse(string $source): PersonDataInterface;
}