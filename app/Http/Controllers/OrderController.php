<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Services\IOrderDetailsService;

class OrderController extends Controller
{
    protected IOrderDetailsService $iOrderDetailsService;

    public function __construct(
        IOrderDetailsService $iOrderDetailsService
    )
    {
       $this->iOrderDetailsService = $iOrderDetailsService;
    }

    public function store(OrderRequest $request)
    {
        $order = $this->iOrderDetailsService->createOrderDetails($request->getDto());
        return $order;
    }
}
