<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [

        'first_name',
        'last_name',
        'organization_id',
        'position_id',
        'service_id',
        'location_id',
        'phone',
        'short_phone',
        'phone_code',
        'email',
        'alias',
    ];
}
