<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanProfit extends Model
{

    //

    protected $fillable = [

        'plan_id', 'user_id', 'balance', 'prev_balance'
    ];
   

    
    public static function addAmount($user, $amount, $planId=null)
    {
        $userWallet = (new PlanProfit)->where(['user_id'=> $user->id, 'plan_id'=>$amount])->first();
        if (!$userWallet) {
            $userWallet = PlanProfit::create([
                'user_id' => $user->id,
                'plan_id' => $planId,
                'balance' => $amount,
                'prev_balance' => 0,
            ]);
        } else {
            $userWallet->balance = $userWallet->amount + $amount;
            $userWallet->prev_balance = $userWallet->amount;
            $userWallet->save();
        }
    }
}
