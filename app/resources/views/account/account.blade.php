@php
use \App\Models\Deposit;
$deposit = Deposit::where('user_id', auth()->user()->id)->latest()->first();
@endphp

@extends('layouts.app')
@section('content')
                                    @if(isset($deposit) && $deposit->status == 0)
                                    @php
                                        //dd($dd);
                                        $create_at = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Now());
                                        $ex = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $deposit->expires_at);
                                           // $expiry = Deposit::where('status', 0)
                                            $expirys =  $create_at->diffInDays($ex); 
                                            if($expirys > 0){
                                                 $expiry =  $create_at->diffInDays($ex); 
                                                 $xx = 'Days';
                                            }else{
                                                $expiry =  $create_at->diffInMinutes($ex);
                                                $xx = 'Minutes';
                                            }
                                    @endphp
                                      
                                          
                                            @endif
           <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block">
                                <div class="card card-bordered">
                                    <div class="card-aside-wrap">
                                        <div class="card-inner card-inner-lg">
                                            <div class="nk-block-head nk-block-head-lg">
                                                <div class="nk-block-between">
                                                    <div class="nk-block-head-content">
                                                        <h4 class="nk-block-title">Personal Information</h4>
                                                        <div class="nk-block-des">
                                                          
                                                        </div>
                                                    </div>
                                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="nk-block">
                                                <div class="nk-data data-list">
                                                    <div class="data-head">
                                                        <h6 class="overline-title">Basics</h6>
                                                    </div>
                                                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                        <div class="data-col">
                                                            <span class="data-label">Full Name</span>
                                                            <span class="data-value">{{auth_user()->first_name." ".auth_user()->last_name}}</span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                                    </div><!-- data-item -->
                                                    <!-- data-item -->
                                                     <div class="data-item">
                                                        <div class="data-col">
                                                            <span class="data-label">Username</span>
                                                            <span class="data-value">{{auth_user()->username}}</span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                                    </div>
                                                    <div class="data-item">
                                                        <div class="data-col">
                                                            <span class="data-label">Email</span>
                                                            <span class="data-value">{{auth_user()->email}}</span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                                    </div><!-- data-item -->
                                                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                        <div class="data-col">
                                                            <span class="data-label">Phone Number</span>
                                                            <span class="data-value text-soft">{{auth_user()->phone}}</span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                                    </div><!-- data-item -->
                                                    <!-- data-item -->
                                                    <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                                                        <div class="data-col">
                                                            <span class="data-label">Address</span>
                                                            <span class="data-value">{{auth_user()->city}},<br>{{auth_user()->state}}, {{auth_user()->country}}/span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                                    </div><!-- data-item -->
                                                </div><!-- data-list -->
                                            <!-- data-list -->
                                            </div><!-- .nk-block -->
                                        </div>
                                        <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                            <div class="card-inner-group" data-simplebar>
                                                <div class="card-inner">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-primary">
                                                               <img src="{{auth_user()->photo_url }}"class="icon ni ni-user-alt">
                                                        </div>
                                                        <div class="user-info">
                                                            <span class="lead-text">{{strtoupper(auth()->user()->username)}}</span>
                                                            <span class="sub-text">{{auth()->user()->email}}</span>
                                                        </div>
                                                        
                                                    </div><!-- .user-card -->
                                                </div><!-- .card-inner -->
                                                <div class="card-inner">
                                                    <div class="user-account-info py-0">
                                                        <h6 class="overline-title-alt">Wallet Balance</h6>
                                                        <div class="user-balance">{{moneyFormat(auth_user()->wallet->amount, 'USD')}} </div>
                                                    </div>
                                                </div><!-- .card-inner -->
                                                <div class="card-inner p-0">
                                                    <ul class="link-list-menu">
                                                        <li><a class="active" href="{{ route('account') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                                        <li><a href="{{ route('account.activities') }}"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li>
                                                        <li><a href="{{ route('account') }}"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                                                    </ul>
                                                </div><!-- .card-inner -->
                                            </div><!-- .card-inner-group -->
                                        </div><!-- card-aside -->
                                    </div><!-- .card-aside-wrap -->
                                </div><!-- .card -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
                    <!-- end container-fluid -->
                
@endsection
@section('script')

@php

if(isset($deposit->expires_at)){

    $deposit = $deposit->expires_at;
}else{

    $deposit = 0;    
}

@endphp
<script>


let countDownDate = {!! json_encode($deposit) !!}
let countDownDates = new Date(countDownDate).getTime();
let x = setInterval(function() {
let now = new Date().getTime();
let distance = countDownDates - now;
 let days = Math.floor(distance / (1000 * 60 * 60 * 24));
 let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("timer").innerHTML = days + "Days " + hours + "Hours "
  + minutes + "Minutes " + seconds + "Seconds ";
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timers").innerHTML = "Congratulations!, Your Investment has been Completed Successfully";
  }
}, 1000);
</script>
@endsection