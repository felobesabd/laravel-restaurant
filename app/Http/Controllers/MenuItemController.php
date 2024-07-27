<?php

namespace App\Http\Controllers;

use App\Repository\Impl\MenuItemRepo;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    protected MenuItemRepo $menuItemRepo;

    public function __construct(
        MenuItemRepo $menuItemRepo
    )
    {
       $this->menuItemRepo = $menuItemRepo;
    }

    public function itemSearch(Request $request)
    {
        return $menuItems = $this->menuItemRepo->search($request->search);
    }
}
