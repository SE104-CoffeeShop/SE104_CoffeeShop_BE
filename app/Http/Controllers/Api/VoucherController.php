<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoucherRequest;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index() {
        $vouchers = Voucher::paginate();
        return response()->json($vouchers);
    }

    public function store(StoreVoucherRequest $request) {
        $voucher = Voucher::create($request->all());

        return response()->json($voucher)->setStatusCode('201');
    }

    public function update(StoreVoucherRequest $request, Voucher $voucher) {
        $voucher->update($request->all());

        return response()->json($voucher);
    }

    public function show(Voucher $voucher) {
        return response()->json($voucher);
    }

    public function destroy(Voucher $voucher) {
        $voucher->delete();

        return response('', 204);
    }
}
