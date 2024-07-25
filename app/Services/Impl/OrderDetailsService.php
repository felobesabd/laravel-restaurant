<?php


namespace App\Services\Impl;

use App\DTO\OrderDetailsDto;
use App\Repository\IOrderDetailsRepo;
use App\Services\IOrderDetailsService;

class OrderDetailsService implements IOrderDetailsService
{
    protected IOrderDetailsRepo $orderDetailsRepo;

    public function __construct(IOrderDetailsRepo $orderDetailsRepo)
    {
        $this->orderDetailsRepo = $orderDetailsRepo;
    }

    public function getOrdersDetails()
    {
        return $this->orderDetailsRepo->all();
    }

    public function getOrderDetails($id)
    {
        return $this->orderDetailsRepo->find($id);
    }

    public function createOrderDetails(OrderDetailsDto $orderDetailsDto)
    {
        return $this->orderDetailsRepo->create($orderDetailsDto);
    }

    public function updateOrderDetails($id, OrderDetailsDto $orderDetailsDto)
    {
        return $this->orderDetailsRepo->update($id, $orderDetailsDto);
    }

    public function deleteOrderDetails($id)
    {
        return $this->orderDetailsRepo->delete($id);
    }
}

