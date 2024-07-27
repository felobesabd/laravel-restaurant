<?php

namespace App\DTO;

class OrderDetailsDto
{
    private string $phone;
    private int $TotalPrice;
    private int $orderId;
    private int $clientId;
    private array $itemId;
    private array $quantity;

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
        $this->TotalPrice = intval($TotalPrice);
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

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;
        return $this;
    }

    public function getItemId(): array
    {
        return $this->itemId;
    }

    public function setItemId(array $itemId): self
    {
        $this->itemId = $itemId;
        return $this;
    }

    public function getQuantity(): array
    {
        return $this->quantity;
    }

    public function setQuantity(array $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }
}
