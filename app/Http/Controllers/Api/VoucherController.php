<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index() {
        $vouchers = Voucher::paginate();
        return response()->json($vouchers);
    }

    public function store(Request $request) {
        $voucher = Voucher::create($request->all());

        return response(json_encode($voucher), 201);
    }

    public function update(Request $request, Voucher $voucher) {
        $voucher->update($request->all());

        return response(json_encode($voucher), 200);
    }

    public function show(Voucher $voucher) {
        return response(json_encode($voucher), 200);
    }

    public function destroy(Voucher $voucher) {
        $voucher->delete();

        return response('', 204);
    }
}
