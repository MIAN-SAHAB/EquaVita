<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'inspector_id',
        'service_tier_id',
        'check_in_at',
        'check_in_latitude',
        'check_in_longitude',
        'completed_at',
        'completed_latitude',
        'completed_longitude',
        'status',
    ];

    protected $casts = [
        'check_in_at' => 'datetime',
        'completed_at' => 'datetime',
        'check_in_latitude' => 'encrypted',
        'check_in_longitude' => 'encrypted',
        'completed_latitude' => 'encrypted',
        'completed_longitude' => 'encrypted',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function inspector()
    {
        return $this->belongsTo(User::class, 'inspector_id');
    }

    public function serviceTier()
    {
        return $this->belongsTo(ServiceTier::class);
    }

    public function responses()
    {
        return $this->hasMany(InspectionResponse::class);
    }

    public function photos()
    {
        return $this->hasMany(InspectionPhoto::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
