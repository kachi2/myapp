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
use App\Models\Plan;
use App\Models\UserWallet;
use App\Modules\BlockChain;
use App\Modules\PerfectMoney;
use App\Notifications\InvestmentCreated;
use App\User;
use Exception;
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

        $deposits = $query->paginate();

        $breadcrumb = [
            [
                'link' => route('deposits'),
                'title' => 'Deposits'
            ]
        ];

        return view('deposit.deposits', [
            'deposits' => $deposits,
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

        $deposits = $query->paginate();

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
        $breadcrumb = [
            [
                'link' => route('deposits'),
                'title' => 'Deposits'
            ],
            [
                'link' => route('deposits.coinpayment_transaction', ['id', '1KCKuKgB54t3P5z6e7U7mugn2cT6jUKwK9']),
                'title' => 'Deposit Transaction : ' . '1KCKuKgB54t3P5z6e7U7mugn2cT6jUKwK9'
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
    public function invest(Request $request, $id = null)
    {
        $plans = Plan::with('package')->get();
        $packages = Package::with('plans')->get();
        $balance = $request->user()->wallet->amount;
        $bonus = $request->user()->wallet->bonus;

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
            return view('deposit.select-plan', [
                'breadcrumb' => $breadcrumb,
                'plans' => $plans,
                'packages' => $packages,
                'balance' => $balance,
                'bonus' => $bonus
            ]);
        }

        $plan = Plan::findOrFail($id);
        return view('deposit.invest', [
            'breadcrumb' => $breadcrumb,
            'plan' => $plan,
            'plans' => $plans,
            'balance' => $balance,
            'bonus' => $bonus
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
        $plan = Plan::findOrFail($id);

        $this->validate($request, [
            'amount' => "required|numeric|min:{$plan->min_deposit}|max:{$plan->max_deposit}",
            'payment_method' => 'required'
        ]);

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
            return redirect()->back()->withInput()->withErrors(new MessageBag([
                'amount' => [
                    'You dont have enough fund to invest on this plan'
                ]
            ]));
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

        return redirect()->route('deposits')->with('success', 'Investment added successfully');
    }

    protected function investFromCripto(Request $request, Plan $plan, $amount, $currency, $ref)
    {
        $fee = $amount * self::ITEM_TAX_RATE/ 100;
        $cost = $amount + $fee;
        $deposit = $this->savePendingDeposit($ref, $plan, $request->user(), $amount, $fee,  $cost, $currency);
        
        $additionalFields = [
            'buyer_email' => $request->user()->email,
            'buyer_name' => $request->user()->name,
            'item_name' => 'Invest On ' . config('app.name'),
            'item_number' => $deposit->id,
            'invoice' => $ref,
        ];

        try {
            /** @var Transaction $transaction */
            $transaction = Coinpayments::createTransactionSimple($cost, self::ITEM_CURRENCY, $currency, $additionalFields);
            Log::info($transaction);
            return redirect()->route('deposits.coinpayment_transaction', ['id' => $transaction->txn_id]);
        } catch (Exception $exception) {
            Log::error($exception);
            $deposit->delete();
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Unable to create deposit transaction');
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
