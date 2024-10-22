<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Http\Requests\StoreordersRequest;
use App\Http\Requests\UpdateordersRequest;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = orders::all();
        
        return $orders;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreordersRequest $request)
    {
        //
        $order = new Order;
        $order->user_id =$request->user_id;
        $order->order_type =$request->order_type;
        $order->order_total =$request->order_total;
        $order->order_status =$request->order_status;
        
        $order->save();

        return $order;
    }

    /**
     * Display the specified resource.
     */
    public function show(orders $orders)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateordersRequest $request, orders $orders)
    {
        //
        $order = Order::find($request->order_id);

        $order->user_id =$request->user_id;
        $order->order_type =$request->order_type;
        $order->order_total =$request->order_total;
        $order->order_status =$request->order_status;
        
        $order->save();

        return $order;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orders $orders)
    {
        //
    }
}
