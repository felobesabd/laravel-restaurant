<?php


namespace App\Repository;

use App\DTO\OrderDetailsDto;

interface IClientRepo
{
    public function find($phone);
}
