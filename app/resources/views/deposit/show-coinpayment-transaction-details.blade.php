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
        <div class="col-3"></div>
        <div class="col-lg-6">
            <div class="card">
                <div class="nk-pps-apps">
                <div class="nk-pps-title text-center">
                    <h3 class="title">Make Your Payment</h3>
                    <p class="caption-text p-2">To complete this transaction, please send the exact amount of <strong class="text-dark">{{$transaction->amount1}} {{$transaction->currency1}} | {{$transaction->amount2}} {{$transaction->currency2}} </strong> to the address below.</p>
                </div>
                <div class="nk-pps-card card card-bordered popup-inside">
                    <div class="card-inner-group">
                        <div class="card-inner card-inner-sm">
                            <div class="card-head mb-0">
                                <h6 class="title mb-0 text-center">Pay {{$transaction->currency2}}</h6>
                                                            </div>
                        </div>
                        <div class="card-inner">
                            <div class="qr-media mx-auto mb-3 w-max-100px">
                                <!--?xml version="1.0" encoding="UTF-8"?-->
                                            <g transform="scale(3.03)"><g transform="translate(0,0)">
                                                    <img src="{{asset('/1Kmtc9KGygUcYcW8RSBCKXCxuecmrRhtY3.jpg')}}"
                                                    </g></g>

                            </div>
                            <div class="pay-info text-center">
                                <h5 class="title text-dark mb-0 clipboard-init" data-clipboard-text=" {{$transaction->amount2}}">
                                   {{$transaction->amount2}} {{$transaction->currency2}} <em class="click-to-copy icon ni ni-copy-fill nk-tooltip" title="" data-original-title="Click to Copy"></em>
                                </h5>
                                                                    <p class="text-soft">{{$transaction->amount1}} {{$transaction->currency1}}</p>
                                                            </div>

                            <div class="form-group">
                                <div class="form-label overline-title-alt lg text-center">{{$transaction->currency2}} Address</div>
                                <div class="form-control-wrap">
                                    <div class="form-clip clipboard-init nk-tooltip" data-clipboard-target="#wallet-address" title="" data-original-title="Copy">
                                        <em class="click-to-copy icon ni ni-copy"></em>
                                    </div>
                                    <div class="form-icon"><em class="icon ni ni-sign-{{strtolower($transaction->currency2)}}-alt"></em></div>
                                    <input readonly="" type="text" class="form-control form-control-lg" id="wallet-address" value="1Kmtc9KGygUcYcW8RSBCKXCxuecmrRhtY3" readonly>
                                </div>
                                                            </div>

                                                            <div class="nk-pps-action">
                                </div>
                                <div id="crypto-paid" class="popup">
                                    <div class="popup-content">
                                        <h6 class="mb-2">Confirm your payment</h6>
                                        <p>If you already paid, please provide us your payment reference to speed up verification procces.</p>
                                        <form class="form" action="{{route('saveHashNo', encrypt($transaction->invoice))}}" method="get" id="crypto-pay-reference">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-label">Payment Reference <span class="text-danger">*</span></div>
                                                <div class="form-control-wrap">
                                                     <input name="hash" type="text" class="form-control " value=""  @if(Session::has('done')) placeholder="Hash reference submitted" {{Session::get('done')}} @else placeholder="Enter your reference id / hash" @endif >
                                               </div>
                                            </div>
                                            <ul class="btn-group justify-between align-center gx-4">
                                                @if(Session::has('done'))
                                                <li><a href="{{route('deposits')}}" class="btn btn-primary btn-block">View Deposits</a></li>
                                                 @else
                                                 <li><button type="submit" class="btn btn-primary btn-block">Confirm Payment</button></li>
                                                
                                                @endif
                                                <li><a href="{{route('home')}}" class="link link-btn link-secondary popup-close">Close</a></li>
                                            </ul>
                                            </form>
                                        
                                    </div>
                                    <div class="popup-overlay"></div>
                                </div>
                                                    </div>
                        
                    </div>
                </div>
                
                            </div>
            </div>
        </div>
       
    </div>
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
        timeOut: 8000,
    });
}

</script>
@endsection


