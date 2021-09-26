<!doctype html>
<html class="no-js" lang="en">
<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
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

		<!-- favicon -->		
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('/fav.png')}}">

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
		<link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.min.css')}}">
		<!-- owl.carousel css -->
		<link rel="stylesheet" href="{{asset('/frontend/css/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('/frontend/css/owl.transitions.css')}}">
       <!-- Animate css -->
        <link rel="stylesheet" href="{{asset('/frontend/css/animate.css')}}">
        <!-- meanmenu css -->
        <link rel="stylesheet" href="{{asset('/frontend/css/meanmenu.min.css')}}">
		<!-- font-awesome css -->
		<link rel="stylesheet" href="{{asset('/frontend/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('/frontend/css/themify-icons.css')}}">
		<link rel="stylesheet" href="{{asset('/frontend/css/flaticon.css')}}">
		<!-- magnific css -->
        <link rel="stylesheet" href="{{asset('/frontend/css/magnific.min.css')}}">
		<!-- style css -->
		<link rel="stylesheet" href="{{asset('/frontend/style.css')}}">
		<!-- responsive css -->
		<link rel="stylesheet" href="{{asset('/frontend/css/responsive.css')}}">

		<!-- modernizr css -->
		<script src="{{asset('/frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
	</head>
		<body>

        @yield('content')
        @stack('scripts')
		<!-- all js here -->

		<!-- jquery latest version -->
		<script src="{{asset('/frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
		<!-- bootstrap js -->
		<script src="{{asset('/frontend/js/bootstrap.min.js')}}"></script>
		<!-- owl.carousel js -->
		<script src="{{asset('/frontend/js/owl.carousel.min.js')}}"></script>
		  <!-- stellar js -->
        <script src="{{asset('/frontend/js/jquery.stellar.min.js')}}"></script>
		<!-- magnific js -->
        <script src="{{asset('/frontend/js/magnific.min.js')}}"></script>
        <!-- wow js -->
        <script src="{{asset('/frontend/js/wow.min.js')}}"></script>
        <!-- meanmenu js -->
        <script src="{{asset('/frontend/js/jquery.meanmenu.js')}}"></script>
		<!-- Form validator js -->
		<script src="{{asset('/frontend/js/form-validator.min.js')}}"></script>
		<!-- plugins js -->
		<script src="{{asset('/frontend/js/plugins.js')}}"></script>
		<!-- main js -->
		<script src="{{asset('/frontend/js/main.js')}}"></script>


           <div class="" style="position: fixed; left: 0; bottom: 0; width: 100%; text-align: center; height: 40px; display: flex;">
    <p style="flex: 0.90;"></p>
    <script src="https://widgets.coingecko.com/coingecko-coin-price-marquee-widget.js"></script>
    <coingecko-coin-price-marquee-widget coin-ids="bitcoin,ethereum,eos,ripple,litecoin" currency="usd" background-color="#ffffff" locale="en"></coingecko-coin-price-marquee-widget>
    </div>
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/614fe9f225797d7a8900d7dd/1fgg2jnp8';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
	</body>
</html>