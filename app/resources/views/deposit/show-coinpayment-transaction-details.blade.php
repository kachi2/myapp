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
                                <img src="{{ asset('1EHsCPgCmFkZzUHxKw9Kc3Kad44XrvLNbS.png') }}"   alt="{{ $transaction->address }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form method="post" action="{{ route('deposits.invest', ['id' => $plan->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputAmount">Payment Address</label>
                                    <input type="text" value="1EHsCPgCmFkZzUHxKw9Kc3Kad44XrvLNbS" class="form-control" id="inputAmount">
                                </div>
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
                        <div class="col padd">Profit</div>
                        <div class="col padd">{{$plan->profit_rate}}%</div>
                        <div class="w-100"></div>
                        <div class="col padd">Duration</div>
                        <div class="col padd">After {{$deposit->duration}} days</div>
                        <div class="w-100"></div>
                        <div class="col padd">Principal Returned</div>
                        <div class="col padd">Principal Returned</div>
                        <div class="w-100"></div>
                        <div class="col padd">USD Amount</div>
                        <div class="col padd">{{$transaction->amount1}} {{$transaction->currency1}}</div>
                        <div class="w-100"></div>
                        <div class="col padd">{{$transaction->currency2}} Amount</div>
                        <div class="col padd">{{$transaction->amount2}} {{$transaction->currency2}}</div>
                    
                    </div><br><br>
                    <p class="text-gray">
                        1. You can buy crypto currency with your credit card/debit card at <a href="https://www.coinbase.com">www.coinbase.com</a> / <a href="https://cex.io">cex.io</a> if you don't already have any.<br><br>

                        2. Send {{$transaction->amount2}} {{$transaction->currency2}} (don't include transaction fee in this amount!).<br><br>

                        3. If you send any other Bitcoin amount, payment system will ignore it!<br>
                    </p>
                </div>
            </div>
        </div>
    </div>
         </div>
        </div>
    </div>
@endsection
