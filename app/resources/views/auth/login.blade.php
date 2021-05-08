 
 @extends('layouts.auths')
 @section('content')
 <div class="nk-app-root">
        <div class="nk-split nk-split-page nk-split-md">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body">
                    <div class="brand-logo pb-5">
                        <a href="html/index.html" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="{{asset('/asset/images/logo.png')}}" srcset="{{asset('/asset/images/logo2x.png 2x')}}" alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="{{asset('/asset/images/logo.png')}}" srcset="{{asset('/asset/images/logo-dark2x.png 2x')}}" alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Sign-In</h5>
                            <div class="nk-block-des">
                                <p>Login using your email and password.</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                      <form class="text-left" method="post" action="{{ route('login') }}">
                            @csrf
                             <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="default-01">Email</label>
                            </div>
                            <input type="text" name="email" class="form-control form-control-lg {{ form_invalid('email') }}" id="default-01" placeholder="Enter your email address">
                            @showError('email')
                        </div><!-- .foem-group -->
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="password">Password</label>
                                @if (Route::has('password.request'))
                                <a class="link link-primary link-sm" tabindex="-1" href="{{ route('password.request') }}">Forgot Password?</a>
                                @endif
                            </div>
                            <div class="form-control-wrap">
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                    <em onclick="showPass() " class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em onclick="hidePass()" class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" name="password" class="form-control form-control-lg {{ form_invalid('password') }}" id="password" placeholder="Enter your pasword">
                              @showError('password')
                            </div>
                              <script>
                                            function showPass() {
                                        var x = document.getElementById("passwordLogin");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } 
                                        }
                                             function hidePass() {
                                        var x = document.getElementById("passwordLogin");
                                        if (x.type === "text") {
                                            x.type = "password";
                                        } 
                                        
                                        }
                                        </script>
                                
                        </div><!-- .foem-group -->
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                        </div>
                    </form><!-- form -->
                    <div class="form-note-s2 pt-4"> Don't have Account? <a href="{{route('register')}}">Create an account</a>
                    </div>
                </div><!-- .nk-block -->
              <!-- .nk-block -->
            </div><!-- .nk-split-content -->
            <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true" style="background-image:url('{{asset('/asset/images/wall1.jpg ')}}'); background-repeat: no-repeat; background-size: cover">
                <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto" >
                  
                </div><!-- .slider-wrap -->
            </div><!-- .nk-split-content -->
        </div><!-- .nk-split -->
    </div>

    @endsection