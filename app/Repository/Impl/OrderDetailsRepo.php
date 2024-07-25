<?php

namespace App\Repository\Impl;

use App\DTO\OrderDetailsDto;
use App\Models\OrderDetails;
use App\Repository\IOrderDetailsRepo;

class OrderDetailsRepo implements IOrderDetailsRepo
{
    public function all()
    {
        return OrderDetails::get();
    }

    public function find($id)
    {
        return OrderDetails::where('id', $id)->first();
    }

    public function create(OrderDetailsDto $orderDetailsDto)
    {
        return OrderDetails::create([
            'order_id' => $orderDetailsDto->getOrderId(),
            'item_id' => $orderDetailsDto->getItemId(),
            'quantity' => $orderDetailsDto->getQuantity(),
            'price' => $orderDetailsDto->getPrice(),
        ]);
    }

    public function update($id, OrderDetailsDto $orderDetailsDto)
    {
        $orderDetails = $this->find($id);
        $orderDetails->update($orderDetailsDto);
        return $orderDetails;
    }

    public function delete($id)
    {
        $orderDetails = $this->find($id);
        return $orderDetails->delete();
    }
}
