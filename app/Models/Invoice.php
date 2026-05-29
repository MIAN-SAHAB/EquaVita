<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'inspection_id',
        'invoice_number',
        'subtotal',
        'gst_amount',
        'total',
        'issued_at',
        'status',
    ];

    protected $casts = [
        'issued_at' => 'datetime',
        'subtotal' => 'decimal:2',
        'gst_amount' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }
}
