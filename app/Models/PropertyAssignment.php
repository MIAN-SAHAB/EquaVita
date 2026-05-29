<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyAssignment extends Model
{
    protected $fillable = ['property_id', 'field_worker_id', 'scheduled_date'];

    protected $casts = [
        'scheduled_date' => 'date',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function fieldWorker()
    {
        return $this->belongsTo(User::class, 'field_worker_id');
    }
}
