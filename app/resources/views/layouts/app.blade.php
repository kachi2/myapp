<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="AldenCapital">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="crypto, Trading, Cryptocurrency, Cryptocurrency Trading, Investments, Trading comapany, Brokers, Bitcoin, Bitcoin trading">
    <meta name="description" content="AldenCapital is a highly trusted crypto Trading comapany, helping millions of individuals and firms across the globe to safely Trade and earn more with crypto currency.">
   
 
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('/fav.png')}}">
    <!-- Page Title  -->
   <title>
        @section('title')
            {{ config('app.name') }} {{ isset($page_title) ? ' - ' . $page_title : '' }}
        @show
    </title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('/asset/css/dashlite.css?ver=2.2.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('/asset/css/theme.css?ver=2.2.0')}}">
</head>
<body class="nk-body npc-crypto bg-white has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
           @include('partials.sidebar')
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
           @include('partials.navbar')
        <!-- end of header -->
    
    @yield('content')

                <!-- footer @s -->
                <div class="nk-footer nk-footer-fluid">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> All Rights Reserved &copy; {{date('Y')}} </a>
                            </div>
                            <div class="nk-footer-links">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{asset('/asset/bundle.js?ver=2.2.0')}}"></script>
    <script src="{{asset('/asset/scripts.js?ver=2.2.0')}}"></script>
    <script src="{{asset('/asset/charts/chart-crypto.js?ver=2.2.0')}}"></script>
    <script src="{{asset('/asset/example-sweetalert.js?ver=2.2.0')}}"></script>
      <script src="{{asset('/asset/example-toastr.js?ver=2.2.0')}}"></script>
    @yield('scripts')
<!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->
</body>

</html>