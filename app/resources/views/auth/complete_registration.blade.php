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
                            <h5 class="nk-block-title">Register</h5>
                            <div class="nk-block-des">
                                <p>Complete Registeration</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                      <form class="text-left" method="post" action="{{ route('complete_registration') }}">
                            @csrf
                             <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="default-01">Username</label>
                            </div>
                            <input type="text" name="username" class="form-control form-control-lg {{ form_invalid('username') }}" id="default-01" placeholder="Enter username">
                            @showError('username')
                        </div><!-- .foem-group -->
                        <div class="form-group">
                           
                            <div class="form-control-wrap">
                                
                                <input type="text" name="phone" class="form-control form-control-lg {{ form_invalid('phone') }}" id="password" placeholder="Enter phone">
                              @showError('phone')
                            </div>
                              
                                
                        </div><!-- .foem-group -->
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block">Complete Registration</button>
                        </div>
                    </form><!-- form -->
                    <div class="form-note-s2 pt-4"> Already have Account? <a href="{{route('login')}}">Login</a>
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