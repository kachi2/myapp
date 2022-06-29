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
                   
                  <a href="#"  data-bs-toggle="modal" data-bs-target="#transfer">Transfer Funds</a>
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
                            <p>Total Transferred</p>
                            <h3>{{ moneyFormat($sent, 'USD')}}</h3>
                        </div> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                        <div class="feature-card-details">
                            <p>Total Received</p>
                            <h3>{{ moneyFormat($received, 'USD')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="transaction-section pb-15">
            <div class="section-header">
                <h2>Recent Transfers</h2>
            </div>
            @forelse ($transfers as $transfer )
            <div class="transaction-card mb-15">
                <a href="#">
                    <div class="transaction-card-info">
                        <div class="transaction-info-thumb" style="border-radius: 100%">
                            <span class="text-white" style="font-size:15px"><?php if(isset($transfer->receiver_id) &&  $transfer->receiver_id != auth()->user()->id){ echo strtoupper(substr($transfer->receiver->username,0,2));}else{echo strtoupper(substr($transfer->sender->username,0,2)) ;}?></span>
                        </div>
                        <div class="transaction-info-text">
                            <p><?php if(isset($transfer->receiver_id) && $transfer->receiver_id == auth()->user()->id){echo "Received from "."<small>".$transfer->sender->account."</small>"; }else{echo "Transferred  to "."<small>".$transfer->receiver->account."</small>";}   ?>
                            </p>
                            <p><small class="positive-number">Account Name: {{$transfer->receiver->first_name . " " . $transfer->receiver->last_name}}<small></p>
                                <p><small class="positive-number">Bank: Internal Transfer<small></p>
                                 <p><small class="positive-number">Status<button class=" btn-outline-success btn-xm">{{$transfer->status}}</button><small></p>
                            <p><small class="positive-number">{{$transfer->created_at->format('d/m/y h:s A')}}<small></p>   
                        </div>
                    </div>
                    <div class="transaction-card-det ">
                        <?php if(isset($transfer->receiver_id) && $transfer->receiver_id != auth()->user()->id){ echo "<span style=\"color:#green\">".moneyFormat($transfer->amount, 'USD') ."</span>" ;}else{ echo "<span style=\"color:#000\">".moneyFormat($transfer->amount, 'USD') ."</span>" ;}?> <br> 
                        <span class="positive-number">  <?php if(isset($transfer->receiver_id) && $transfer->receiver_id != auth()->user()->id){
                          echo "Debit"; }else { echo " credit"; }?></span><br>
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
                            <p>No Transfer found
                            </p>
                            
                        </div>
                    </div>
                    
                </a>
            </div>
            @endforelse
        </div>

        <form method="post" action="{{ route('transfer') }}" id="transferForm">
            @csrf
        <div class="modal fade" id="transfer" tabindex="-1" aria-labelledby="passwordModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="container">
                        <div class="modal-header">
                            <div class="modal-header-title">
                                <h5 class="modal-title">Transfer funds</h5>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                                <div class="form-group pb-15">
                                    <label>Amount</label>
                                    <div class="input-group">
                                        <input   type="number" name="amount"   value="{{ old('amount') }}"class="form-control {{  form_invalid('amount') }}" required placeholder="100">
                                    </div>
                                    @showError('amount')
                                </div>
                                <div class="form-group pb-15">
                                    <label>Bank Name</label>
                                    <div class="input-group" >
                                        <select  class="form-control" name="bank" id="bank"> 
                                            <option value="Opay"> Opay</option>   
                                            <option value="Palmpay"> Palmpay</option>   
                                            <option value="GTB"> GTB</option>   
                                            <option value="Access"> Access Bank</option>   
                                        </select>   
                                    </div>
                                    @showError('bank')
                                </div>
                                <div class="form-group pb-15">
                                    <label>Account Number</label>
                                    <div class="input-group">
                                        <input type="text"  id="account" name="account" value="{{ old('account') }}"class="form-control {{ form_invalid('username') }}" required placeholder="Enter Account Number">       
                                    </div>
                                    @showError('account')
                                </div>
                                <div class="form-group pb-15">
                                    <label>Account Name</label>
                                    <div class="input-group">
                                        <input type="text"  id="account_name"  value="{{ old('account_name') }}"class="form-control {{ form_invalid('account_name') }}" readonly>       
                                    </div>
                                    @showError('account')
                                    <div class="form-group-append">
                                        <span class="input-group-text" id="load" hidden></span>
                                      </div>
                                </div>
                                <div class="form-group pb-15">
                                    <label>Transaction PIN</label>
                                    <div class="input-group">
                                        <input type="password" name="pin" value="{{ old('pin') }}"class="form-control {{ form_invalid('username') }}" required placeholder="******">       
                                    </div>
                                    @showError('account')
                                </div>
                                <button type="submit" id="submitbtn" class="btn main-btn main-btn-lg full-width">Transfer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
                        <h3>Enter OTP send to your Phone Number Or Email</h3>
                        <div class="verification-form">
                            <form method="post" action="{{ route('card.transfer.complete') }}" id="TransferComplete">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="otp[]" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                                    <input type="text" name="otp[]" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                                    <input type="text" name="otp[]" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                                    <input type="text" name="otp[]" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                                </div>
                                <button type="submit" class="btn main-btn main-btn-lg full-width">Complete Transaction</button>
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
  
     $('#transferForm').submit(function(e){
             e.preventDefault();
             var xhr = submit_form('#transferForm');
             xhr.done(function(result){
                  if(result){
                    console.log(result);
                      if(result.success){
                          swal({
                          type:result.alert,
                          text: result.msg
                          }).then(function(){ 
                         $('#verificationModal').modal("toggle");
                         $('#transfer').modal('hide');
                          });
                      console.log(result);
                      }else{
                        swal({
                          type:result.alert,
                          text: result.msg
                          }).then(function(){ 
                        //  $('#verificationModal').modal("toggle");
                        //  $('#transfer').modal('hide');
                          });
                      }
                  }
              });
          });
         
          $('#TransferComplete').submit(function(e){
              e.preventDefault();
              var xhr = submit_form('#TransferComplete');
              xhr.done(function(result){
                  if(result){
                    console.log(result);
                      if(result.alert){
                          swal({
                          type:result.alert,
                          text: result.msg
                          }).then(function(){ 
                        location.reload();
                        //$('#verificationModal').modal("toggle");
                        // $('#verificationModal').modal('hide');
                          });
                      console.log(result);
                      }
                  }
              });
          });



          $('#account').on('change', function(){
            document.getElementById("load").hidden = false;
              $('#load').html('<span class="spinner-grow text-success spinner-grow-sm" role="status" aria-hidden="true"></span> <span class="text-success" style="font-size:12px"> fetching Name... </span>');
            var accounts = $('#account').val();
            var banks = $('#bank').val();
         
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
     //var form_data = $(this);
        $.ajax({
          url: "{{route('verifyTransferAccount')}}",
          type:"get",
          data:{
            account:accounts, 
            bank:banks
          },
           cache:false,
          dataType: "json",
          success:function(response){
              console.log(response);
         document.getElementById("load").hidden = true;
            $('#account_name').attr('value',response.msg);
             document.getElementById('btnsubmit').disabled = true;
          }
         });
   });
   
  </script>
 
  @endpush
 