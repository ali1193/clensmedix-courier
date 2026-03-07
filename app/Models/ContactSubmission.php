<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'pickup_location',
        'delivery_location',
        'package_type',
        'preferred_pickup_time',
        'source',
        'message',
    ];
}

