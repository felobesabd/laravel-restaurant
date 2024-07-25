<?php


namespace App\Repository;

use App\DTO\OrderDetailsDto;

interface IOrderDetailsRepo
{
    public function all();
    public function find($id);
    public function create(OrderDetailsDto $orderDetailsDto);
    public function update($id, OrderDetailsDto $orderDetailsDto);
    public function delete($id);
}
