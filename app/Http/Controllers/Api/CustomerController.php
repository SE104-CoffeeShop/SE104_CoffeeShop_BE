<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate();

        return response()->json($customers);
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->all());

        return response()->json($customer)->setStatusCode(201);
    }

    public function update(StoreCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());

        return response()->json($customer);
    }

    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response('', 204);
    }
}
