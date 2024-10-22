<?php

namespace App\Http\Controllers;

use App\Models\orderdetails;
use App\Http\Requests\StoreorderdetailsRequest;
use App\Http\Requests\UpdateorderdetailsRequest;

class OrderdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orderdetails = orderdetails::all();

        return $orderdetails;
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
    public function store(StoreorderdetailsRequest $request)
    {
        //
        $orderdetails = new OrderDetails;
        $orderdetails->menu_id = $request->menu_id;
        $orderdetails->order_id = $request->order_id; 
        $orderdetails->quantity = $request->quantity;

        $orderdetails->save();

        return $orderdetails;
    }

    /**
     * Display the specified resource.
     */
    public function show(orderdetails $orderdetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orderdetails $orderdetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateorderdetailsRequest $request, orderdetails $orderdetails)
    {
        //
        $orderdetails = OrderDetails::find($request->order_id);

        $orderdetails->menu_id = $request->menu_id;
        $orderdetails->order_id = $request->order_id; 
        $orderdetails->quantity = $request->quantity;

        $orderdetails->save();

        return $orderdetails;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orderdetails $orderdetails)
    {
        //
    }
}
