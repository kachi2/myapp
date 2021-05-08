<!DOCTYPE html>
<html lang="en">


<head>
    <title>
        @section('title')
            {{ config('app.name') }} {{ isset($page_title) ? ' - ' . $page_title : '' }}
        @show
    </title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <!-- app favicon -->
    <link rel="shortcut icon" href="{{ asset('zendabitcoin-assets/img/favicon.ico') }}">
    
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('zendabitcoin-assets/css/vendors.css') }}"/>
    
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('zendabitcoin-assets/css/style.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            {{-- <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="assets/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div> --}}
            <!-- end pre-loader -->

            @include('partials.navbar')

            <!-- begin app-container -->
            <div class="app-container">

                @include('partials.admin-sidebar')

                    <div class="app-main" id="main">
                        <div class="container-fluid" style="min-height: 880px;">

                            @section('page-title')
                            <div class="row">
                                <div class="col-md-12 m-b-30">
                                    <!-- begin page title -->
                                    @section('breadcrumb')
                                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                        <div class="page-title mb-2 mb-sm-0">
                                            <h1><li class="fa fa-align-right"></li> {{ isset($page_title) ? $page_title : 'Admin Dashboard' }}</h1>
                                        </div>
                                        <div class="ml-auto d-flex align-items-center">
                                            <nav>
                                                <ol class="breadcrumb p-0 m-b-0">
                                                    @if(isset($breadcrumb))
                                                        <li class="breadcrumb-item">
                                                            <a href="{{ route('home') }}">Admin Dashboard</a>
                                                        </li>
                                                        @foreach($breadcrumb as $key => $nav)
                                                            @if($key == count($breadcrumb) - 1)
                                                                <li class="breadcrumb-item active" aria-current="page">
                                                                    {{ $nav['title'] }}
                                                                </li>
                                                            @else
                                                                <li class="breadcrumb-item"><a href="{{ $nav['link'] }}">{{ $nav['title'] }}</a></li>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <li class="breadcrumb-item">
                                                            <a href="{{ route('home') }}">Admin Dashboard</a>
                                                        </li>
                                                    @endif                                                    
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                    @show
                                    <!-- end page title -->
                                </div>
                            </div>
                            @show


                            @yield('content')

                        </div>
                    </div>

                    <form id="dummy-form" action="" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                    @include('partials.footer')


            </div>
        </div>


    <script src="{{ asset('zendabitcoin-assets/js/vendors.js') }}"></script>
    <script src="{{ asset('zendabitcoin-assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>


    <script>
        function postDummy(url) {
            var form = $('form#dummy-form')
            form.attr('action', url)
            form.submit()
        }
    </script>
    @if(session()->has('error'))
        <script>
            $(function () {
                swal.fire({
                    text: "{{ session('error') }}",
                    type: 'error'
                });
            })
        </script>
    @endif
    @if(session()->has('success'))
        <script>
            $(function () {
                swal.fire({
                    text: "{{ session('success') }}",
                    type: 'success'
                });
            })
        </script>
    @endif
    @stack('scripts')



</body>
</html>
