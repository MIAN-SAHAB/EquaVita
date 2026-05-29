<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TierChecklistItem extends Model
{
    protected $fillable = ['service_tier_id', 'question', 'input_type', 'sort_order'];

    public function serviceTier()
    {
        return $this->belongsTo(ServiceTier::class);
    }
}
