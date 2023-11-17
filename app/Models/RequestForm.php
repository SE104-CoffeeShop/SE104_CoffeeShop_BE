<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
{
    protected $table = 'request_form';

    protected $id = 'id';
    protected $fillable = [
        'type',
        'sender_id',
        'start_date',
        'end_date',
        'reason',
        'status',
        'created_at',
    ];

    public function employee() {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
