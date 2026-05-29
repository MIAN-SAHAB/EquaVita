<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'owner_id',
        'name',
        'address',
        'latitude',
        'longitude',
        'lockbox_code',
        'alarm_code',
        'emergency_contacts',
        'structural_features',
        'utility_diagrams_url',
        'environmental_notes',
        'key_assignments',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'lockbox_code' => 'encrypted',
        'alarm_code' => 'encrypted',
        'emergency_contacts' => 'encrypted',
        'latitude' => 'encrypted',
        'longitude' => 'encrypted',
        'key_assignments' => 'encrypted',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function inspections()
    {
        return $this->hasMany(Inspection::class);
    }

    public function assignments()
    {
        return $this->hasMany(PropertyAssignment::class);
    }
}
