<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        @section('title')
            {{ config('app.name') }} {{ $page_title ? ' - ' . $page_title : '' }}
        @show
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=10;IE=edge">
    <meta name="keywords" content="crypto, Trading, Cryptocurrency, Cryptocurrency Trading, Investments, Trading comapany, Brokers, Bitcoin, Bitcoin trading">
    <meta name="description" content="{{config('app.name')}} is a highly trusted crypto Trading comapany, helping millions of individuals and firms across the globe to safely Trade and earn more with crypto currency.">
   

    <!-- Common styles-->
    <!-- some utilities (grid, offsets, etc..)-->
     <!-- Template CSS Files -->
    <link rel="stylesheet" href="frontend_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="frontend_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="frontend_assets/css/select2.min.css">
    <link rel="stylesheet" href="frontend_assets/css/style.css">
    <link rel="stylesheet" href="frontend_assets/css/skins/orange.css">

    <!-- Template JS Files -->
    <script src="frontend_assets/js/modernizr.js"></script>
  </head>
    <body>
    @yield('content')
     
    @stack('scripts')
   <!-- Template JS Files -->
        <script src="frontend_assets/js/jquery-2.2.4.min.js"></script>
        <script src="frontend_assets/js/bootstrap.min.js"></script>
        <script src="frontend_assets/js/select2.min.js"></script>
        <script src="frontend_assets/js/jquery.magnific-popup.min.js"></script>
        <script src="frontend_assets/js/custom.js"></script>

    </div>
    <!-- Wrapper Ends -->
    <div class="" style="position: fixed; left: 0; bottom: 0; width: 100%; text-align: center; height: 40px; display: flex;">
    <p style="flex: 0.90;"></p>
    <script src="https://widgets.coingecko.com/coingecko-coin-price-marquee-widget.js"></script>
    <coingecko-coin-price-marquee-widget coin-ids="bitcoin,ethereum,eos,ripple,litecoin" currency="usd" background-color="#ffffff" locale="en"></coingecko-coin-price-marquee-widget>
    
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e5aaaab298c395d1cea788e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body></html>