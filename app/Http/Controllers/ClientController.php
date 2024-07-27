<?php

namespace App\Http\Controllers;

use App\Repository\Impl\ClientRepo;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected ClientRepo $clientRepo;

    public function __construct(
        ClientRepo $clientRepo
    )
    {
       $this->clientRepo = $clientRepo;
    }

    public function getClient(Request $request)
    {
        $client = $this->clientRepo->find($request->phone);
        return $client;
    }
}
