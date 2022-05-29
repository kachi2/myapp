<!DOCTYPE html>
<html lang="zxx">
<head>
        <meta charset="utf-8">
        <meta name="description" content="Oban">
        <meta name="keywords" content="HTML,CSS,JavaScript">
        <meta name="author" content="HiBootstrap">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <meta name="keywords" content="crypto, Trading, Cryptocurrency, Cryptocurrency Trading, Investments, Trading comapany, Brokers, Bitcoin, Bitcoin trading">
        <meta name="description" content="Advent Capital is a highly trusted crypto Trading comapany, helping millions of individuals and firms across the globe to safely Trade and earn more with crypto currency.">
        <meta name="google-site-verification" content="google-site-verification=AwsJpw69QHn5NcP8hJK1Cnzn-SFq3xnnkcGGCtmQ88k" />
    
        <title> @if(isset($title)) {{$title}} @else Home  @endif | {{config('app.name')}}</title>
        <link rel="icon" href="{{asset('/mobile/images/favicon.png')}}" type="image/png" sizes="16x16">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="{{asset('/mobile/css/bootstrap.min.css')}}" type="text/css" media="all" />
        <!-- animate css -->
        <link rel="stylesheet" href="{{asset('/mobile/css/animate.min.css')}}" type="text/css" media="all" />
        <!-- owl carousel css -->
        <link rel="stylesheet" href="{{asset('/mobile/css/owl.carousel.min.css')}}"  type="text/css" media="all" />
        <link rel="stylesheet" href="{{asset('/mobile/css/owl.theme.default.min.css')}}"  type="text/css" media="all" />
        <!-- boxicons css -->
        <link rel='stylesheet' href="{{asset('/mobile/css/icofont.min.css')}}" type="text/css" media="all" />
        <!-- flaticon css -->
        <link rel='stylesheet' href="{{asset('/mobile/css/flaticon.css')}}" type="text/css" media="all" />
        <!-- style css -->
        <link rel="stylesheet" href="{{asset('/mobile/css/style.css')}}" type="text/css" media="all" />
        <!-- responsive css -->
        <link rel="stylesheet" href="{{asset('/mobile/css/responsive.css')}}" type="text/css" media="all" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
      
         <!--[if IE]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel="manifest" href="manifest.json">
        <script>
       if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
        </script>
       
    </head>
    <body>
@include('partials.preloader')
@include('partials.mobile-nav')

@yield('content') 

@include('partials.mobile-footbar')
@include('partials.mobile-sidebar')

@stack('modal')
        <script src="{{asset('/mobile/js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('/mobile/js/bootstrap.bundle.min.js')}}"></script>
        <!-- owl carousel js -->
        <script src="{{asset('/mobile/js/owl.carousel.min.js')}}"></script>
        <!-- form ajazchimp js -->
        <script src="{{asset('/mobile/js/jquery.ajaxchimp.min.js')}}"></script>
        <!-- form validator js  -->
        <script src="{{asset('/mobile/js/form-validator.min.js')}}"></script>
        <!-- contact form js -->
        <script src="{{asset('/mobile/js/contact-form-script.js')}}"></script>
        <!-- main js -->
        <script src="{{asset('/mobile/js/script.js')}}"></script> 
        
@stack('scripts')
        <!--Start of Tawk.to Script-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/628d8ee4b0d10b6f3e73e28b/1g3sfcblt';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <!--End of Tawk.to Script-->
    </body>
</html>