@extends('layouts.mobile')
@section('content')
<div class="body-content body-content-lg">
    <div class="container">
        <!-- Add-card -->
        <div class="add-card section-to-header mb-30">
            <div class="add-card-inner">
                <div class="add-card-item add-card-info">
                    <h3>Main Wallet <br> {{ moneyFormat(auth()->user()->wallet->amount, 'USD') }}</h3>
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
                <h2>Transactions</h2>
            </div>
            @forelse ($transfers as $transfer)
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
                                <p><small class="positive-number">Bank:  {{$transfer->receiver->bank}}<small></p>
                                 <p><small class="positive-number">Status<button class=" btn-outline-success btn-xm">{{$transfer->status}}</button><small></p>
                            <p><small class="positive-number">{{$transfer->created_at->format('d/m/y h:s A')}}<small></p>   
                        </div>
                    </div>
                    <div class="transaction-card-det ">
                        <?php if(isset($transfer->receiver_id) && $transfer->receiver_id != auth()->user()->id){ echo "<span style=\"color:#green\">".moneyFormat($transfer->amount, 'USD') ."</span>" ;}else{ echo "<span style=\"color:#000\">".moneyFormat($transfer->amount, 'USD') ."</span>" ;}?> <br> 
                        <span class="positive-number">  <?php if(isset($transfer->receiver_id) && $transfer->receiver_id != auth()->user()->id){
                          echo "<p style=\"color:red\"> Debit </p>"; }else { echo " <p style=\"color:green\"> credit</p>"; }?></span><br>
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
                     if(result.alert){
                         swal({
                         type:result.alert,
                         text: result.msg
                         }).then(function(){ 
                         //location.reload();
                         });
                     // console.log(result);
                     }
                 }
             });
         });
 </script>

 @endpush
