<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>
        @section('title')
            {{ $page_title }}
        @show
    </title>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
 <link rel="shortcut icon" href="{{ asset('zendabitcoin-assets/img/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">

</head>
<body class="authentication-bg" style="font-family: 'Baloo Bhai', cursive;">

<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                @section('content')
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 p-5 mx-auto">
                                    <div style="padding-left:35%">
                                        <a href="{{ route('index') }}">
                                            <img src="{{ asset('logo.png') }}" alt="" width="80"/>                                            
                                        </a>
                                    </div>

                                    <h6 class="h5 mb-0 mt-4">{{ $heading }}</h6>
                                    <p class="text-muted mt-0 mb-4">{{ $sub_heading }}</p>

                                    @yield('form')
                                </div>

                                
                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                @show

                @section('footer')
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-primary font-weight-bold ml-1">Sign Up</a></p>
                        </div> <!-- end col -->
                    </div>
                @show

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>

@stack('scripts')

<!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->

</body>
</html>
