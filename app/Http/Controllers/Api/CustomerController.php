<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::paginate();
        return response()->json($customers);
    }

    public function store(Request $request) {
        $customer = Customer::create($request->all());

        return response(json_encode($customer), 201);
    }

    public function update(Request $request, Customer $customer) {
        $customer->update($request->all());

        return response(json_encode($customer), 200);
    }

    public function show(Customer $customer) {
        return response(json_encode($customer), 200);
    }

    public function destroy(Customer $customer) {
        $customer->delete();

        return response('', 204);
    }
}
