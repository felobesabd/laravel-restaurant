<?php

namespace App\Http\Controllers;

use App\Services\IClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //TODO:phelo add service
    //TODO:phelo add DTO

    protected IClientService $iClientService;

    public function __construct(
        IClientService $iClientService
    )
    {
       $this->iClientService = $iClientService;
    }

    public function getClient(Request $request)
    {
        $client = $this->iClientService->getClient($request->phone);
        return $client;
    }
}
