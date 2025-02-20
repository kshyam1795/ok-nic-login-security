<?php

namespace Growats\OkNicLoginSecurity\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $fillable = ['user_id', 'action', 'ip_address', 'details'];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
