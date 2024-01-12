<?php

namespace App\Supports\Interfaces;

interface MapperInterface
{
    public function toPersistence(array $data): array;
}
