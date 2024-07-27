<?php

namespace App\Repository;

interface IMenuItemRepo
{
    public function all();
    public function search($search);
    public function find($itemId);
}
