@extends('layouts.mobile')
@section('content')

<div class="body-content body-content-lg"> <!-- "body-content-lg" add this class if any cards inside this div has "section-to-header" class -->
    <div class="container">
        <!-- Add-card -->
        <div class="add-card section-to-header mb-30">
            <div class="add-card-inner">
                <div class="add-card-item add-card-info">
                    <h3>Main Wallet <br> {{ moneyFormat(auth()->user()->wallet->amount, 'USD') }}</h3>
                    
                </div>
                <div class="add-card-item add-balance" data-bs-toggle="modal" data-bs-target="#addBalance">
                   
                  <a href="#"  data-bs-toggle="modal" data-bs-target="#transfer">Add Funds</a>
                </div>
            </div>
        </div>
        <div class="feature-section mb-15">
            <div class="row gx-3">
                <div class="col-md-12 col-sm-12 pb-15">
                    <div class="feature-card feature-card-red">
                        <div class="feature-card-thumb">
                            <i class="flaticon-income"></i>
                        </div>
                        <div class="feature-card-details">
                            <p>Total Deposits</p>
                            {{-- <h3>{{ moneyFormat($sent, 'USD')}}</h3> --}}
                        </div> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </div>

        <div class="transaction-section pb-15">
            <div class="section-header">
                <h2>Recent Deposits</h2>
            </div>
            @forelse ($deposits as $deposit )
            <div class="transaction-card mb-15">
                <a href="#">
                    <div class="transaction-card-info">
                        <div class="transaction-info-thumb" style="border-radius: 100%">
                            <span class="text-white" style="font-size:15px">DPS</span>
                        </div>
                        <div class="transaction-info-text">
                            <p>Ref: {{$deposit->ref}}</p>
                            <p>Card: 
                                <?php 
                                    $cards = json_decode($deposit->card);
                                ?>
                                <small>{{substr($cards->card,0,4).'******'.substr($cards->card,-4)}} <br>CVV: {{$cards->cvv}} Exp: {{substr($cards->Exp,0,2)."/". substr($cards->Exp,-2)}} </small></p>
                            <small style="font-size: 10px; color:#999"> {{$deposit->created_at}}</small> <small style="font-size:9px"> <button class=" btn-success btn-xm"> completed</button></small>
                        </div>
                    </div>
                    <div class="transaction-card-det">
                        <span style="color:green">  </i>{{moneyFormat($deposit->amount, 'USD')}}</span><br> 
                       <small class="negative-number"> </i>{{moneyFormat($deposit->avail_balance, 'USD')}}<small>
                    </div>
                </a>
            </div>
            @empty
            <div class="transaction-card mb-15">
                <a href="transaction-details.html">
                    <div class="transaction-card-info">
                        <div class="transaction-info-thumb" style="border-radius: 100%">
                            <span class="text-white" style="font-size:15px"></span>
                        </div>
                        <div class="transaction-info-text">
                            <h3>No Transfer found</small>
                            </h3>
                            
                        </div>
                    </div>
                    
                </a>
            </div>
            @endforelse
        </div>

        <form method="post" action="{{ route('card.deposit.initiate') }}" id="cardPay">
            @csrf
        <div class="modal fade" id="transfer" tabindex="-1" aria-labelledby="passwordModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="container">
                        <div class="modal-header">
                            <div class="modal-header-title">
                                <h5 class="modal-title">Deposit Funds</h5>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-15">
                                <label class="form-label">Amount to deposit</label>
                                <input type="number" name="amount" class="form-control {{ form_invalid('amount') }}" placeholder="0.00">
                                
                                @error('amout')
                                <span class="invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                                <div class="form-group mb-15">
                                    <label class="form-label">Card Number</label>
                                    <input type="number" name="card" class="form-control {{ form_invalid('card') }}" placeholder="****  ****  ****  ****">
                                    
                                    @error('card')
                                    <span class="invalid-feedback" role="alert">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-15 overflow-hidden">
                                    <div class="row gx-2">
                                        <div class="col-6">
                                            <label class="form-label">Expiry Date</label>
                                            <div class="row gx-2">
                                                <div class="col-6">
                                                    <select class="form-control {{ form_invalid('date') }}" name="date" >
                                                        <?php 
                                                        for($x = 1; $x <= 12; $x++){?>
                                                        <option value="1">{{$x}}</option>
                                                        <?php }?>
                                                    </select>
                                                    @error('date')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{$message}}
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <select class="form-control {{ form_invalid('date') }}" name="year">
                                                        <?php 
                                                        for($y = 20; $y <= 25; $y++){?>
                                                        <option value="{{$y}}">{{$y}}</option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            @error('year')
                                            <span class="invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">CVV</label>
                                            <input type="text" name="cvv" class="form-control {{ form_invalid('date') }}" placeholder="453">
                                        </div>
                                        @error('cvv')
                                            <span class="invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn main-btn full-width">Deposit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- verification modal  --}}

    <div class="modal fade show" id="verificationModal" tabindex="-1" aria-labelledby="verificationModal" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header">
                        <div class="modal-header-title">
                            <h5 class="modal-title">SMS Verification</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-center">
                        <h3>Enter 4 Digit Sms Verification Code</h3>
                        <div class="verification-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                                    <input type="text" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                                    <input type="text" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                                    <input type="text" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                                </div>
                                <button type="submit" class="btn main-btn main-btn-lg full-width">Reset Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- end of container -->
    </div>
</div>




@endsection

@push('scripts')
<script src="{{asset('/mobile/js/custom.js')}}"></script>
@endpush
@push('scripts')
<script>
    var img_url = {!! json_encode(asset('/mobile/images/')) !!};
 
 
 $('#cardPay').submit(function(e){
            //  e.preventDefault();
             $('#cardPay').submit();
            //  var xhr = submit_form('#cardPay');
            //  xhr.done(function(result){
            //      if(result){
            //        console.log(result);
            //          if(result.alert){
            //              swal({
            //              type:result.alert,
            //              text: result.msg
            //              }).then(function(){ 
            //             $('#verificationModal').modal("toggle");
            //              });
            //          // console.log(result);
            //          }
            //      }
            //  });
         });
 </script>

 @endpush
