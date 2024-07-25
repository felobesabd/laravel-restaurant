<?php

namespace App\Services;

use App\DTO\OrderDetailsDto;

interface IOrderDetailsService
{
    public function getOrdersDetails();

    public function getOrderDetails($id);

    public function createOrderDetails(OrderDetailsDto $orderDetailsDto);

    public function updateOrderDetails($id, OrderDetailsDto $orderDetailsDto);

    public function deleteOrderDetails($id);
}
