<?php


namespace App\Services\Impl;

use App\DTO\OrderDetailsDto;
use App\Repository\Impl\MenuItemRepo;
use App\Repository\Impl\OrderRepo;
use App\Repository\IOrderDetailsRepo;
use App\Services\IOrderDetailsService;

class OrderDetailsService implements IOrderDetailsService
{
    protected IOrderDetailsRepo $orderDetailsRepo;
    protected OrderRepo $orderRepo;
    protected MenuItemRepo $itemRepo;

    public function __construct(
        IOrderDetailsRepo $orderDetailsRepo,
        OrderRepo $orderRepo,
        MenuItemRepo $itemRepo
    )
    {
        $this->orderDetailsRepo = $orderDetailsRepo;
        $this->orderRepo = $orderRepo;
        $this->itemRepo = $itemRepo;
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

//        $order = $this->orderRepo->create($orderDetailsDto);

        $itemIds = $orderDetailsDto->getItemId();
        foreach ($itemIds as $itemId) {
            $menuItem = $this->itemRepo->find($itemId);
            dump($menuItem);
        }

        //return $order;
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

