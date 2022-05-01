@extends('layouts.mobile')
@section('content')


<div class="body-content body-content-lg"> <!-- "body-content-lg" add this class if any cards inside this div has "section-to-header" class -->
    <div class="container">
        <!-- Add-card -->
        <div class="add-card section-to-header mb-30">
            <div class="add-card-inner">
                <div class="add-card-item add-card-info">
                    <h3> Total Withdrawal {{moneyFormat($total, 'USD')}}</h3>
                    
                </div>
                <div class="add-card-item add-balance" data-bs-toggle="modal" data-bs-target="#addBalance">
                   
                  <a href="#"  data-bs-toggle="modal" data-bs-target="#passwordModal">Request Withdrawal</a>
                </div>
            </div>
        </div>
        <div class="feature-section mb-15">
            <div class="row gx-3">
                <h5>My Withdrawals</h5>
                <div class="col col-sm-6 pb-15">
                    <div class="feature-card feature-card-blue">
                        <div class="feature-card-thumb">
                            <i class="flaticon-expenses"></i>
                        </div>
                        <div class="feature-card-details">
                            <p>Pending Withdrawal</p>
                            <h3>{{moneyFormat($pending, 'USD')}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6 pb-15">
                    <div class="feature-card feature-card-violet">
                        <div class="feature-card-thumb">
                            <i class="flaticon-invoice"></i>
                        </div>
                        <div class="feature-card-details">
                            <p>Approved Withdrawal</p>
                            <h3>{{moneyFormat($success, 'USD')}}</h3>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="transaction-section pb-15">
            <div class="section-header">
                <h2>Recent Withdrawals</h2>
            </div>
            @forelse ($withdrawals as $withdrawal )
            <div class="transaction-card mb-15">
                <a href="transaction-details.html">
                    <div class="transaction-card-info">
                        <div class="transaction-info-thumb" style="border-radius: 100%">
                            <span class="text-white" style="font-size:15px"></span>
                        </div>
                        <div class="transaction-info-text">
                            <h3>Ref:{{$withdrawal->ref}}<small> <br>{{$withdrawal->created_at->format('d/m/y h:s A')}}</small>
                            </h3>
                            <p> <div class="dot dot-success d-md-none"></div>
                                @if( $withdrawal->status == \App\Models\Withdrawal::STATUS_PAID)
                               <span class="btn-success p-1 " style="font-size:12px">Completed</span>
                               @elseif ($withdrawal->status == \App\Models\Withdrawal::STATUS_CANCELED)
                               <span class="btn-danger p-1" style="font-size:12px">Cancelled</span>
                               @else
                                <span class="btn-warning p-1" style="font-size:12px">Pending</span>
                               @endif </small></p>
                        </div>
                    </div>
                    <div class="transaction-card-det ">
                        <span class="positive-number">{{ moneyFormat($withdrawal->amount, 'USD') }}</span><br> 
                       <small class="negative-number">{{ $withdrawal->formatted_payment_method }}<small>
                    </div>
                </a>
            </div>
            @empty
            @endforelse
        </div>
      

    <!-- payment modal -->


   
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