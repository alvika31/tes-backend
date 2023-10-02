<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddress;
use Illuminate\Http\Request;

class CustomerAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = CustomerAddress::with('customers')->get();
        return [
            'status' => 200,
            'data' => $address
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customerAddress = new CustomerAddress();
        $customerAddress->customer_id = $request->customer_id;
        $customerAddress->address = $request->address;
        $customerAddress->save();
        return [
            'status' => 201,
            'message' => 'Costumer Address berhasil ditambahkan!'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerAddress  $customerAddress
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerAddress $customerAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerAddress  $customerAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerAddress $customerAddress)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerAddress  $customerAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerAddress $customerAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerAddress  $customerAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerAddress $customerAddress)
    {
        //
    }
}
