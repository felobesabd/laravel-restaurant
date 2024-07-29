<?php


namespace App\Services\Impl;

use App\DTO\OrderDetailsDto;
use App\Repository\IClientRepo;
use App\Repository\IMenuItemRepo;
use App\Repository\IOrderDetailsRepo;
use App\Repository\IOrderRepo;
use App\Services\IOrderDetailsService;
use Illuminate\Support\Facades\DB;

class OrderDetailsService implements IOrderDetailsService
{
    protected IOrderDetailsRepo $orderDetailsRepo;
    protected IOrderRepo $orderRepo;
    protected IMenuItemRepo $itemRepo;
    protected IClientRepo $clientRepo;

    public function __construct(
        IOrderDetailsRepo $orderDetailsRepo,
        IOrderRepo $orderRepo,
        IMenuItemRepo $itemRepo,
        IClientRepo $clientRepo
    )
    {
        $this->orderDetailsRepo = $orderDetailsRepo;
        $this->orderRepo = $orderRepo;
        $this->itemRepo = $itemRepo;
        $this->clientRepo = $clientRepo;
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
        DB::beginTransaction();
        // create order, add order to Dto and get him from Dto
        $order = $this->orderRepo->create($orderDetailsDto);
        $orderDetailsDto->setOrderId($order->id);
        $order_id = $orderDetailsDto->getOrderId();

        // get client by phone, get phone from Dto
        $phone = $orderDetailsDto->getPhone();
        $client = $this->clientRepo->find($phone);
        $orderDetailsDto->setClientId($client->id);

        // get itemIds from Dto, get MenuItems by itemIds, loop on MenuItems => (get prices)
        $itemIds = $orderDetailsDto->getItemId();

        //implement one query using whereIn
        foreach ($itemIds as $itemId) {
            $menuItems[] = $this->itemRepo->find($itemId);
        }
        foreach ($menuItems as $menuItem) {
            foreach ($menuItem as $item) {
                if (isset($item['price'])) {
                    $prices[] = $item['price'];
                }
            }
        }

        $orderDetails = $this->orderDetailsRepo->create($orderDetailsDto, $prices);
        $totalPrice = $this->orderDetailsRepo->getTotalPrice($order_id);
        $orderDetailsDto->setTotalPrice($totalPrice);

        $updateTotalPrice = $this->orderRepo->update($order_id, $orderDetailsDto);

        DB::commit();
        return [
            'orders' => $orderDetails,
            'totalPrice' => $totalPrice
        ];
    }
}

