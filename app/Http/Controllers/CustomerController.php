<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::with('address')->get();
        return [
            'status' => 200,
            'data' => $customer
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
        $customer = new Customer();
        $customer->costumer_name = $request->costumer_name;
        $customer->save();
        return [
            'status' => 201,
            'message' => 'Costumer berhasil ditambahkan!'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return [
            'status' => 200,
            'data' => $customer
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cek_customer = Customer::firstWhere('id', $id);
        if ($cek_customer) {
            $customer = Customer::find($id);
            $customer->costumer_name = $request->costumer_name;
            $customer->save();
            return [
                'status' => 201,
                'message' => 'Berhasil Diupdate Customer'
            ];
        } else {
            return [
                'status' => 404,
                'message' => 'Not Found'
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek_customer = Customer::firstWhere('id', $id);
        if ($cek_customer) {
            Customer::destroy($id);
            return response([
                'status' => 201,
                'message' => 'Customer Berhasil dihapus',
            ], 200);
        } else {
            return response([
                'status' => 404,
                'message' => 'Customer tidak ditemukan'
            ], 404);
        }
    }
}
