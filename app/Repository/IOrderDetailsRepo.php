<?php


namespace App\Repository;

use App\DTO\OrderDetailsDto;

interface IOrderDetailsRepo
{
    public function all();
    public function find($id);
    public function create(OrderDetailsDto $orderDetailsDto, $prices);
    public function getTotalPrice($orderId);
}
