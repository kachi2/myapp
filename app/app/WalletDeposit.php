<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletDeposit extends Model
{
    //
    protected $fillable = [
        'user_id', 'ref','amount', 'fee', 'amount2', 'payment_method', 'currency1', 'currency2', 'status'
    ];
}
