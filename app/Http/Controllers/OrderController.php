<?php

namespace App\Http\Controllers;

use App\Filters\OrderFilter;
use App\Order;
use App\RepositoriesContracts\ClientRepositoryInterface;
use App\RepositoriesContracts\ItemRepositoryInterface;
use App\RepositoriesContracts\OrderRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    private $orderRepository;

    public function __construct(OrderRepositoryInterface $repository)
    {
        $this->middleware('auth');
        $this->orderRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderFilter $filters)
    {
        $orders = $this->orderRepository->all($filters);
        $params = request()->all();
        return view('orders.index',compact('orders','params'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ClientRepositoryInterface $clientRepository, ItemRepositoryInterface $itemRepository)
    {
        $clients = $clientRepository->all();
        $items = $itemRepository->all();
        return view('orders.create',compact('clients','items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->orderRepository->store($request->all());

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
