<?php

namespace App\Repository\Impl;

use App\DTO\OrderDetailsDto;
use App\Models\Order;
use App\Repository\IOrderRepo;

class OrderRepo implements IOrderRepo
{
    public function find($id)
    {
        return Order::where('id', $id)->first();
    }

    public function create(OrderDetailsDto $orderDto)
    {
        return Order::create([
            'phone' => $orderDto->getPhone(),
            'total_price' => 0.00,
        ]);
    }

    public function update($id, OrderDetailsDto $orderDto)
    {
        $order = $this->find($id);
        $order->update([
            'phone' => $orderDto->getPhone(),
            'total_price' => $orderDto->getTotalPrice(),
        ]);
        return $order;
    }
}
