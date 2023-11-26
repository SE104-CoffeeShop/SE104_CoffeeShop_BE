<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'voucher';
    use HasFactory;

    protected $fillable = [
        'id',
        'voucher_code',
        'type',
        'amount',
        'quantity',
        'start_date',
        'end_date',
    ];

    public function invoice(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'voucher_id');
    }
}
