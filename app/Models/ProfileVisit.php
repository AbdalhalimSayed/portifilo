<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileVisit extends Model
{
    protected $fillable = [
        "profile_id",
        "ip_address",
        "user_agent",
    ];
}
