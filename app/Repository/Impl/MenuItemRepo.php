<?php

namespace App\Repository\Impl;

use App\Models\MenuItem;
use App\Repository\IMenuItemRepo;

class MenuItemRepo implements IMenuItemRepo
{
    public function all()
    {
        return MenuItem::all();
    }

    public function search($search)
    {
        return MenuItem::where('name', 'LIKE', "%{$search}%")->get();
    }

    public function find($itemId)
    {
        return MenuItem::where('id', $itemId)->get();
    }
}
