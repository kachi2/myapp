<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Package;
use App\Models\Withdrawal;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

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
        $activeDeposits = Deposit::whereUserId($user->id)->whereStatus(Deposit::STATUS_ACTIVE)->sum('amount');
        $lastDeposit = Deposit::whereUserId($user->id)->latest()->take(1)->sum('amount');

        $totalWithdrawals = Withdrawal::whereUserId($user->id)->where('status', '!=', Withdrawal::STATUS_CANCELED)->sum('amount');
        $pendingWithdrawals = Withdrawal::whereUserId($user->id)->whereStatus(Withdrawal::STATUS_PENDING)->sum('amount');
        $lastWithdrawal = Withdrawal::whereUserId($user->id)->where('status', '!=', Withdrawal::STATUS_CANCELED)->latest()->take(1)->sum('amount');

        return view('home', [
            'user' => $user,
            'packages' => $packages,
            'total_deposits' => $totalDeposits,
            'active_deposits' => $activeDeposits,
            'last_deposit' => $lastDeposit,
            'total_withdrawals' => $totalWithdrawals,
            'pending_withdrawals' => $pendingWithdrawals,
            'last_withdrawal' => $lastWithdrawal
        ]);
    }

    public function packages(){

        return view('packages')->with('packages', Package::with('plans')->get());
    }
}
