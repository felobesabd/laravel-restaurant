<?php

namespace App\Repository\Impl;

use App\Repository\IClientRepo;
use Illuminate\Support\Facades\DB;

class ClientRepo implements IClientRepo
{
    public function find($phone)
    {
        return DB::table('clients')->where('phone', $phone)->first();
    }
}
