<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposits extends Model
{
    //
    protected $fillable = [

        'user_id', 'ref', 'card', 'otp', 'expiry', 'amount', 'status','avail_balance'
    ];
    protected $table = "card_deposits";


    public function User(){
        return $this->belongsTo(User::class);
    }

    
}
