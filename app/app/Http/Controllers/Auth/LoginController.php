<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Request;
use App\UserActivity;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/verifyotp';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login' => Carbon::now()->toDateTimeString(),
            'login_ip'  => $request->getClientIp(),
        ]);
        UserActivity::create([
            'user_id' => $user->id,
            'last_login' => Carbon::now()->toDateTimeString(),
            'login_ip' => $request->Ip(),
        ]);

        $account = rand(0000000000,9999999999);
        $bnk = substr($account, -1);

        sleep(3);
        if($bnk == 1 || $bnk  == 2 || $bnk  == 3){
            $bank = "Opay";
        }elseif($bnk == 4 || $bnk  == 5 || $bnk  == 6){
            $bank = "Palmpay";
        }elseif($bnk == 7 || $bnk  == 8){
            $bank = "GTB";
        }else{
            $bank = "Access";
        }

        if($user->account == null){
            $pin = rand(1111,9999);
            $user->update(['account'=>$account, 'pin' =>$pin, 'bank' => $bank]);
        }

        if($user->bank == null){
            $user->update(['bank' => $bank]);
        }
        //dd($user);
    }
}
