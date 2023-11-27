<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceStatusController extends Controller
{
    public function finish(Request $request, Invoice $invoice) {
        $invoice->update([
            'pending' => 'finish',
        ]);

        return response('', 204);
    }

    public function undo(Request $request, Invoice $invoice) {
        $invoice->update([
            'pending' => 'pending',
        ]);

        return response('', 204);
    }
}
