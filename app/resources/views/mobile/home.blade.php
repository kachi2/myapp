  <!-- Body-content -->
  @extends('layouts.mobile')
  
  @section('content')
        <div class="body-content body-content-lg"> <!-- "body-content-lg" add this class if any cards inside this div has "section-to-header" class -->
            <div class="container">
                <!-- Add-card -->
                <div class="add-card section-to-header mb-30">
                    <div class="add-card-inner">
                        <div class="add-card-item add-card-info">
                            <p>Main Balance</p>
                            <h3>{{ moneyFormat(auth()->user()->wallet->amount, 'USD') }}</h3>
                        </div>
                        
                    </div>
                </div>
                <!-- Add-card -->
                <!-- Option-section -->
                <div class="option-section mb-15">
                    <div class="row gx-3">
                        <div class="col pb-15">
                            <div class="option-card option-card-violet">
                                <a href="{{route('withdrawals')}}" >
                                    <div class="option-card-icon">
                                        <i class="flaticon-down-arrow"></i>
                                    </div>
                                    <p>Withdraw</p>
                                </a>
                            </div>
                        </div>
                        <div class="col pb-15">
                            <div class="option-card option-card-yellow">
                                <a href="{{route('transfer')}}" >
                                    <div class="option-card-icon">
                                        <i class="flaticon-right-arrow"></i>
                                    </div>
                                    <p>Send</p>
                                </a>
                            </div>
                        </div>
                        <div class="col pb-15">
                            <div class="option-card option-card-blue">
                                <a  href="#" data-bs-toggle="modal" data-bs-target="#DepositModal">
                                    <div class="option-card-icon">
                                        <i class="flaticon-credit-card"></i>
                                    </div>
                                    <p>Deposit</p>
                                </a>
                            </div>
                        </div>
                        <div class="col pb-15">
                            <div class="option-card option-card-red">
                                <a href="{{route('earn.bonus')}}">
                                    <div class="option-card-icon">
                                        <i class="flaticon-exchange-arrows"></i>
                                    </div>
                                    <p>Earn</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Option-section -->
                <!-- Feature-section -->
                <div class="feature-section mb-15">
                    <div class="row gx-3">
                        <div class="col col-sm-6 pb-15">
                            <div class="feature-card feature-card-red">
                                <div class="feature-card-thumb">
                                    <i class="flaticon-income"></i>
                                </div>
                                <div class="feature-card-details">
                                    <p>Total Received</p>
                                    <h3>{{ moneyFormat($payouts, 'USD')}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col col-sm-6 pb-15">
                            <div class="feature-card feature-card-blue">
                                <div class="feature-card-thumb">
                                    <i class="flaticon-expenses"></i>
                                </div>
                                <div class="feature-card-details">
                                    <p>Total Transfers</p>
                                    <h3>{{moneyFormat($bonus, 'USD')}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Feature-section -->
                <!-- Transaction-section -->
                <div class="transaction-section pb-15">
                    <div class="section-header">
                        <h2>Recent Transactions</h2>
                    </div>
                    @forelse ($transfers as $transfer )
                    <div class="transaction-card mb-15">
                        <a href="transaction-details.html">
                            <div class="transaction-card-info">
                                <div class="transaction-info-thumb" style="border-radius: 100%">
                                    <span class="text-white" style="font-size:15px"><?php if(isset($transfer->receiver_id) &&  $transfer->receiver_id != auth()->user()->id){ echo strtoupper(substr($transfer->receiver->username,0,2));}else{echo strtoupper(substr($transfer->sender->username,0,2)) ;}?></span>
                                </div>
                                <div class="transaction-info-text">
                                    <p><?php if(isset($transfer->receiver_id) && $transfer->receiver_id == auth()->user()->id){echo "Received from "."<small>".$transfer->sender->username."</small>"; }else{echo "Transferred  to "."<small>".$transfer->receiver->username."</small>";}   ?>
                                    </p>
                                    <p><small class="positive-number">{{$transfer->created_at->format('d/m/y h:s A')}}<small></p>
                                </div>
                            </div>
                            <div class="transaction-card-det ">
                                <?php if(isset($transfer->receiver_id) && $transfer->receiver_id != auth()->user()->id){ echo "<span style=\"color:#000\">".moneyFormat($transfer->amount, 'USD') ."</span>" ;}else{ echo "<span style=\"color:green\">".moneyFormat($transfer->amount, 'USD') ."</span>" ;}?> <br> 
                                <span class="negative-number">  <?php if(isset($transfer->receiver_id) && $transfer->receiver_id != auth()->user()->id){
                                   echo moneyFormat($transfer->sender_balance, 'USD'); } ?></span><br>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="transaction-card mb-15">
                        <a href="transaction-details.html">
                            <div class="transaction-card-info">
                                <div class="transaction-info-text">
                                    <p>No record found</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforelse
                </div>
                  <form method="post" action="{{route('wallet.deposits')}}" id="DepositForm">
            @csrf
        <div class="modal fade" id="DepositModal" tabindex="-1" aria-labelledby="passwordModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="container">
                        <div class="modal-header">
                            <div class="modal-header-title">
                                <h5 class="modal-title">Add funds to wallet</h5>
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
                                            @foreach(get_payment_method() as $oKey => $oValue)
                                                    <option {{ old('payment_method') == $oKey ? 'selected' : '' }} value="{{ $oKey }}">{{ $oValue }}</option>
                                            @endforeach
                                             <span class="processor"></span>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn main-btn main-btn-lg full-width">  <span class="preloader"> </span>Proceed to Payment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
                        <p style="font-size:12px"> To complete this transaction, please send the exact amount of <span id="amount1"> </span> | <span id="amount2"> </span> to the address below</p>
                            <div class="monthly-bill-card monthly-bill-card-green">
                                <div class="monthly-bill-thumb">
                                    <img src="{{asset('/mobile/images/')}}"  id="barcode" alt="logo">
                                </div>
                                <div class="monthly-bill-body">
                                    <h6><span id="addName"></span> Address</h6>
                                </div>
                                <input type="text" class="form-control" data-bs-toggle="tooltip" data-bs-placement="top" title="click to copy" onclick="copyText()"  id="addresses" value="" placeholder="" readonly>    
                            </div>
                             <button type="button"  onclick="confirmPay()" class="btn main-btn main-btn-lg full-width">Confirm Payment</button>
                            <div class="countdown_code" style="text-align: center">
                               <p style="font-size:12px" class="btn-info" id="payOne" hidden> We are confirming your payment. </span>
                                <span id="countdown"  class="text_count"> .</span> <br>
                                <span id="payTwo" hidden>  You can close window, notification will be sent once payment is confirmed</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
        </div>
    @endsection
@push('scripts')
<script src="{{asset('/mobile/js/custom.js')}}"></script>
@endpush

@push('scripts')

<script>
   var img_url = {!! json_encode(asset('/mobile/images/')) !!};


$('#DepositForm').submit(function(e){
            e.preventDefault();
            var xhr = submit_form('#DepositForm');
            xhr.done(function(result){
                if(result){
                  //  console.log(result);
                    if(result.alert){
                        swal({
                        type:result.alert,
                        text: result.msg
                        }).then(function(){ 
                       // location.reload();
                        });
                    // console.log(result);
                    }else{
                   $('#addresses').attr('value',result.wallet.address);
                  $('#barcode').attr('src',img_url+'/'+result.wallet.barcode);
                    $('#transactionModal').modal("toggle");
                    $('#DepositModal').modal('hide');
                    $('#addName').html(result.deposit.currency2);
                    $('#amount1').html(result.deposit.amount +' '+ result.deposit.currency1 );
                    $('#amount2').html(result.deposit.amount2 +' '+ result.deposit.currency2)
                }
                }else{
                    
                }
            });
        });


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