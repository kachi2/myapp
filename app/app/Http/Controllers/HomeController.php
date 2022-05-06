<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Package;
use App\Models\Withdrawal;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\User;
use App\UserActivity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */

     public function Markets(){
        $cURLConnection = curl_init();
        curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=bitcoin%2Cethereum%2Clitecoin%2Cdogecoin%2Cusd-coin%2Cbinancecoin%2Ctron%tezos%2Chelium%2Ctether%2Cbinance-usd%2Cshiba-inu%2Cstaked-ether&order=market_cap_desc&per_page=8&page=1&sparkline=false&price_change_percentage=2');
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
        ));
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true); 
        $se = curl_exec($cURLConnection);
        curl_close($cURLConnection);  
        $resp = json_decode($se, true);
        if(empty($resp)){
            $resp = [];
        }
         return view('mobile.markets', [
             'coins' => $resp,
         ]);
     }
    public function index()
    {
        $user = auth_user();
        $packages = Package::with('plans')->get();
        $totalDeposits = Deposit::whereUserId($user->id)->sum('amount');
        $totalInvest = Deposit::whereUserId($user->id)->where('payment_method', '!=', 'WALLET')->sum('amount');
        $activeDeposits = Deposit::whereUserId($user->id)->whereStatus(Deposit::STATUS_ACTIVE)->sum('amount');
        $lastDeposit = Deposit::whereUserId($user->id)->latest()->take(1)->sum('amount');

        $totalWithdrawals = Withdrawal::whereUserId($user->id)->where('status', '!=', Withdrawal::STATUS_CANCELED)->sum('amount');
        $pendingWithdrawals = Withdrawal::whereUserId($user->id)->whereStatus(Withdrawal::STATUS_PENDING)->sum('amount');
        $lastWithdrawal = Withdrawal::whereUserId($user->id)->where('status', '!=', Withdrawal::STATUS_CANCELED)->latest()->take(1)->sum('amount');
        $data['withdw'] = Withdrawal::where('user_id', $user->id)->latest()->take(2)->get();
        $data['depo'] =  Deposit::where('user_id', $user->id)->latest()->take(2)->get();
        $data['login'] = UserActivity::where('user_id', $user->id)->latest()->take(2)->get();

        $data['basic'] = Deposit::where('plan_id', 1)->get();
        $data['standard'] = Deposit::where('plan_id', 2)->get();
        $data['premium'] = Deposit::where('plan_id', 3)->get();
        $data['mega'] = Deposit::where('plan_id', 4)->get();
        $data['investment'] = Deposit::where(['user_id' => $user->id])->take(3)->latest()->get();
        
        if($user->first_name == null || $user->last_name == null || $user->country == null || $user->phone == null || $user->state == null){
             $data['profile']  = 50;
        }else{
             $data['profile']  = 100;
        }

        return view('mobile.home', [
            'user' => $user,
            'packages' => $packages,
            'total_deposits' => $totalDeposits,
            'active_deposits' => $activeDeposits,
            'last_deposit' => $lastDeposit,
            'total_withdrawals' => $totalWithdrawals,
            'pending_withdrawals' => $pendingWithdrawals,
            'last_withdrawal' => $lastWithdrawal,
            'total_invest' => $totalInvest,
            'activities' => UserActivity::where('user_id', $user->id)->latest()->take(5)->get()
        ], $data);
    }

    public function packages(){

        return view('mobile.packages')->with('packages', Package::with('plans')->get());
    }
}
