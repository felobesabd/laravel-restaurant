<?php


namespace App\Services\Impl;

use App\Repository\IClientRepo;
use App\Services\IClientService;

class ClientService implements IClientService
{
    protected IClientRepo $clientRepo;

    public function __construct(
        IClientRepo $clientRepo
    )
    {
        $this->clientRepo= $clientRepo;
    }

    public function getClient($phone)
    {
        return $this->clientRepo->find($phone);
    }
}

