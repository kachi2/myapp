<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="format-detection" content="telephone=no">
    <!-- <meta name="theme-color" content="#ffffff"> -->
    <meta name="theme-color" content="#ffffff" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#222032" media="(prefers-color-scheme: dark)">
    <title> @if(isset($title)) {{$title}} @else Home  @endif | {{config('app.name')}}</title>
       <meta name="author" content="Zenith Capital">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="keywords" content="crypto, Trading, Cryptocurrency, Cryptocurrency Trading, Investments, Trading comapany, Brokers, Bitcoin, Bitcoin trading">
    <meta name="description" content="{{config('app.name')}} is a highly trusted crypto Trading comapany, helping millions of individuals and firms across the globe to safely Trade and earn more with crypto currency.">
  <!-- FAVICON -->
    <link rel="icon" type="image/png" href="images/favicon/icon-32x32.png" sizes="32x32">
    <!-- IOS SUPPORT -->
    <link rel="apple-touch-icon" href="images/favicon/icon-96x96.png">
    <!-- CSS FILES -->
    <link rel="stylesheet" href="{{asset('/mobile/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/mobile/assets/css/remixicon.min.css')}}">
    <link rel="stylesheet" href="{{asset('/mobile/assets/vendors/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('/mobile/assets/vendors/zuck_stories/zuck.min.css')}}">
    <link rel="manifest" href="_manifest.json" />

</head>


@include('partials.mobile-nav')

@yield('content')
@include('partials.mobile-sidebar')



    <!-- JS FILES -->
    <script src="{{asset('/mobile/assets/vendors/zuck_stories/zuck.min.js')}}"></script>
    <script src="{{asset('/mobile/assets/vendors/smoothscroll/smoothscroll.min.js')}}"></script>
    <script src="{{asset('/mobile/assets/vendors/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('/mobile/assets/vendors/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('/mobile/assets/vendors/nouislider/wNumb.min.js')}}"></script>
    <script src="{{asset('/mobile/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/mobile/assets/js/custom.js')}}"></script>
    <!-- PWA APP SERVICE REGISTRATION AND WORKS JS -->
    <script src="{{asset('/mobile/assets/js/pwa-services.js')}}"></script>
</body>
</html>