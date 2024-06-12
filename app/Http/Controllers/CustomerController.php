<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function store(Request $request)
    {
        $customer = Customer::create($request->all());
        return response()->json(['data' => $customer, 'status' => 200]);
    }

    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());
        return response()->json(['data' => $customer, 'status' => 200]);
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id)->delete();
        return response()->json(['data' => $customer, 'status' => 200]);
    }
}
