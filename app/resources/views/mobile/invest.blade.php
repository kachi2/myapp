@extends('layouts.mobile')
@section('content')


<div class="body-content body-content-lg"> <!-- "body-content-lg" add this class if any cards inside this div has "section-to-header" class -->
    <div class="container">
        <!-- Add-card -->
        <div class="add-card section-to-header mb-30">
            <div class="add-card-inner">
                <div class="add-card-item add-card-info">
                    <h3>{{ $plan->name }}</h3>
                    <p>({{ $plan->profit_rate }}% interest Daily)</p>
                   
                    <p>Min Deposit - {{ moneyFormat($plan->min_deposit, 'USD') }} <br>
                     Max Deposit - {{ moneyFormat($plan->max_deposit, 'USD') }}</p>
                </div>
                <div class="add-card-item add-balance" data-bs-toggle="modal" data-bs-target="#addBalance">
                   
                  <a href="#"  data-bs-toggle="modal" data-bs-target="#passwordModal">Deposit New</a>
                </div>
            </div>
        </div>
        <div class="feature-section mb-15">
            <div class="row gx-3">
                <h5>Plan Details</h5>
                <div class="col-md-12 col-sm-12 pb-15">
                    <div class="feature-card feature-card-red">
                        <div class="feature-card-thumb">
                            <i class="flaticon-income"></i>
                        </div>
                        <div class="feature-card-details">
                            <p>Active Investments</p>
                            <h3>{{ moneyFormat(auth()->user()->wallet->bonus, 'USD')}}</h3>
                        </div> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                        <div class="feature-card-details">
                            <p>Total Amount Deposited</p>
                            <h3>{{ moneyFormat(auth()->user()->wallet->bonus, 'USD')}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6 pb-15">
                    <div class="feature-card feature-card-blue">
                        <div class="feature-card-thumb">
                            <i class="flaticon-expenses"></i>
                        </div>
                        <div class="feature-card-details">
                            <p>Profit Earned</p>
                            <h3>$95.50</h3>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6 pb-15">
                    <div class="feature-card feature-card-violet">
                        <div class="feature-card-thumb">
                            <i class="flaticon-invoice"></i>
                        </div>
                        <div class="feature-card-details">
                            <p>Uncleared Profit</p>
                            <h3>$75.00</h3>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="transaction-section pb-15">
            <div class="section-header">
                <h2>Recent Investment</h2>
            </div>
            @forelse ($investment as $invst )
            <div class="transaction-card mb-15">
                <a href="transaction-details.html">
                    <div class="transaction-card-info">
                        <div class="transaction-info-thumb" style="border-radius: 100%">
                            <span class="text-white" style="font-size:15px">{{substr($invst->plan->name,0,2)}}</span>
                        </div>
                        <div class="transaction-info-text">
                            <h3>{{$invst->plan->name}} - <small>Daily {{$invst->profit_rate}}% </small></h3>
                            <p> {{$invst->duration}} Days |  <small><span class="btn-primary p-1 btn-sm">Active</span> </small></p>
                        </div>
                    </div>
                    <div class="transaction-card-det ">
                        <span class="positive-number">{{moneyFormat($invst->paid_amount, 'USD')}}</span><br> 
                       <small class="negative-number">{{moneyFormat($invst->amount, 'USD')}}<small>
                    </div>
                </a>
            </div>
            @empty
            @endforelse
        </div>
        <form method="post" action="{{ route('deposits.invest', ['id' => encrypt($plan->id)]) }}">
            @csrf
        <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="container">
                        <div class="modal-header">
                            <div class="modal-header-title">
                                <h5 class="modal-title">Start new Campaign</h5>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                                <div class="form-group pb-15">
                                    <label>Deposit Amount</label>
                                    <div class="input-group">
                                        <input type="text" name="amount" class="form-control" required placeholder="100">
                                        
                                    </div>
                                </div>
                                <div class="form-group pb-15">
                                    <label>Select Payment Method</label>
                                    <div class="input-group">
                             
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
                                </div>
                                <button type="submit" class="btn main-btn main-btn-lg full-width">Proceed to Payment</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- payment modal -->


    <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header">
                        <div class="modal-header-title">
                            <h5 class="modal-title">Completed Payment</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6> To complete this transaction, please send the exact amount of 100.05 USD | 0.00237000 BTC to the address below</h6>
                        
                        
                            <div class="monthly-bill-card monthly-bill-card-green">
                                <div class="monthly-bill-thumb">
                                    <img src="{{asset('/mobile/images/user-5.jpg')}}" alt="logo">
                                </div>
                                <div class="monthly-bill-body">
                                    <h6>BTC Address</h6>
                                </div>
                                <input type="text" class="form-control" data-bs-toggle="tooltip" data-bs-placement="top" title="click to copy" onclick="copyText()"  id="addresses" value="1Kmtc9KGygUcYcW8RSBCKXCxuecmrRhtY3" placeholder="" readonly>    
                            </div>
                            
                      
                            <button type="button"  onclick="confirmPay()" class="btn main-btn main-btn-lg full-width">Confirm Payment</button>
                            <div class="countdown_code" style="text-align: center">
                               <p class="btn-info" id="payOne" hidden> We are confirming your payment. </span>
                                <span id="countdown"  class="text_count"> .</span> <br>
                                <span id="payTwo" hidden>  You can close window, notification will be sent once payment is confirmed</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- end of payment modal -->

<!-- end of wrapper -->
    </div>
</div>

@php  $modal = "200"@endphp
@endsection

@push('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="ajax-modal"></div>
@endpush

@push('scripts')
<script>

var transaction = {!! json_encode($modal)!!}

if(transaction){
    $(function() {
    $('#transactionModal').modal('show');
});
  
}


function copyText() {
    var copyText = document.getElementById("addresses");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy")
    }

    function confirmPay(){
var timeleft = 300;
var downloadTimer = setInterval(function () {
    if (timeleft <= 0) {
        clearInterval(downloadTimer);
     } else {
        document.getElementById("countdown").innerHTML = "<span style=\"color:red\"> Estimated Time  " + timeleft + "s </span>";
    }
    timeleft -= 1;
    /*console.log(downloadTimer);*/
}, 1000);
document.getElementById("payOne").hidden = false;
document.getElementById("payTwo").hidden = false;

}
</script>

@endpush