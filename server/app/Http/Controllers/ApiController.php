<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Resources\Order as OrderResource;
use App\Http\Resources\OrderCollection;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function orders(Request $request)
    {
        $filters = collect($request->except('page'))->reject(function($value, $key) {
            return $value === null;
        });

        $orders = (new Order)->with('user')->newQuery();

        if(isset($filters['date_start'])) {
            $orders->whereDate('date', '>=', Carbon::createFromFormat('d/m/Y', $filters['date_start']));
        }

        if(isset($filters['date_end'])) {
            $orders->whereDate('date', '<=', Carbon::createFromFormat('d/m/Y', $filters['date_end']));
        }

        if(isset($filters['client_name'])) {
            $orders->whereHas('user', function($query) use($filters) {
                $query->where('name', 'like', '%' . $filters['client_name'] . '%');
            });
        }

        if(isset($filters['minimum_value'])) {
            // TODO:
        }

        // $orders = $orders->get();
        $orders = $orders->paginate(20);

        // return response()->json($orders);
        return new OrderCollection($orders);
    }

    public function order(Order $order)
    {
        // return response()->json($order);
        return new OrderResource($order);
    }
}
