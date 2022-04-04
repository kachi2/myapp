@extends('layouts.app')
@section('content')

<style type="text/css">
    .padd {
        padding: 10px;
    }
    .w-100 {
        background-color: #888888;
        height: 0.5px;
    }
</style>
     <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                           <div class="nk-block-head">
                                <div class="nk-block-between-md g-4">
                                    <div class="nk-block-head-content">
                                    </div>
                                    <div class="nk-block-head-content">
                                        <ul class="nk-block-tools gx-3">
                                     </ul>
                                    </div>
                                </div>
                            </div>
    <div class="body-content row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="header-title mb-0 pb-3">
                        Pay ( {{$transaction->amount1}} {{$transaction->currency1}} ) | ( {{$transaction->amount2}} {{$transaction->currency2}} ) to the given wallet address
                    </h6>
                    <div class="row mb-4 mt-3">
                        <div class="col-12">
                            <div class="card-img" style="width: 100%" align="center">
                                   <p> Copy the Generated DGE wallet, Send ${{$transaction->amount2}} equivalent DGE to the DGN wallet, Copy the Transaction Hash ID if available and Paste In The Form Provided Below, Then Click "Complete Transaction"</p>
                           
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form method="post" action="{{ route('deposits.invest', ['id' => $plan->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputAmount">DGE Wallet Address</label>
                                    <input type="text" value="DSDKGE8myQK7o2a8vhunDVR4dyAQVr5jso" class="form-control" id="inputAmount" readOnly>
                                </div>
                                <div class="form-group">
                                    <label for="inputAmount">Transaction Hash</label>
                                    <input type="text" placeholder="Enter the transaction hash" class="form-control" id="inputAmount"> 
                                     <span style="font-size:10px"> check your transaction receipt for Hash number </span>
                                </div>
                                  <button type="submit" class="btn btn-primary"> Complete Transaction </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                      <div class="row mb-4 mt-3">
                        <div class="col padd">Daily Returns</div>
                        <div class="col padd">{{($transaction->amount1*$plan->profit_rate)/100}}</div>
                        <div class="w-100"></div>
                        <div class="col padd">Duration</div>
                        <div class="col padd">After {{$deposit->duration}} days</div>
                        <div class="w-100"></div>
                        <div class="w-100"></div>
                        <div class="col padd">USD Amount</div>
                        <div class="col padd">{{$transaction->amount1}} {{$transaction->currency1}}</div>
                        <div class="w-100"></div>
                        <div class="col padd">{{$transaction->currency2}} Amount</div>
                        <div class="col padd">{{$transaction->amount2}} {{$transaction->currency2}}</div>
                    
                    </div>
                     <p class="text-gray">
                        1. You can buy crypto currency with your credit card/debit card at <a href="https://www.coinbase.com">www.coinbase.com</a>  if you don't already have any.<br>
                        2. Send {{$transaction->amount2}} {{$transaction->currency2}} (don't include transaction fee in this amount!).<br>
                        3. If you send any other DGE amount, payment system will ignore it!<br>
                    </p>
                </div>
            </div>
        </div>
    </div>
         </div>
        </div>
    </div>
@endsection
