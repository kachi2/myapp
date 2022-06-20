<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/7/2018
 * Time: 10:02 AM
 */

namespace App\Http\Controllers;


use App\Models\UserWallet;
use App\User;
use App\UserNotify;
use Illuminate\Support\Facades\Session;
use App\WalletTranfer;
use Illuminate\Http\Request;
use App\Models\Deposit;
use Illuminate\Support\Facades\Mail;
use App\Traits\SendOTP;
use App\OtpVerify;
use Illuminate\Support\Carbon;
use App\Mail\EmailOTP;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\TaskCampaign;

class WalletController extends Controller
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
     * Display user wallet.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $balance = $request->user()->wallet->amount;
        $bonus = $request->user()->wallet->bonus;

        $breadcrumb = [
            [
                'link' => route('wallet'),
                'title' => 'My Wallet'
            ]
        ];

        return view('wallet.wallet', [
            'balance' => $balance,
            'bonus' => $bonus,
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * Display user wallet.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function transfer(Request $request)
    {
        $breadcrumb = [
            [
                'link' => route('transfer'),
                'title' => 'Internal Transfer'
            ]
        ];
        $balance = $request->user()->wallet->transferable_amount;
        $tranfers = WalletTranfer::where('sender_id', $request->user()->id)->orwhere( 'receiver_id',$request->user()->id)->latest()->paginate(5);
        $sent = WalletTranfer::where('sender_id', $request->user()->id)->sum('amount');
        $received = WalletTranfer::where('receiver_id', $request->user()->id)->sum('amount');

        return view('mobile.transfer', [
            'breadcrumb' => $breadcrumb,
            'balance' => $balance,
            'transfers' => $tranfers,
            'sent' => $sent,
            'received' => $received
        ]);
    }


    public function transactions(Request $request)
    {
        $breadcrumb = [
            [
                'link' => route('transfer'),
                'title' => 'Internal Transfer'
            ]
        ];
        $balance = $request->user()->wallet->transferable_amount;
        $tranfers = WalletTranfer::where('sender_id', $request->user()->id)->orwhere( 'receiver_id',$request->user()->id)->latest()->paginate(5);
        $sent = WalletTranfer::where('sender_id', $request->user()->id)->sum('amount');
        $received = WalletTranfer::where('receiver_id', $request->user()->id)->sum('amount');

        return view('mobile.transactions', [
            'breadcrumb' => $breadcrumb,
            'balance' => $balance,
            'transfers' => $tranfers,
            'sent' => $sent,
            'received' => $received
        ]);
    }

    /**
     * Do transfer
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function doTransfer(Request $request)
    {
        $wallet = $request->user()->wallet->transferable_amount;

       $validate =  validator::make($request->all(), [
            'amount' => 'required|integer|max:' . $wallet,
            'account' => 'required|exists:users',
            'pin' => 'required'
        ]);

        if($validate->fails()){
            $msg = $validate->errors()->first();
            $data = [
               'msg' => $msg,
               'alert' => 'error',
           ];
           return response()->json($data);
        }

        if(auth_user()->pin != $request->pin){
            $msg = [
                'alert' => 'error',
                'msg' => 'Transaction password is wrong'
        ]; 
        return response()->json($msg);
        }
       
        $toUser = User::where('account', $request->input('account'))->firstOrfail(); 
        $wallets = $request->user()->wallet->amount - $request->input('amount');
       
        if($toUser->id == auth()->user()->id){
            $msg = 'Request failed, You cannot tranfer funds to same account';
            $data = [
               'msg' => $msg,
               'alert' => 'error'
           ];
           return response()->json($data);    
        }
        $otp = rand(1111,9999);
       // $this->SendOTP(auth_user()->phone, $otp);
         $data = [
             'otp' => $otp,
             'phone' => auth_user()->email,
             'username' => auth_user()->username,
             'expiry' => Carbon::now()->addMinutes(10)
         ];

         
         Mail::to(auth_user()->email)->send(new EmailOTP($data));
         OTPverify::create([
            'otp' => $otp,
            'user_id' => auth_user()->id,
            'expiry' => Carbon::now()->addMinutes(10),
        ]);

        $msg = [
            'alert' => 'success',
            'success' => 'success',
            'msg' => 'OTP has been sent to your registered email and password'
        ];
        WalletTranfer::create([
            'sender_id' => $request->user()->id,
            'receiver_id' => $toUser->id,
            'amount' => $request->input('amount'),
            'sender_balance' => $wallets,
            'status' => 'pending'
        ]);

        return response()->json($msg);
    }

    public function verifyAccount(Request $request){
        $data = User::where('account', $request->account)->first();
        if($data){
            $msg = [
                'alert' => 'error',
                'msg' => $data->username
            ];
            return response()->json($msg); 
        }

       $msg = [
                'alert' => 'error',
                'msg' => 'Account not found'
            ];
            return response()->json($msg);
    }
    public function VerifyTransfer(Request $request){

        $wallet = WalletTranfer::where(['sender_id' => auth()->user()->id, 'status'=>'pending'])->latest()->first();
        $toUser = User::where('id', $wallet->receiver_id)->first();
        $otpverify = OTPverify::where('user_id', auth_user()->id)->latest()->first();
        $now = Carbon::now();
        if($now > $otpverify->expiry){
            $msg = [
                    'alert' => 'error',
                    'msg' => 'OTP expired, transaction failed, please try again'
            ]; 
            $otpverify->update([
                'is_used' => 1
            ]);
        }
            $otp = "";
            foreach($request->otp as $key => $otps){
                $otp .= $otps;
            }
            if($otp !=  $otpverify->otp){
                $msg = [
                    'alert' => 'error',
                    'msg' => 'OTP entered does not match, transaction failed, try again!'
            ]; 
            return response()->json($msg);  
            }
        UserWallet::reduceAmount($request->user(), $wallet->amount);
        UserWallet::addAmount($toUser, $wallet->amount);

        $msg = 'Transfer Completed Successfully';
        $data = [
           'msg' => $msg,
           'alert' => 'success'
       ];
       $wallet->update(['status' => 'success']);
       return response()->json($data);
    }


    public function Bonus(){
        $task = TaskCampaign::where('user_id', auth_user()->id)->get();
        return view(
            'mobile.bonus',[
                'tasks' => $task
        ]);
     }


    public function TransferEarnings(Request $request){
        $bonus = auth()->user()->wallet->bonus;

        $validate =  validator::make($request->all(), [
            'amounts' => 'required|integer|min:0',
        ]);

        if($validate->fails()){
            $msg = $validate->errors()->first();
            $data = [
               'msg' => $msg,
               'alert' => 'error'
           ];
           return response()->json($data);
        }
            if($request->bonus == 1){
                 $bonus = auth()->user()->wallet->bonus;
                if($bonus >= $request->amounts){
                $userBonus = UserWallet::where('user_id', auth()->user()->id)->update([
                    'bonus'=> $bonus - $request->input('amounts'),
                    'amount' => auth()->user()->wallet->amount + $request->input('amounts'),
                ]);
                // Session::flash('alert', 'success');
                // Session::flash('message', 'Transfer Completed Successfully');
                // return redirect()->back()->with('success', 'Transfer Completed');

                $msg = 'Transfer Completed Successfully';
                $data = [
                   'msg' => $msg,
                   'alert' => 'success'
               ];
               return response()->json($data);
                }else{
                    $msg = 'Transfer failed, Your Bonus Wallet is less than'.' $'.$request->amounts;
                    $data = [
                       'msg' => $msg,
                       'alert' => 'error'
                   ];
                    return response()->json($data);
                   }
               }else {
               $bonuss = auth()->user()->wallet->referrals;
               if($bonuss >= $request->amounts){
                 UserWallet::where('user_id', auth()->user()->id)->update([
                'referrals'=> $bonuss - $request->input('amounts'),
                'amount' => auth()->user()->wallet->amount + $request->input('amounts'),
            ]);
            $msg = 'Transfer Completed Successfully';
            $data = [
               'msg' => $msg,
               'alert' => 'success'
           ];
            return response()->json($data);
        }else{
            $msg = 'Transfer failed, Your Bonus Wallet is less than'.' $'.$request->amounts;
            $data = [
               'msg' => $msg,
               'alert' => 'error'
           ];
            return response()->json($data);
        }
               }
      //  $user_balance = $bonus = $request->user()->wallet->bonus;
    }

    public function clearNotifications(){
            $notify = UserNotify::where('user_id', auth()->user()->id)->get();
            foreach($notify as $dd){
                $dd->delete();
            }
       
            Session::flash('alert', 'success');
            Session::flash('message', 'Notifications cleared Successfully');
            return back();
    }
}
