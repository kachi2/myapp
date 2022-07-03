<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Package;
use App\Models\Referral;
use App\Models\UserWallet;
use App\Models\Withdrawal;
use App\PlanProfit;
use App\WalletTranfer;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Carbon;
use App\WalletDeposit;
use App\Deposits;
use App\Mail\EmailOTP;
use App\UserActivity;
use App\OtpVerify;
use App\Traits\SendOTP;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Kevupton\LaravelCoinpayments\Models\Withdrawal as ModelsWithdrawal;

class HomeController extends Controller
{
    use SendOTP;
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

     public function VerifyOTP(){
        $otp = rand(1111,9999);
        $data = [
            'username' => auth_user()->username,
            'otp' => $otp,
            'expiry' => Carbon::now()->addMinutes(10),
        ];
        OTPverify::create([
            'otp' => $otp,
            'user_id' => auth_user()->id,
            'expiry' => Carbon::now()->addMinutes(10),
            'type' => 'login'
        ]);
      // $this->SendOTP(auth_user()->phone, $otp);
      Mail::to(auth_user()->email)->send( new EmailOTP($data));
        return view('mobile.verifyotp');
    }

    public function OTPverify(Request $request){

        $valid = validator::make($request->all(),[
            'otp' => 'required'
        ]);
        if($valid->fails()){
            Session::flash('alert', 'error');
            Session::flash('msg', 'OTP is required');
            return redirect()->back();
        }
        $otpverify = OTPverify::where('user_id', auth_user()->id)->latest()->first();
        $now = Carbon::now();
        if($now > $otpverify->expiry){
            $otpverify->update([
                'is_used' => 1
            ]);
            Session::flash('alert', 'error');
            Session::flash('msg', 'OTP expired, please refresh page');
            
            return redirect()->back();
            }
            $otp = "";
            foreach($request->otp as $key => $otps){
                $otp .= $otps;
            }
            if($otp !=  $otpverify->otp){
                Session::flash('alert', 'error');
                Session::flash('msg', 'OTP does not match, please try again');
                
                return redirect()->back();
            }
               $otpverify->update([
                'is_used' => 1
            ]);
            return redirect()->route('home');
    }

    public function index()
    {

        $otpverify = OTPverify::where('user_id', auth_user()->id)->latest()->first();
        if($otpverify->is_used != 1 && $otpverify->is_used == 'login'){
            return redirect()->route('verify.otp');
        }
        $user = auth_user();
        $packages = Package::with('plans')->get();
        $deposits =  Deposits::where(['user_id' => auth_user()->id])->paginate(5);
        $totalDeposits = Deposits::where(['user_id' => auth_user()->id, 'status' => 'success'])->sum('amount');
        $tranfer = WalletTranfer::where(['sender_id' => auth_user()->id, 'status' => 'success'])->sum('amount');
        $data['withdrawals'] = Withdrawal::where(['status' => '1', 'user_id'=>$user->id])->sum('amount');
        $bonus = UserWallet::whereUserId($user->id)->sum('bonus');
        $tranfers = WalletTranfer::where('sender_id', auth_user()->id)->orwhere( 'receiver_id',auth_user()->id)->latest()->paginate(5);

        $account = rand(0000000000,9999999999);
        $bnk = substr($account, -1);

        sleep(3);
        if($bnk == 1 || $bnk  == 2 || $bnk  == 3){
            $bank = "Opay";
        }elseif($bnk == 4 || $bnk  == 4 || $bnk  == 6){
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
        //dd($data['bonus']);

        return view('mobile.home', [
            'user' => $user,
            'packages' => $packages,
            'total_deposits' => $totalDeposits,
            'transfers' => $tranfers,
            'deposits' => $deposits,
            'transfer' => $tranfer,
            'activities' => UserActivity::where('user_id', $user->id)->latest()->take(5)->get()
        ], $data);
    }

    public function packages(){
        $data['basic'] = Deposit::where('plan_id', 1)->get();
        $data['standard'] = Deposit::where('plan_id', 2)->get();
        $data['premium'] = Deposit::where('plan_id', 3)->get();
        $data['mega'] = Deposit::where('plan_id', 4)->get();
        return view('mobile.packages')->with(
            [
                'packages' => Package::with('plans')->get(),
                'data' => $data  
        ]);
    }

}
