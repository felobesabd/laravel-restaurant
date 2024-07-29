<?php


namespace App\Repository;

use App\DTO\OrderDetailsDto;

interface IOrderRepo
{
    public function find($id);
    public function create(OrderDetailsDto $orderDto);
    public function update($id, OrderDetailsDto $orderDto);
}
