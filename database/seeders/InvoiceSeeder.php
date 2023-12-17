<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        Invoice::truncate();
        InvoiceDetail::truncate();

        $invoices = [
            [
                'user_id' => 1,
                'customer_id' => 1,
                'table_number' => 2,
                'voucher_code' => null,
                'note' => 'Cho nhiều nước',
                'total_price' => 151000,
                'discount_price' => 0,
                'final_price' => 151000,
            ],
        ];

        foreach ($invoices as $invoice) {
            Invoice::query()->create($invoice);
        }

        $invoiceDetails = [
            [
                'invoice_id' => 1,
                'product_id' => 7,
                'quantity' => 2,
                'unit_price' => 23000,
                'product_name' => 'Trà ô long',
            ],
            [
                'invoice_id' => 1,
                'product_id' => 8,
                'quantity' => 7,
                'unit_price' => 15000,
                'product_name' => 'Trà lipton',
            ],
        ];

        foreach ($invoiceDetails as $invoiceDetail) {
            InvoiceDetail::query()->create($invoiceDetail);
        }
    }
}
