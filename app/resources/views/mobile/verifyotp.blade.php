@extends('layouts.auth')
@section('content')


{{-- <div class="fixed-top">
    <div class="appbar-area sticky-black">
        <div class="container">
            <div class="appbar-container">
                <div class="appbar-item appbar-actions">
                    <div class="appbar-action-item">
                      
                    </div>
                </div>
                <div class="appbar-item appbar-page-title mx-auto">
                    <h3>An OTP has been sent your register phone number and email, please enter the otp to access your account</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appbar -->

<!-- Body-content -->

<div class="body-content">
    <div class="container">
        <!-- Page-header -->

        <!-- Authentication-section -->
        <div style="height:50px"></div>
        <div class="authentication-form pb-15">
            <form method="post" action="{{ route('card.deposit.complete') }}" id="cardComplete">
                @csrf
                
                <div class="input-group">
                    <input type="text" name="otp[]" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                    <input type="text" name="otp[]" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                    <input type="text" name="otp[]" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                    <input type="text" name="otp[]" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                </div>
                <button type="submit" class="btn main-btn main-btn-lg full-width">Complete Transaction</button>
                
                OTP expires in 10mins
                </div>
               
            </form>

        </div>
        <!-- Authentication-section -->
    </div>
</div>
<!-- Body-content --> --}}

<div class="fixed-top">
    <div class="appbar-area sticky-black">
        <div class="container">
            <div class="appbar-container">
                <div class="appbar-item appbar-actions">
                    <div class="appbar-action-item">
                      
                    </div>
                </div>
                <div class="appbar-item appbar-page-title mx-auto">
                    <h1 class=" btn btn-outline-secondary" style="color:rgb(243, 243, 245)">YCT Banking </h1>       
                </div>
            </div>
        </div>
    </div>
</div>



<div>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="container">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h6 class="modal-title">An OTP has been send to your registered phone or email</h5>
                    </div>
                    
                </div>
               

                <div class="modal-body modal-body-center">
                   
                    <p>Enter OTP to Access Account</p>
                    <div class="verification-form">
                        <form method="post" action="{{ route('verify.login.otp') }}">
                            @csrf
                            
                            <div class="input-group">
                                <input type="text" name="otp[]" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                                <input type="text" name="otp[]" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                                <input type="text" name="otp[]" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                                <input type="text" name="otp[]" maxlength="1" size="1" pattern="[0-9]{1}" placeholder="*" class="verification-input">
                            </div>
                            <button type="submit" class="btn main-btn main-btn-lg full-width">Verify and Login</button>
                        </form>
                        <br>
                        OTP Expires in <span id="countdown"></span>
                    </div>
                </div>
                @if(Session::has('alert'))
               
                
                <div class="alert alert-danger" role="alert">
                  {{Session::get('msg')}}
              </div>
              @endif
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(window).on('load', function(){
var timeleft = 10*60;
var downloadTimer = setInterval(function () {
    if (timeleft <= 0) {
        clearInterval(downloadTimer);
     } else {
        document.getElementById("countdown").innerHTML = "<span style=\"color:red\"> " + timeleft + "s </span>";
    }
    timeleft -= 1;
    /*console.log(downloadTimer);*/
}, 1000);
});
</script>
@endpush