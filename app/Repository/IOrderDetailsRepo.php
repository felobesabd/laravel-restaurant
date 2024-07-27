<?php


namespace App\Repository;

use App\DTO\OrderDetailsDto;

interface IOrderDetailsRepo
{
    public function all();
    public function find($id);
    public function create(OrderDetailsDto $orderDetailsDto, $prices);
    public function update($id, OrderDetailsDto $orderDetailsDto);
    public function delete($id);
    public function getTotalPrice($orderId);
}
