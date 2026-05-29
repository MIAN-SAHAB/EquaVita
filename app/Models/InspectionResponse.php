<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspectionResponse extends Model
{
    protected $fillable = ['inspection_id', 'tier_checklist_item_id', 'response_value'];

    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }

    public function checklistItem()
    {
        return $this->belongsTo(TierChecklistItem::class, 'tier_checklist_item_id');
    }
}
