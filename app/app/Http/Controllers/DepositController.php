<?php
/**
 * Created by PhpStorm.
 * User: billi
 * Date: 5/18/19
 * Time: 11:20 PM
 */

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Package;
use App\Models\PendingDeposit;
use App\Models\Setting;
use App\Models\Plan;
use App\Models\UserWallet;
use App\Modules\BlockChain;
use App\Modules\PerfectMoney;
use App\Notifications\InvestmentCreated;
use App\User;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;
use Illuminate\View\View;
use Kevupton\LaravelCoinpayments\Facades\Coinpayments;
use Kevupton\LaravelCoinpayments\Models\Transaction;

class DepositController extends Controller
{

    const ITEM_CURRENCY = 'USD';
    const ITEM_TAX_RATE = 0.05;

    /**
     * Array of acceptable sorts.
     *
     * @var array
     */
    protected $sortable = [
        'ref',
        'amount',
        'profit_rate',
        'user_id',
        'plan_id',
        'expires_at',
        'updated_at',
        'duration',
        'payment_period',
        'payment_method',
        'status'
    ];

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
     * Display a listing of the plan.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $query = Deposit::whereUserId($request->user()->id);

        if ($request->input('search')) {
            $query->where(function ($query) use ($request) {
                $searchString = $request->input('search', "");
                $query->where('amount', 'LIKE', "%$searchString%");
                $query->orWhere('created_at', 'LIKE', "%$searchString%");
                $query->orWhere('profit_rate', 'LIKE', "%$searchString%");
                $query->orWhere('duration', 'LIKE', "%$searchString%");
                $query->orWhere('payment_method', 'LIKE', "%$searchString%");
                $query->orWhere('id', 'LIKE', "%$searchString%");
                $query->orWhere('ref', 'LIKE', "%$searchString%");
            });
        }

        if ($request->input('filter_by')) {
            $filter = strtolower($request->input('filter_by'));
            switch ($filter) {
                case 'active':
                    $query->where('status', Deposit::STATUS_ACTIVE);
                    break;
                case 'completed':
                    $query->where('status', Deposit::STATUS_COMPLETED);
                    break;
                case 'canceled':
                    $query->where('status', Deposit::STATUS_CANCELED);
                    break;
            }
        }

        $sort = explode('.', $request->input('sort_by', 'id.desc'));
        if (count($sort) > 0 && in_array($sort[0], $this->sortable))
            $query->orderBy($sort[0], $sort[1]);

        $deposits = $query->latest()->Paginate(20);

        $breadcrumb = [
            [
                'link' => route('deposits'),
                'title' => 'Deposits'
            ]
        ];

        return view('deposit.deposits', [
            'deposits' => $deposits,
            'pending' => PendingDeposit::where('user_id', auth()->user()->id)->get(),
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * Display a listing of the plan.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function showTransactions(Request $request)
    {
        $query = PendingDeposit::whereUserId($request->user()->id);

        if ($request->input('search')) {
            $query->where(function ($query) use ($request) {
                $searchString = $request->input('search', "");
                $query->where('amount', 'LIKE', "%$searchString%");
                $query->orWhere('created_at', 'LIKE', "%$searchString%");
                $query->orWhere('profit_rate', 'LIKE', "%$searchString%");
                $query->orWhere('duration', 'LIKE', "%$searchString%");
                $query->orWhere('payment_method', 'LIKE', "%$searchString%");
                $query->orWhere('id', 'LIKE', "%$searchString%");
                $query->orWhere('ref', 'LIKE', "%$searchString%");
            });
        }

        if ($request->input('filter_by')) {
            $filter = strtolower($request->input('filter_by'));
            switch ($filter) {
                case 'pending':
                    $query->where('status', PendingDeposit::STATUS_PENDING);
                    break;
                case 'verified':
                    $query->where('status', PendingDeposit::STATUS_VERIFIED);
                    break;
                case 'canceled':
                    $query->where('status', PendingDeposit::STATUS_CANCELED);
                    break;
            }
        }

        $sort = explode('.', $request->input('sort_by', 'id.desc'));
        if (count($sort) > 0 && in_array($sort[0], $this->sortable))
            $query->orderBy($sort[0], $sort[1]);

        $deposits = $query->latest()->get();

        $breadcrumb = [
            [
                'link' => route('deposits'),
                'title' => 'Deposits'
            ],
            [
                'link' => route('deposits.transactions'),
                'title' => 'Transactions'
            ]
        ];

        return view('deposit.transactions', [
            'deposits' => $deposits,
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * Display a listing of the deposit.
     *
     * @param $ref
     * @return Factory|View
     */
    public function show($ref)
    {
        $deposit = Deposit::whereRef($ref)->firstOrFail();

        $breadcrumb = [
            [
                'link' => route('deposits'),
                'title' => 'Deposits'
            ],
            [
                'link' => route('deposit', ['ref', $ref]),
                'title' => 'Deposit: ' . $ref
            ]
        ];

        return view('deposit.show-deposit', [
            'breadcrumb' => $breadcrumb,
            'deposit' => $deposit,
        ]);
    }

    /**
     * Display a listing of the plan.
     *
     * @param $ref
     * @return Factory|View
     */
    public function showTransaction($ref)
    {
        $deposit = PendingDeposit::where('ref', $ref)->firstOrFail();

        if ($deposit->payment_method == PendingDeposit::PAYMENT_METHOD_BTC) {
            return $this->showBlockChainTransaction($deposit->ref, $deposit);
        } elseif ($deposit->payment_method != PendingDeposit::PAYMENT_METHOD_PM) {
            $transaction = Transaction::where('invoice', $ref)->firstOrFail();
            return $this->showCoinpaymentTransaction($transaction->txn_id, $transaction);
        }

        $breadcrumb = [
            [
                'link' => route('deposits'),
                'title' => 'Deposits'
            ],
            [
                'link' => route('deposits.transactions'),
                'title' => 'Invest'
            ],
            [
                'link' => $deposit->url,
                'title' => 'Transaction: ' . $ref
            ]
        ];

        $perfectMoney = new PerfectMoney();

        return view('deposit.perfectmoney-proceed', [
            'proceed_form' => $perfectMoney->makePayment([
                'PAYMENT_AMOUNT' => $deposit->verifying_amount,
                'PAYMENT_ID' => $deposit->id
            ]),
            'deposit' => $deposit,
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * Display a listing of the plan.
     *
     * @param $ref
     * @param PendingDeposit|null $deposit
     * @return Factory|View
     */
    public function showBlockChainTransaction($ref, PendingDeposit $deposit = null)
    {
        if (!$deposit) {
            $deposit = PendingDeposit::whereRef($ref)->firstOrFail();
        }
        $breadcrumb = [
            [
                'link' => route('deposits'),
                'title' => 'Deposits'
            ],
            [
                'link' => route('deposits.blockchain_transaction', ['ref', $ref]),
                'title' => 'Deposit Transaction : ' . $deposit->ref
            ]
        ];

        $plan = $deposit->plan;
        
        $qrcode = 'https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:' . $deposit->token . '?amount=' . $deposit->verifying_amount;
            
        return view('deposit.show-blockchain-transaction-details', [
            'breadcrumb' => $breadcrumb,
            'deposit' => $deposit,
            'qrcode' => $qrcode,
            'plan' => $plan
        ]);
    }

    /**
     * Display a listing of the plan.
     *
     * @param $id
     * @param Transaction $transaction
     * @return Factory|View
     */
    public function showCoinpaymentTransaction($id, Transaction $transaction = null)
    {
        if (!$transaction) {
            $transaction = Transaction::where('txn_id', $id)->firstOrFail();
        }
        
        
     //   dd($transaction);
        //dgb coin
        if($transaction->currency2 == "DGB"){
            
            
             $breadcrumb = [
            [
                'link' => route('deposits'),
                'title' => 'Deposits'
            ],
            [
                'link' => route('deposits.coinpayment_transaction', ['id', 'DSDKGE8myQK7o2a8vhunDVR4dyAQVr5jso']),
                'title' => 'Deposit Transaction : ' . 'DSDKGE8myQK7o2a8vhunDVR4dyAQVr5jso'
            ]
        ];
        
        
        
        $deposit = PendingDeposit::whereRef($transaction->invoice)->firstOrFail();
        $plan = $deposit->plan;

        return view('deposit.show-coinpayment-dg-transaction-details', [
            'breadcrumb' => $breadcrumb,
            'transaction' => $transaction,
            'deposit' => $deposit,
            'plan' => $plan
        ]);
        
        }
        //litecoins
        
        if($transaction->currency2 == "LTC"){
            
            
             $breadcrumb = [
            [
                'link' => route('deposits'),
                'title' => 'Deposits'
            ],
            [
                'link' => route('deposits.coinpayment_transaction', ['id', 'LhDbviHgM1RZrNBxbFceWZf6T6NPeELuny']),
                'title' => 'Deposit Transaction : ' . 'LhDbviHgM1RZrNBxbFceWZf6T6NPeELuny'
            ]
        ];
        
        
        
        $deposit = PendingDeposit::whereRef($transaction->invoice)->firstOrFail();
        $plan = $deposit->plan;

        return view('deposit.show-coinpayment-litecoins-transaction-details', [
            'breadcrumb' => $breadcrumb,
            'transaction' => $transaction,
            'deposit' => $deposit,
            'plan' => $plan
        ]);
        
        }
        
        //eth transactions
         if($transaction->currency2 == "ETH"){
             $breadcrumb = [
            [
                'link' => route('deposits'),
                'title' => 'Deposits'
            ],
            [
                'link' => route('deposits.coinpayment_transaction', ['id', '0xd5d4f313b28b5256a5bed2f00de3c4f9f1f7c3c0']),
                'title' => 'Deposit Transaction : ' . '0xd5d4f313b28b5256a5bed2f00de3c4f9f1f7c3c0'
            ]
        ];
        
        
        
        $deposit = PendingDeposit::whereRef($transaction->invoice)->firstOrFail();
        $plan = $deposit->plan;

        return view('deposit.show-coinpayment-eth-transaction-details', [
            'breadcrumb' => $breadcrumb,
            'transaction' => $transaction,
            'deposit' => $deposit,
            'plan' => $plan
        ]);
        
          //  }
         }
                $breadcrumb = [
            [
                'link' => route('deposits'),
                'title' => 'Deposits'
            ],
            [
                'link' => route('deposits.coinpayment_transaction', ['id', '1Kmtc9KGygUcYcW8RSBCKXCxuecmrRhtY3']),
                'title' => 'Deposit Transaction : ' . '1Kmtc9KGygUcYcW8RSBCKXCxuecmrRhtY3'
            ]
        ];
        
        
        
        $deposit = PendingDeposit::whereRef($transaction->invoice)->firstOrFail();
        $plan = $deposit->plan;

        return view('deposit.show-coinpayment-transaction-details', [
            'breadcrumb' => $breadcrumb,
            'transaction' => $transaction,
            'deposit' => $deposit,
            'plan' => $plan
        ]);
   //}

    }

    /**
     * Update payouts.
     *
     * @param Request $request
     * @return Response
     */
    public function updatePayouts(Request $request)
    {
        $deposits = Deposit::whereStatus(Deposit::STATUS_ACTIVE);
    }

    /**
     * Display a listing of the plan.
     *
     * @param Request $request
     * @param $id
     * @return string
     */
     
     public function saveHashNo(Request $request, $id){
       // dd(decrypt($id));
         $deposit = PendingDeposit::where('ref', decrypt($id))->first();
         if($deposit){
             PendingDeposit::where('ref', $deposit->ref)->update(['hash_no' => $request->hash]);
                    Session::flash('alert', 'success');
                    Session::flash('done', 'readonly');
                    Session::flash('message', 'Your request is pending, Your deposit will be approved once confirmed');
                    return back();
         }else{
             return redirect()->route('home');
         }
                    
     }
    public function invest(Request $request, $id = null)
    {
        
       $id = decrypt($id);
        $plans = Plan::with('package')->get();
        $packages = Package::with('plans')->get();
        $balance = $request->user()->wallet->amount;
        $bonus = $request->user()->wallet->bonus;
        $investment = Deposit::where(['plan_id' => $id, 'user_id'=>auth()->user()->id])->take(5)->get();

        //adding more fields


        $breadcrumb = [
            [
                'link' => route('deposits'),
                'title' => 'Deposits'
            ],
            [
                'link' => route('deposits.invest', ['id' => $id]),
                'title' => 'Invest'
            ]
        ];

        if ($id == null) {
            return view('mobile.packages', [
                'breadcrumb' => $breadcrumb,
                'plans' => $plans,
                'packages' => $packages,
                'balance' => $balance,
                'bonus' => $bonus
            ]);
        }
        $plan = Plan::findOrFail($id);
        return view('mobile.invest', [
            'breadcrumb' => $breadcrumb,
            'plan' => $plan,
            'plans' => $plans,
            'balance' => $balance,
            'bonus' => $bonus,
            'investment' => $investment 
        ]);
    }

    /**
     * Display a listing of the plan.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function doInvest(Request $request, $id)
    {
        $id = decrypt($id);
        $plan = Plan::findOrFail($id);

        $this->validate($request, [
            'amount' => "required|numeric",
            'payment_method' => 'required'
        ]);
    if($plan->min_deposit > $request->amount){
        
         Session::flash('msg', 'error');
              Session::flash('message', 'Amount must be greater than $'.$plan->min_deposit); 
            return redirect()->back();
    }
    if($plan->max_deposit <  $request->amount){
        
         Session::flash('msg', 'error');
              Session::flash('message', 'Amount must be less than $'.$plan->max_deposit); 
            return redirect()->back();
    }
        $amount = $request->input('amount');
        $paymentMethod = $request->input('payment_method');
        $ref = generate_reference();
        switch ($paymentMethod) {
            case 'wallet':
                return $this->investFromWallet($request, $plan, $amount, $ref);
                break;
            case Deposit::PAYMENT_METHOD_BTC:
            case Deposit::PAYMENT_METHOD_DGB:
            case Deposit::PAYMENT_METHOD_ETH:
            case Deposit::PAYMENT_METHOD_LTC:
            case Deposit::PAYMENT_METHOD_BCH:
                return $this->investFromCripto($request, $plan, $amount, $paymentMethod, $ref);
            case Deposit::PAYMENT_METHOD_PM:
                return $this->investFromPerfectMoney($request, $plan, $amount, $ref);
        }
    }

    private function investFromWallet(Request $request, Plan $plans, $amount, $ref)
    {
        $userWallet = $request->user()->wallet;
        if ($userWallet->total_amount < $amount) {
              Session::flash('msg', 'error');
              Session::flash('message', 'You dont have enough fund to invest on this plan'); 
            return redirect()->back();
        }

        UserWallet::reduceAmount($request->user(), $request->input('amount'));

        try {
            $deposit = $this->saveDeposit($ref, $plans, $request->user(), $amount, Deposit::PAYMENT_METHOD_WALLET);
        } catch (Exception $e) {
            return redirect()->route('home')->withInput()->with('error', 'Unable to invest on plan');
        }

        try {
            $request->user()->notify(new InvestmentCreated($deposit));
        } catch (Exception $exception) {

        }
        Session::flash('msg', 'success');
        Session::flash('message', 'Investment Initiated successfully'); 
       
        return redirect()->route('deposits')->with('success', 'Investment added successfully');
    }

    protected function investFromCripto(Request $request, Plan $plan, $amount, $currency, $ref)
    {
        $fee = $amount * self::ITEM_TAX_RATE/ 100;
        $cost = $amount + $fee;
        $deposit = $this->savePendingDeposit($ref, $plan, $request->user(), $amount, $fee,  $cost, $currency);
        
        $additionalFields = [
            'buyer_email' => 'mirandemyyichelle@gmail.com',
            'buyer_name' => 'Investor',
            'item_name' => 'Investments',
            'item_number' => $deposit->id,
            'invoice' => $ref,
        ];
        try {
            /** @var Transaction $transaction */
            $transaction = Coinpayments::createTransactionSimple($cost, self::ITEM_CURRENCY, $currency, $additionalFields);
            //dd($transaction);
      
            Log::info($transaction);
            Session::flash('msg', 'success');
            Session::flash('message', 'Deposit Initiated Successfully'); 
            return redirect()->route('deposits.coinpayment_transaction', ['id' => $transaction->txn_id]);
        } catch (Exception $exception) {
            Log::error($exception);
            $deposit->delete();
            Session::flash('msg', 'error');
            Session::flash('message', 'Unable to create deposit transaction'); 
           
            return redirect()
                ->back()
                ->withInput();
        }
        
    }

    protected function investFromPerfectMoney(Request $request, Plan $plan, $amount, $ref)
    {
        $fee = $amount * self::ITEM_TAX_RATE/ 100;
        $cost = $amount + $fee;
        $deposit = $this->savePendingDeposit($ref, $plan, $request->user(), $amount, $fee,  $cost, Deposit::PAYMENT_METHOD_PM);
        $perfectMoney = new PerfectMoney();

        $breadcrumb = [
            [
                'link' => route('deposits'),
                'title' => 'Deposits'
            ],
            [
                'link' => route('deposits.invest', ['id' => $plan->id]),
                'title' => 'Invest'
            ]
        ];

        return view('deposit.perfectmoney-proceed', [
            'proceed_form' => $perfectMoney->makePayment([
                'PAYMENT_AMOUNT' => $cost,
                'PAYMENT_ID' => $deposit->id
            ]),
            'deposit' => $deposit,
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * @param string $ref
     * @param Plan $plan
     * @param User $user
     * @param $amount
     * @param string $paymentMethod
     * @return Deposit|Model
     */
    protected function saveDeposit($ref, Plan $plan, User $user, $amount, $paymentMethod) {
        $expireDate = Carbon::now();

        switch ($plan->package->payment_period) {
            case Package::PERIOD_HOURLY:
            case Package::PERIOD_AFTER_SPECIFIED_HOURS:
                $expireDate->addHours($plan->package->duration);
                break;
            case Package::PERIOD_DAILY:
            case Package::PERIOD_WEEKLY:
            case Package::PERIOD_MONTHLY:
            case Package::PERIOD_2_MONTHS:
            case Package::PERIOD_3_MONTHS:
            case Package::PERIOD_6_MONTHS:
            case Package::PERIOD_AFTER_SPECIFIED_DAYS:
                $expireDate->addDays($plan->package->duration);
        }

        return Deposit::create([
            'ref' => $ref,
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'payment_method' => $paymentMethod,
            'amount' => $amount,
            'profit_rate' => $plan->profit_rate,
            'expires_at' => $expireDate,
            'duration' => $plan->package->duration,
            'payment_period' => $plan->package->payment_period
        ]);
    }

    /**
     * @param string $ref
     * @param Plan $plan
     * @param User $user
     * @param $amount
     * @param $fee
     * @param $verifying_amount
     * @param $paymentMethod
     * @return PendingDeposit|Model
     */
    protected function savePendingDeposit($ref, Plan $plan, User $user, $amount, $fee, $verifying_amount, $paymentMethod) {
        return PendingDeposit::create([
            'ref' => $ref,
            'user_id' => $user->id,
            'fee' => $fee,
            'verifying_amount' => $verifying_amount,
            'plan_id' => $plan->id,
            'amount' => $amount,
            'profit_rate' => $plan->profit_rate,
            'payment_method' => $paymentMethod,
            'duration' => $plan->package->duration,
            'payment_period' => $plan->package->payment_period
        ]);
    }
}
