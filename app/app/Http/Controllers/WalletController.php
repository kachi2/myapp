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
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class WalletController extends Controller
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

        return view('wallet.transfer', [
            'breadcrumb' => $breadcrumb,
            'balance' => $balance
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
        $this->validate($request, [
            'amount' => 'required|integer|max:' . $wallet,
            'username' => 'required|exists:users',
        ]);

        $toUser = User::where('username', $request->input('username'))->firstOrfail();
        UserWallet::reduceAmount($request->user(), $request->input('amount'));
        UserWallet::addAmount($toUser, $request->input('amount'));

        return redirect()->back()->with('success', 'Fund transferred successfully');
    }

    public function TransferEarnings(Request $request){

       $valid = $this->validate($request, [
            'amounts' => 'required|integer|min:0',
            'bonus' => 'required|integer'
        ]);
        
        if(!$valid){
            return redirect()->back()->withErrors($valid)->withInput($request->all());
        }else{
            if($request->bonus == 1){
                 $bonus = auth()->user()->wallet->bonus;
                if($bonus >= $request->amounts){
                $userBonus = UserWallet::where('user_id', auth()->user()->id)->update([
                    'bonus'=> $bonus - $request->input('amounts'),
                    'amount' => auth()->user()->wallet->amount + $request->input('amounts'),
                ]);
                return redirect()->back()->with('success', 'Transfer Completed');
                }else{
                    return redirect()->back()->with('error', 'Your Bonus Wallet is less than'.' $'.$request->amounts);
                }
               }else {
               $bonus = auth()->user()->wallet->referrals;
               if($bonus >= $request->amounts){
               $userBonus = UserWallet::where('user_id', auth()->user()->id)->update([
                'referrals'=> $bonus - $request->input('amounts'),
                'amount' => auth()->user()->wallet->amount + $request->input('amounts'),
            ]);
            return redirect()->back()->with('success', 'Transfer Completed');
        }else{
            return redirect()->back()->with('error', 'Your Referral Wallet is less than'.' $'.$request->amounts);
        }
               }
        }

        $user_balance = $bonus = $request->user()->wallet->bonus;
    }
}
