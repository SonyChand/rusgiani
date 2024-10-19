<?php

namespace App\Traits;

use id;
use App\Models\Activity;
use Illuminate\Support\Facades\Request;

trait LogsActivity
{
    public function logActivity($description, $user)
    {
        Activity::create([
            'user_id' => $user->id,
            'description' => $description,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
        ]);
    }
}
