<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index() {
        $invoices = Invoice::paginate();
        return response()->json($invoices);
    }

    public function update(Request $request, Invoice $invoice) {
        $invoice->update($request->all());

        return response(json_encode($invoice), 200);
    }

    public function show(Invoice $invoice) {
        return response(json_encode($invoice), 200);
    }

    public function destroy(Invoice $invoice) {
        $invoice->delete();

        return response('', 204);
    }

    public function getPending() {
        $pendingInvoices = Invoice::where('status', 'pending');

        return response(json_encode($pendingInvoices), 200);
    }
}
