<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\User;
use App\Models\orderdetails;
use App\Models\menu;
use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = orders::all();
        return $orders;
    }
    public function getOrderDetails($user_id){
        $order = orders::where('user_id', $user_id)->get();

        foreach ($order as $o){
            $o->user = User::find($user_id);
            $o->order_details = orderdetails::where('order_id', $o->id)->get();
            //menu
            foreach ($o->order_details as $order_detail){
                $menu = menu::find($order_detail->menu_id);
                $order_detail->menu_name = $menu->name;
                $order_detail->menu_price = $menu->price;
            }
        }
        return $order;
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
    public function store(StoreOrdersRequest $request)
    {
        $order = new orders;
        $order->user_id = $request->user_id;
        $order->order_type = $request->order_type;
        $order->order_status = 'Not Paid';
        $order->order_total = $request->order_total;
        $order->save();

        //insert order details
        foreach ($request->order_details as $menu_item){

            $order_details = new orderdetails;
            $order_details->order_id = $order->id;
            $order_details->menu_id = $menu_item['id'];
            $order_details->quantity = $menu_item['quantity'];
            $order_details->save();
        }

        return $order;
    }
    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdersRequest $request, Orders $orders)
    {
        $order = orders::find($request->id);
        $order->user_id = $request->user_id;
        $order->order_type = $request->order_type;
        $order->order_status = $request->order_status;
        $order->order_total = $request->order_total;
        $order->save();
        return $order;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
