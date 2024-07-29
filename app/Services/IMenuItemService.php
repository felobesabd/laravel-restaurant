<?php

namespace App\Services;

interface IMenuItemService
{
    public function getItems();

    public function getItem($id);

    public function itemSearch($search);
}
