<?php

namespace App\Services\Impl;

use App\Repository\IMenuItemRepo;
use App\Services\IMenuItemService;

class MenuItemService implements IMenuItemService
{
    protected IMenuItemRepo $itemRepo;

    public function __construct(
        IMenuItemRepo $itemRepo
    )
    {
        $this->itemRepo = $itemRepo;
    }

    public function getItems()
    {
        return $this->itemRepo->all();
    }

    public function getItem($id)
    {
        return $this->itemRepo->find($id);
    }

    public function itemSearch($search)
    {
        return $this->itemRepo->search($search);
    }
}

