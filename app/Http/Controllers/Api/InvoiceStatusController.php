<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;

class InvoiceStatusController extends Controller
{
    public function finish(Invoice $invoice)
    {
        $invoice->update([
            'status' => 'finish',
        ]);

        return response('', 200);
    }

    public function undo(Invoice $invoice)
    {
        $invoice->update([
            'status' => 'pending',
        ]);

        return response('', 200);
    }
}
