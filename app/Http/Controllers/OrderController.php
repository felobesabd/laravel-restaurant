<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Repository\Impl\MenuItemRepo;
use App\Services\Impl\OrderDetailsService;

class OrderController extends Controller
{
    protected OrderDetailsService $orderDetailsService;
    protected MenuItemRepo $menuItemRepo;

    public function __construct(
        OrderDetailsService $orderDetailsService,
        MenuItemRepo $menuItemRepo
    )
    {
       $this->orderDetailsService = $orderDetailsService;
       $this->menuItemRepo = $menuItemRepo;
    }

    public function index()
    {
        $menuItems = $this->menuItemRepo->all();
        return view('cashier.index', compact('menuItems'));
    }

    public function create()
    {
        $menuItems = $this->menuItemRepo->all();
        return view('order.create', compact('menuItems'));
    }

    public function store(OrderRequest $request)
    {
        $order = $this->orderDetailsService->createOrderDetails($request->getDto());
        return $order;
    }
//
//    public function show($id)
//    {
//        $menuItem = $this->menuItemService->find($id);
//        return view('menu_items.show', compact('menuItem'));
//    }
//
//    public function edit($id)
//    {
//        $menuItem = $this->menuItemService->find($id);
//        return view('menu_items.edit', compact('menuItem'));
//    }
//
//    public function update(Request $request, $id)
//    {
//        $data = $request->validate([
//            'name' => 'required|string|max:255',
//            'price' => 'required|numeric',
//            'description' => 'nullable|string',
//            'category_id' => 'required|integer|exists:categories,id',
//        ]);
//
//        $this->menuItemService->update($id, $data);
//        return redirect()->route('menu-items.index')->with('success', 'Menu item updated successfully.');
//    }
//
//    public function destroy($id)
//    {
//        $this->menuItemService->delete($id);
//        return redirect()->route('menu-items.index')->with('success', 'Menu item deleted successfully.');
//    }
}
