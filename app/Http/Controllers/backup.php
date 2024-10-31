<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\orders;
use App\Models\menu;
use App\Models\User;
use App\Models\orderdetails;
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
        $orders = DB::table('orders')->get();

        return $orders;
    }
    public function getOrderDetails($order_id){
        $order = orders::find($order_id);
        //user
        $order->user = User::find($order->user_id);
        //order details
        $order->order_details = orderdetails::where('order_id', $order->id)->get();
        //menu
        foreach ($order->order_details as $order_detail){
            $menu = menu::find($order_detail->menu_id);
            $order_detail->menu_name = $menu->name;
            $order_detail->menu_price = $menu->price;
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
    public function store(StoreordersRequest $request)
    {
        //
        $order = new orders;
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
