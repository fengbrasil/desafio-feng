<?php

namespace App\Repositories;

use App\Order;
use App\RepositoriesContracts\OrderRepositoryInterface;

/**
 * Created by PhpStorm.
 * User: paulo.telles
 * Date: 26/10/2018
 * Time: 15:12
 */

class OrderRepository implements OrderRepositoryInterface
{
    public function all()
    {
        return Order::all();
    }
}