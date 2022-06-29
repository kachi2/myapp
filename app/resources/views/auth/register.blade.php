@extends('layouts.auth')
@section('content')
<!-- Appbar -->
        <div class="fixed-top">
            <div class="appbar-area sticky-black">
                <div class="container">
                    <div class="appbar-container">
                        <div class="appbar-item appbar-actions">
                            <div class="appbar-action-item">
                                <a href="#" class="back-page"><i class="flaticon-left-arrow"></i></a>
                            </div>
                        </div>
                        <div class="appbar-item appbar-page-title mx-auto">
                            <h3>Register</h3>
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
                <center>
                    <h1 class=" btn btn-outline-secondary" style="color:rgb(36, 18, 110)">YCT Bank App</h1> 
                </center>
                <!-- Page-header -->

                <!-- Authentication-section -->
                <div style="height:50px"></div>
                <div class="authentication-form pb-15">
                    <form class="text-left" method="post" action="{{ route('register_user') }}">
                        @csrf
                        <div class="form-group pb-15">
                            <label>First Name</label>
                            <div class="input-group">
                                <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control form-control-lg {{ form_invalid('first_name') }}" placeholder="Enter first name" required >
                                @showError('first_name')
                                 <span class="input-group-text"><i class="flaticon-user-picture"></i></span>
                            </div>
                        </div>

                        <div class="form-group pb-15">
                            <label>Last Name</label>
                            <div class="input-group">
                                <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control form-control-lg {{ form_invalid('last_name') }}" placeholder="Enter last name" required>
                                @showError('last_name')
                                 <span class="input-group-text"><i class="flaticon-user-picture"></i></span>
                            </div>
                        </div>
                        <div class="form-group pb-15">
                            <label>Email</label>
                            <div class="input-group">
                                <input type="text" name="email" value="{{old('email')}}" class="form-control form-control-lg {{ form_invalid('email') }}" placeholder="Enter your email address" required>
                                @showError('email')
                                  <span class="input-group-text"><i class="flaticon-email"></i></span>
                            </div>
                        </div>
                        <div class="form-group pb-15">
                            <label>Phone Number</label>
                            <div class="input-group">
                                <input type="text" name="phone" value="{{old('phone')}}" class="form-control form-control-lg {{ form_invalid('phone') }}"  placeholder="Enter Phone Number" required>
                                @showError('phone')
                                  <span class="input-group-text"><i class="flaticon-exchange-arrows"></i></span>
                            </div>
                        </div>
                        <div class="form-group pb-15">
                            <label>Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control form-control-lg {{ form_invalid('password') }}" id="password" placeholder="Enter your pasword" required>
                              @showError('password')
                               <span class="input-group-text reveal">
                                    <i class="flaticon-invisible pass-close"  onclick="showPass()"></i>
                                    <i class="flaticon-visibility pass-view"  onclick="hidePass()"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group pb-15">
                            <label>Confirm Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" class="form-control form-control-lg {{ form_invalid('password_confirmation') }}" id="passwords" placeholder="Confirm Password" required>
                              @showError('password')
                               <span class="input-group-text reveal">
                                    <i class="flaticon-invisible pass-close" onclick="showPasss()"></i>
                                    <i class="flaticon-visibility pass-view"  onclick="hidePasss()"></i>
                                </span>
                                </span>
                            </div>
                        </div>
                        <script>
                            function showPass() {
                        var x = document.getElementById("password");
                        if (x.type === "password") {
                            x.type = "text";
                        } 
                        }
                             function hidePass() {
                        var x = document.getElementById("password");
                        if (x.type === "text") {
                            x.type = "password";
                        } 
                        
                        }
                        </script>
                          <script>
                            function showPasss() {
                        var x = document.getElementById("passwords");
                        if (x.type === "password") {
                            x.type = "text";
                        } 
                        }
                             function hidePasss() {
                        var x = document.getElementById("passwords");
                        if (x.type === "text") {
                            x.type = "password";
                        } 
                        
                        }
                        </script>
                        <div class="authentication-account-access pb-15">
                            <div class="authentication-account-access-item">
                                <div class="input-checkbox">
                                    <input type="checkbox"  checked>
                                    <label for="check1">I agree to the Privacy Policy</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn main-btn main-btn-lg full-width mb-10">Register</button>
                    </form>
                    <div class="form-desc">Already have an account? <a href="{{route('login')}}">Sign In!</a></div>
                </div>
                <!-- Authentication-section -->
                   <!-- Centermodal -->
      
            </div>
        </div>
        <!-- Body-content -->


   

@endsection