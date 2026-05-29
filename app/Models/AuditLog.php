<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    // The table is append-only at the DB level.
    // In Eloquent, we disable updates/deletes as a precaution.

    public $timestamps = false; // We use created_at useCurrent() in migration

    protected $fillable = [
        'user_id',
        'event',
        'auditable_type',
        'auditable_id',
        'old_values',
        'new_values',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'old_values' => 'json',
        'new_values' => 'json',
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function auditable()
    {
        return $this->morphTo();
    }

    // Prevent updates via Eloquent
    public function save(array $options = [])
    {
        if ($this->exists) {
            throw new \Exception("Audit logs are immutable.");
        }
        return parent::save($options);
    }

    // Prevent deletes via Eloquent
    public function delete()
    {
        throw new \Exception("Audit logs are immutable.");
    }
}
