@extends('layouts.app')
@section('content')
     <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                           <div class="nk-block-head">
                                <div class="nk-block-between-md g-4">
                                    <div class="nk-block-head-content">
                                        <h4 class="card-title title"> Start New Campaign </h4>
                                        
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
                               
                               <form method="post" action="{{ route('deposits.invest', ['id' => encrypt($plan->id)]) }}">
                                @csrf
                                <div class="card card-bordered pricing">
                                <div class="pricing-head"><div class="pricing-title">
                                    <h4 class="card-title title">{{ $plan->package->name }}({{ $plan->name }})</h4>
                                    <p class="sub-text">  invest  in {{ $plan->name }} &amp; earn {{ $plan->profit_rate }}% interest.</p></div>
                                    <div class="card-text"><div class="row"><div class="col-6">
                                        <span class="h4 fw-500">{{ $plan->profit_rate }}%</span><span class="sub-text">{{ $plan->package->formatted_payment_period_alt2 }} Interest</span></div>
                                        <div class="col-6"><span class="h4 fw-500">7</span><span class="sub-text">Days</span></div></div></div>
                                        </div>
                                        <div class="pricing-body"><ul class="pricing-features"><li><span class="w-50">Min Deposit</span> - <span class="ml-auto">{{ moneyFormat($plan->min_deposit, 'USD') }}</span></li>
                                        <li><span class="w-50">Max Deposit</span> - <span class="ml-auto">{{ moneyFormat($plan->max_deposit, 'USD') }}</span></li>
                                        <li ><span class="w-50">Duration</span> - <span class="ml-auto">{{ $plan->package->formatted_duration }}</span>
                                      
                                        </ul>
                                        <div class="buysell-field form-group">
                                            <div class="form-label-group">
                                                <label class="form-label">Amount</label>
                                            </div>
                                            <div class="dropdown buysell-cc-dropdown w-100">
                                            <input type="text" name="amount" value="{{ old('amount', $plan->min_deposit) }}" class="form-control {{ form_invalid('amount') }}" id="inputAmount" aria-describedby="AmountHelp" placeholder="Enter amount">
                                               </div>
                                                <small id="AmountHelp" class="form-text text-muted">
                                                    Deposit amount in USD
                                                    @showError('amount')
                                                </small>
                                               
                                                
                                                
                                        </div>
                                    <div class="buysell-field form-group">
                                            <div class="form-label-group">
                                                <label class="form-label">Payment Method</label>
                                            </div>
                                            <div class="dropdown buysell-cc-dropdown w-100">
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
                                        <button type="submit" class="btn btn-lg btn-block btn-primary">Submit</button></div></div>
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