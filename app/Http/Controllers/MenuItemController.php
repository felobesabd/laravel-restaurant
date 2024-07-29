<?php

namespace App\Http\Controllers;

use App\Services\IMenuItemService;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    protected IMenuItemService $iMenuItemService;

    public function __construct(
        IMenuItemService $iMenuItemService
    )
    {
       $this->iMenuItemService = $iMenuItemService;
    }

    public function index()
    {
        $menuItems = $this->iMenuItemService->getItems();
        return view('cashier.index', compact('menuItems'));
    }

    public function itemSearch(Request $request)
    {
        $menuItems = $this->iMenuItemService->itemSearch($request->search);
        return $menuItems;
    }
}
