<?php

namespace App\Http\Controllers;

use App\Models\payments;
use App\Http\Requests\StorepaymentsRequest;
use App\Http\Requests\UpdatepaymentsRequest;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $payments = payments::all();

        return $payments;
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
    public function store(StorepaymentsRequest $request)
    {
        //
        $payment = new Payment;
        $payment->user_id = $request->user_id;
        $payment->order_id = $request->order_id;
        $payment->payment_status = $request->payment_status;
        $payment->payment_type = $request->payment_type;
        $payment->amount = $request->amount;

        $payment->save();

        return $payment;
        
    }   

    /**
     * Display the specified resource.
     */
    public function show(payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepaymentsRequest $request, payments $payments)
    {
        //
        $payment = Payment::find($request->payment_id);
        $payment->user_id = $request->user_id;
        $payment->order_id = $request->order_id;
        $payment->payment_status = $request->payment_status;
        $payment->payment_type = $request->payment_type;
        $payment->amount = $request->amount;

        $payment->save();

        return $payment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payments $payments)
    {
        //
    }
}
