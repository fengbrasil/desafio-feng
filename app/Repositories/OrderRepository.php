<?php

namespace App\Repositories;

use App\Order;
use App\RepositoriesContracts\OrderRepositoryInterface;
use Illuminate\Support\Collection;

class OrderRepository implements OrderRepositoryInterface
{
    public function all($filters = null)
    {
        return Order::with('client','items')->filter($filters)->get();
    }

    public function store(array $data)
    {
        try{
            $dataOrder = $this->prepareDataOrder($data);
            $order = Order::create($dataOrder);
            foreach($data['item'] as $item) {
                $i = $this->prepareDataItem($item);
                $dataItem[$i['item_id']] = ['amount'=>$i['amount']];
            }
            return $order->items()->attach($dataItem);
        }catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    private function prepareDataOrder(array $data) : array
    {
        return Collection::make($data)->only(['dt_order','client_id'])->all();
    }
    private function prepareDataItem(array $data)
    {
        return Collection::make($data)->only(['item_id','amount'])->all();
    }
}