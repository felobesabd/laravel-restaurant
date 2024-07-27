<?php

namespace App\Http\Controllers;

use App\Repository\Impl\MenuItemRepo;

class MenuItemController extends Controller
{
    protected MenuItemRepo $menuItemRepo;

    public function __construct(
        MenuItemRepo $menuItemRepo
    )
    {
       $this->menuItemRepo = $menuItemRepo;
    }

    public function getItemsBySearch($search)
    {
        return $search;
        $menuItems = $this->menuItemRepo->search($search);
        return view('cashier.index', compact('menuItems'));
    }
}
