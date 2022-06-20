<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtpVerify extends Model
{
    protected $fillable = [

        'otp', 'user_id', 'is_used', 'expiry'
    ];
    //
}
