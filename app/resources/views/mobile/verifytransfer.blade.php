@extends('layouts.mobile')
@section('content')


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
                   
                    <p>Enter OTP to complete Deposit</p>
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
@endsection