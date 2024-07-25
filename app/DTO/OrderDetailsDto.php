<?php

namespace App\DTO;

class OrderDetailsDto
{
    private string $phone;
    private int $TotalPrice;
    private int $orderId;
    private int $itemId;
    private int $quantity;
    private int $price;


    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function getTotalPrice(): int
    {
        return $this->TotalPrice;
    }

    public function setTotalPrice(int $TotalPrice): self
    {
        $this->TotalPrice = $TotalPrice;
        return $this;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function setItemId(int $itemId): self
    {
        $this->itemId = $itemId;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): self
    {
        $this->quantity = intval($quantity);
        return $this;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;
        return $this;
    }
}
