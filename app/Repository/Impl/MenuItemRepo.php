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
}
