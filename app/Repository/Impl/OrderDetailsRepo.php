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

    public function create(OrderDetailsDto $orderDetailsDto, $prices)
    {
        $itemIds = $orderDetailsDto->getItemId();
        $quantities = $orderDetailsDto->getQuantity();

         foreach ($itemIds as $index => $itemId) {
             $orderDetails[] = OrderDetails::create([
                 'order_id' => $orderDetailsDto->getOrderId(),
                 'client_id' => $orderDetailsDto->getClientId(),
                 'item_id' => $itemId,
                 'quantity' => $quantities[$index],
                 'price' => intval($prices[$index] * $quantities[$index]),
             ]);
         }
         return $orderDetails;
    }

    public function getTotalPrice($orderId)
    {
        return $totalPrice = OrderDetails::where('order_id', $orderId)->sum('price');
    }
}
