<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTier extends Model
{
    protected $fillable = ['name', 'rate', 'description'];

    public function checklistItems()
    {
        return $this->hasMany(TierChecklistItem::class);
    }
}
