<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutInvoiceRequest;
use App\Http\Requests\MultipleDestroyRequest;
use App\Models\Customer;
use App\Models\Invoice;
use App\Services\CartService;
use App\Services\VoucherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('invoiceDetails')->paginate();

        return response()->json($invoices);
    }

    public function store(CheckoutInvoiceRequest $request)
    {
        $cart = $request->input('cart');
        $voucherCode = $request->input('voucher_code');
        $customerPhoneNumber = $request->input('customer_phone_number');
        $tableNumber = $request->input('table_number');
        $staff = Auth::user();

        if ($voucherCode) {
            [
                'isAvailable' => $isVoucherAvailable,
                'voucherType' => $voucherType,
                'voucherAmount' => $voucherAmount,
                'voucher' => $voucher,
                'quantity' => $quantity,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ] = VoucherService::verifyVoucher($voucherCode);

            $today = date('Y-m-d H:i:s');

            if (! $isVoucherAvailable || $quantity < 1 || $today > $endDate || $today < $startDate) {
                $data = [
                    'isSuccess' => false,
                    'message' => 'Voucher khong hop le hoac da het luot su dung, vui long xoa hoac kiem tra lai',
                ];

                return response($data, 200);
            }


            $totalPrice = CartService::calculateCart($cart);
            [$discountPrice, $finalPrice] = CartService::applyVoucher($totalPrice, $voucherType, $voucherAmount);

            $customer = Customer::where('phone_number', $customerPhoneNumber)->first();

            $invoice = Invoice::create([
                'user_id' => $staff->id,
                'user_name' => $staff->name,
                'customer_id' => $customer ? $customer->id : null,
                'customer_name' => $customer ? $customer->name : null,
                'table_number' => $tableNumber,
                'voucher_code' => $voucherCode,
                'note' => null,
                'total_price' => $totalPrice,
                'discount_price' => $discountPrice,
                'final_price' => $finalPrice,
            ]);

            CartService::storeInvoiceDetail($cart, $invoice->id);

            $voucher->update([
                'quantity' => $quantity - 1,
            ]);
        } else {
            $totalPrice = CartService::calculateCart($cart);
            $customer = Customer::where('phone_number', $customerPhoneNumber)->first();

            $invoice = Invoice::create([
                'user_id' => $staff->id,
                'customer_id' => $customer ? $customer->id : null,
                'customer_name' => $customer ? $customer->name : null,
                'table_number' => $tableNumber,
                'voucher_code' => null,
                'note' => null,
                'total_price' => $totalPrice,
                'discount_price' => 0,
                'final_price' => $totalPrice,
            ]);

            CartService::storeInvoiceDetail($cart, $invoice->id);
        }

        $data = [
            'isSuccess' => true,
            'message' => 'Da checkout thanh cong',
        ];

        return response($data, 200);
    }

    public function update(Request $request, Invoice $invoice)
    {
        $invoice->update($request->all());

        return response()->json($invoice);
    }

    public function show(Invoice $invoice)
    {
        $data = collect([$invoice, $invoice->invoiceDetails]);

        return response()->json($data);
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return response('', 204);
    }

    public function destroyMultiple(MultipleDestroyRequest $request)
    {
        Invoice::destroy($request->ids);

        return response('Deleted successfully', 204);
    }

    public function getPending()
    {
        $pendingInvoices = Invoice::where('status', 'pending')->paginate();

        return response()->json($pendingInvoices);
    }
}
