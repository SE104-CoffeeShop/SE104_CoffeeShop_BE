<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'customer_id',
        'table_number',
        'voucher_code',
        'note',
        'date',
        'total_price',
        'discount_price',
        'final_price',
    ];

    public function invoiceDetails() {
        return $this->hasMany(InvoiceDetail::class, 'invoice_id');
    }

    public function voucher() {
        return $this->hasOne(Voucher::class, 'voucher_id');
    }
}
