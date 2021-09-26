@extends('layouts.app')
@section('content')

     <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                           <div class="nk-block-head">
                                <div class="nk-block-between-md g-4">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title fw-normal">Invest</h5>
                                        
                                    </div>
                                    <div class="nk-block-head-content">
                                        <ul class="nk-block-tools gx-3">
                                            <li class="order-md-last">
                                            <a href="{{ route('deposits') }}" class="btn btn-primary"><span>My Deposits</span> <em class="icon ni ni-arrow-long-right"></em></a></li>
                                       </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="buysell wide-xs m-auto">
                               
                               <form method="post" action="{{ route('deposits.invest', ['id' => $plan->id]) }}">
                                @csrf
                                <div class="buysell-block">
                                    <form action="#" class="buysell-form">
                                   
                                            <div class="card-inner-group h-100 card-bordered">
                                                <div class="card-inner">
                                                     <center>  <h6>{{ $plan->package->name }} ({{ $plan->name }})</h6></center>
                                                   <center> <h5 class="btn btn-light" style="margin-top:20px"> {{ $plan->profit_rate }}% / {{ $plan->package->formatted_payment_period_alt }}</h5></center>
                                               </div>
                                                <div class="card-inner">
                                                    <ul class="list list-step">
                                                        <li class="list-step-done">Minimum Deposit: {{ moneyFormat($plan->min_deposit, 'USD') }}</li>
                                                        <li class="list-step-done">Maximum Deposit: {{ moneyFormat($plan->max_deposit, 'USD') }}</li>
                                                         <li class="list-step-done">Duration:       {{ $plan->package->formatted_duration }}</li>
                                                        <li class="list-step-done">Wallet Balance: {{ moneyFormat($balance, 'USD') }}</li>
                                                         <li class="list-step-done">Bonus Balance: {{ moneyFormat($bonus, 'USD') }}</li>
                                                        
                                                    </ul>
                                                        <div class="buysell-field form-group">
                                            <div class="form-label-group">
                                                <label class="form-label">Amount</label>
                                            </div>
                                            <div class="dropdown buysell-cc-dropdown">
                                            <input type="text" name="amount" value="{{ old('amount', $plan->min_deposit) }}" class="form-control {{ form_invalid('amount') }}" id="inputAmount" aria-describedby="AmountHelp" placeholder="Enter amount">
                                               </div>
                                                <small id="AmountHelp" class="form-text text-muted">
                                                    Deposit amount in USD
                                                </small>
                                                 @showError('amount')
                                               
                                        </div>

                                          <div class="buysell-field form-group">
                                            <div class="form-label-group">
                                                <label class="form-label">Payment Method</label>
                                            </div>
                                            <div class="dropdown buysell-cc-dropdown">
                                             <select type="text" class="form-control {{ form_invalid('payment_method') }}" name="payment_method" id="inputPaymentMethod" aria-describedby="paymentMethodHelp">
                                        @foreach(get_payment_methods() as $oKey => $oValue)
                                            @if($oKey == 'wallet')
                                                @if(($balance + $bonus) >= $plan->min_deposit)
                                                    <option {{ old('payment_method') == $oKey ? 'selected' : '' }} value="{{ $oKey }}">{{ $oValue }}</option>
                                                @endif
                                            @else
                                                <option {{ old('payment_method') == $oKey ? 'selected' : '' }} value="{{ $oKey }}">{{ $oValue }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                            </div>
                                            <small id="paymentMethodHelp" class="form-text text-muted">
                                                Select Deposit payment method
                                            </small>
                                            @showError('payment_method')<!-- .dropdown -->
                                        </div>
                                             <div class="buysell-field form-action">
                                        <button type="submit" class="btn btn-lg btn-block btn-primary">Submit</button>
                                     </div>
                                                </div>
                                        
                                         
                                        </div>
                                </div>
                                </form><!-- .buysell-block -->
                            </div><!-- .buysell -->
                        </div>
                    </div>
                </div>
      
@endsection
@section('scripts')

<script>

let message = {!! json_encode(Session::get('message')) !!};
let msg = {!! json_encode(Session::get('alert')) !!};


//alert(msg);
if(message != null){
toastr.clear();
    NioApp.Toast(message , msg, {
      position: 'top-right',
        timeOut: 5000,
    });
}

</script>
@endsection