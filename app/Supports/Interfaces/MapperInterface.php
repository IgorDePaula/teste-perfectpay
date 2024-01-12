<?php

namespace App\Supports\Interfaces;

use App\Dtos\AbstractDto;

interface MapperInterface
{
    public function toDomain(array $data): AbstractDto;
}
