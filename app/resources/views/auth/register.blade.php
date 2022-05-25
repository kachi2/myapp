<!DOCTYPE html>
<html lang="zxx">
<head>
        <meta charset="utf-8">
        <meta name="description" content="Oban">
        <meta name="keywords" content="HTML,CSS,JavaScript">
        <meta name="author" content="HiBootstrap">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <title></title>
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
        <link rel="manifest" href="manifest.json">
        <script>
            if('serviceworker' in navigator){
                navigator.serviceWorker.register('serviceworker.js', {
                    scope: '.'
                }).then(function (registration){
                    console.log('Service worker is registered with scope', registration.scope);
                }, function(err){
                    console.log('service worker registratin failed', err);
                });
            }
        </script>
        <!--[if IE]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>
        <!-- Preloader -->
        <div class="preloader">
            <div class="preloader-wrapper">
                <div class="preloader-content">
                    <img src="{{asset('/mobile/images/preloader-logo.png')}}" alt="logo">
                    <h3>Advent Capital</h3>
                </div>
            </div>
        </div>
        <!-- Preloader -->

        <!-- Header-bg -->
        <div class="header-bg header-bg-1"></div>
        <!-- Header-bg -->

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
                <div style="padding-left:35%">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('logo.png') }}" alt="" width="80"/>                                            
                    </a>
                </div>
                <!-- Page-header -->

                <!-- Authentication-section -->
                <div style="height:50px"></div>
                <div class="authentication-form pb-15">
                    <form class="text-left" method="post" action="{{ route('register_user') }}">
                        @csrf
                        <div class="form-group pb-15">
                            <label>Username</label>
                            <div class="input-group">
                                <input type="text" name="username" class="form-control form-control-lg {{ form_invalid('username') }}" id="default-01" placeholder="Enter username">
                                @showError('username')
                                 <span class="input-group-text"><i class="flaticon-user-picture"></i></span>
                            </div>
                        </div>
                        <div class="form-group pb-15">
                            <label>Email</label>
                            <div class="input-group">
                                <input type="text" name="email" class="form-control form-control-lg {{ form_invalid('email') }}" id="default-01" placeholder="Enter your email address">
                                @showError('email')
                                  <span class="input-group-text"><i class="flaticon-email"></i></span>
                            </div>
                        </div>
                        <div class="form-group pb-15">
                            <label>Phone Number</label>
                            <div class="input-group">
                                <input type="text" name="phone" class="form-control form-control-lg {{ form_invalid('phone') }}" id="default-01" placeholder="Enter Phone Number">
                                @showError('phone')
                                  <span class="input-group-text"><i class="flaticon-call-center-agent"></i></span>
                            </div>
                        </div>
                        <div class="form-group pb-15">
                            <label>Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control form-control-lg {{ form_invalid('password') }}" id="password" placeholder="Enter your pasword">
                              @showError('password')
                               <span class="input-group-text reveal">
                                    <i class="flaticon-invisible pass-close"></i>
                                    <i class="flaticon-visibility pass-view"></i>
                                </span>
                            </div>
                        </div>
                        <div class="authentication-account-access pb-15">
                            <div class="authentication-account-access-item">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="check1"required>
                                    <label for="check1">I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#centerModal">Privacy Policy</a></label>
                                </div>
                            </div>
                        </div>
                        <button class="btn main-btn main-btn-lg full-width mb-10">Register</button>
                    </form>
                    <div class="form-desc">Already have an account? <a href="{{route('login')}}">Sign In!</a></div>
                </div>
                <!-- Authentication-section -->


                   <!-- Centermodal -->
        <div class="modal fade" id="centerModal" tabindex="-1" aria-labelledby="centerModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="container">
                        <div class="modal-header">
                            <div class="modal-header-title">
                                <h5 class="modal-title">Zenithcapital Terms of Use</h5>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           
                            <p class="mb-0">
                                These Binance Terms of Use is entered into between you (hereinafter referred to as “you” or “your”) and Binance operators (as defined below). By accessing, downloading, using or clicking on “I agree” to accept any Binance Services (as defined below) provided by Binance (as defined below), you agree that you have read, understood and accepted all of the terms and conditions stipulated in these Terms of Use (hereinafter referred to as “these Terms”) as well as our Privacy Policy at www.binance.com/en/privacy. In addition, when using some features of the Services, you may be subject to specific additional terms and conditions applicable to those features.Please read the terms carefully as they govern your use of Binance Services.T
                                <strong>HESE TERMS CONTAIN IMPORTANT PROVISIONS INCLUDING AN ARBITRATION PROVISION THAT REQUIRES ALL CLAIMS TO BE RESOLVED BY WAY OF LEGALLY BINDING ARBITRATION.The terms of the arbitration provision are set forth in Article 10, “Resolving Disputes: Forum, Arbitration, Class Action Waiver”, hereunder. As with any asset, the values of Digital Currencies (as defined below) may fluctuate significantly and there is a substantial risk of economic losses when purchasing, selling, holding or investing in Digital Currencies and their derivatives.BY MAKING USE OF BINANCE SERVICES, YOU ACKNOWLEDGE AND AGREE THAT: (1) YOU ARE AWARE OF THE RISKS ASSOCIATED WITH TRANSACTIONS OF DIGITAL CURRENCIES AND THEIR DERIVATIVES; (2) YOU SHALL ASSUME ALL RISKS RELATED TO THE USE OF BINANCE SERVICES AND TRANSACTIONS OF DIGITAL CURRENCIES AND THEIR DERIVATIVES; AND (3) BINANCE SHALL NOT BE LIABLE FOR ANY SUCH RISKS OR ADVERSE OUTCOMES.
                                </strong>  By accessing, using or attempting to use Binance Services in any capacity, you acknowledge that you accept and agree to be bound by these Terms. If you do not agree, do not access Binance or utilize Binance services.
                                I. Definitions
                                1. Binance refers to an ecosystem comprising Binance websites (whose domain names include but are not limited to https://www.binance.com/en), mobile applications, clients, applets and other applications that are developed to offer Binance Services, and includes independently-operated platforms, websites and clients within the ecosystem (e.g. Binance’s Open Platform, Binance Launchpad, Binance Labs, Binance Charity, Binance DEX, Binance X, JEX, Trust Wallet, and fiat gateways). In case of any inconsistency between relevant terms of use of the above platforms and the contents of these Terms, the respective applicable terms of such platforms shall prevail.
                                2. Binance Operators refer to all parties that run Binance, including but not limited to legal persons (including Binance UAB), unincorporated organizations and teams that provide Binance Services and are responsible for such services. For convenience, unless otherwise stated, references to “Binance” and “we” in these Terms specifically mean Binance Operators. UNDER THESE TERMS, BINANCE OPERATORS MAY CHANGE AS BINANCE’S BUSINESS ADJUSTS, IN WHICH CASE, THE CHANGED OPERATORS SHALL PERFORM THEIR OBLIGATIONS UNDER THESE TERMS WITH YOU AND PROVIDE SERVICES TO YOU, AND SUCH CHANGE DOES NOT AFFECT YOUR RIGHTS AND INTERESTS UNDER THESE TERMS. ADDITIONALLY, THE SCOPE OF BINANCE OPERATORS MAY BE EXPANDED DUE TO THE PROVISION OF NEW BINANCE SERVICES, IN WHICH CASE, IF YOU CONTINUE TO USE BINANCE SERVICES, IT IS DEEMED THAT YOU HAVE AGREED TO JOINTLY EXECUTE THESE TERMS WITH THE NEWLY ADDED BINANCE OPERATORS. IN CASE OF A DISPUTE, YOU SHALL DETERMINE THE ENTITIES BY WHICH THESE TERMS ARE PERFORMED WITH YOU AND THE COUNTERPARTIES OF THE DISPUTE, DEPENDING ON THE SPECIFIC SERVICES YOU USE AND THE PARTICULAR ACTIONS THAT AFFECT YOUR RIGHTS OR INTERESTS..</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
        <!-- Body-content -->


   



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
    </body>
</html>