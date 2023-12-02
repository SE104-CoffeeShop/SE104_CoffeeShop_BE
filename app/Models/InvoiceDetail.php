<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $table = 'invoice_detail';

    use HasFactory;

    protected $fillable = [
        'id',
        'invoice_id',
        'product_id',
        'quantity',
    ];

    public function products()
    {
        $this->hasMany(Product::class, 'product_id');
    }
}
