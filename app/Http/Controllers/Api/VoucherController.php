<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoucherRequest;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::paginate();

        return response()->json($vouchers);
    }

    public function store(StoreVoucherRequest $request)
    {
        $startDate = date('Y-m-d', strtotime($request->input('start_date')));
        $endDate = date('Y-m-d', strtotime($request->input('end_date')));

        $data = array_merge($request->all(), [
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);

        $voucher = Voucher::create($data);

        return response()->json($voucher)->setStatusCode('201');
    }

    public function update(StoreVoucherRequest $request, Voucher $voucher)
    {
        $startDate = date('Y-m-d', strtotime($request->input('start_date')));
        $endDate = date('Y-m-d', strtotime($request->input('end_date')));

        $data = array_merge($request->all(), [
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);

        $voucher->update($data);

        return response()->json($voucher);
    }

    public function show(Voucher $voucher)
    {
        return response()->json($voucher);
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        return response('', 204);
    }
}
