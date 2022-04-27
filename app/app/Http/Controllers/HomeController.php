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
