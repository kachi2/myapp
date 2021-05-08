@extends('layouts.landing', ['page_title' => 'About Us', 'heading' => 'About Us', 'sub_heading' => 'Enjoy real benefits and rewards on your accrue mining.'])
@section('content')
  @include('partials.landing-header') 
     <!-- Banner Area Starts -->
        <section class="banner-area">
            <div class="banner-overlay">
                <div class="banner-text text-center">
                    <div class="container">
                        <!-- Section Title Starts -->
                        <div class="row text-center">
                            <div class="col-xs-12">
                                <!-- Title Starts -->
                                <h2 class="title-head">About <span>Us</span></h2>
                                <!-- Title Ends -->
                                <hr>
                                <!-- Breadcrumb Starts -->
                                <ul class="breadcrumb">
                                    <li><a href="/"> home</a></li>
                                    <li>About</li>
                                </ul>
                                <!-- Breadcrumb Ends -->
                            </div>
                        </div>
                        <!-- Section Title Ends -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Area Starts -->

        <!-- About Section Starts -->
        <section class="about-page">
            <div class="container">
                <div class="row about-content">

                    <div class="col-lg">
                        <div class="feature-about">
                            <h3 class="title-about">We set the trend, others follow</h3>
                            <h1>Who We Are</h1><h2>OUR VISION</h2><p><strong>{{config('app.name')}}</strong> is your partner for Trading online through our premium online brokerage. As a provider for online trading and investment services we offer you reliability that meets the highest standards. <strong>{{config('app.name')}}</strong> offers you the entire spectrum of asset classes and financial instruments, including stocks, Indices, CFD&rsquo;s, currencies and Cryptocurrencies. With more than 50 exchanges worldwide, more markets are now available to you than ever before.</p><p>Because that is important to us: that every investor - regardless of whether they are new or experienced traders - can find the right instrument for their investment strategy with us on favorable terms.</p><h2>WHAT WE OFFER</h2><h3>WHY YOU SHOULD CHOOSE <strong>{{config('app.name')}}</strong> AS YOUR BROKER</h3><p>With <strong>{{config('app.name')}}</strong> at your disposal you have an online broker that in a class of its own &ndash;</p><p>We take product variety literally: As a customer of <strong>{{config('app.name')}}</strong> you have access to the biggest markets, all important asset classes and the most exciting values. All this at first-class conditions.</p><p>Whether for trading commodities, futures or crypto-currencies, whether for hedging with foreign exchange, options and CFDs - use the most innovative trading technologies to move quickly and take advantage of presented opportunities.</p><p>Trade like the pros by using modern financial instruments to experience trading that was once reserved for institutional investors.</p><h3>FULL STP TECHNOLOGY &ndash; WITH NO CONFLICT OF INTERESTS</h3><p><strong>{{config('app.name')}}</strong> is a STP broker, this means that we make our revenue on the spread commissions only, and do not make money on our client&rsquo;s losses,</p><p>This gives our traders a level playing field and a fair chance in the markets.</p><p>Below are some of the key facts about trading with a True STP Broker:</p><p><strong>Trades</strong>Traders are placed with liquidity providers, often tier-1 banks and ECN&rsquo;s to ensure no dealing or intervention on your trades.</p><p><strong>Trading Conditions</strong>we offer real prices that mirror the global market conditions. You will benefit from more competitive pricing (tighter spreads), no-requotes and price improvements.</p><p><strong>Freedom of trading</strong>We impose no restrictions or limitations for scalping, hedging and news.</p><p><strong>No Conflicts</strong>As a STP broker we have no conflicts of interest with our client&rsquo;s trading activity. You can be confident that your trades won&rsquo;t be manipulated as it would be with a dealing desk broker.</p><h3>EXCELLENT CUSTOMER SERVICE</h3><p><strong>Round-the-Clock Support</strong></p><ul class="list"><li>5 days a week and 24 hours a day easy accessibility by phone, email or live chat. Schedule a meeting with our trading professionals via our callback service.</li><li>Our service is competent and certified. Experienced traders are available to answer your questions.</li><li>Our staff will help you in a targeted manner even in tricky matters - if desired and required, for example by possible connection to your system.</li></ul><p><strong>Low Cost - Fair Trading Conditions and Transparency</strong></p><ul class="list"><li>Trade with <strong>{{config('app.name')}}</strong> at low costs.</li><li>We have received high customer satisfaction, among other things also thanks to the favorable Trading conditions.</li><li>The large product variety of <strong>{{config('app.name')}}</strong> offers countless possibilities on the markets worldwide.</li></ul><h3>Why do people choose <strong>{{config('app.name')}}</strong>?</h3><p><strong>200+ Instruments and Assets</strong>Trade CFDs, Forex, Stocks, Cryptos and/or choose any other market you prefer.</p><p><strong>Real-Time Order Execution</strong>Stay on top of the market with our high-speed order processing.</p><p><strong>Mobile and Web Interface</strong>Trade on the go with <strong>{{config('app.name')}}</strong> mobile apps for iOS and Android devices.</p><p><strong>Multi-Currency Accounts</strong>Open multiple trading accounts with one of many supported base currencies, including crypto.</p><p><strong>Personal Account Manager</strong>Receive professional support from your account manager. They are available via phone, chat or email.</p><p align="center">Start Trading today.<br />Open account with <strong>{{config('app.name')}}</strong></p></div>
                        <a class="btn btn-primary btn-services" href="register/">Join Us Today</a>
                    </div>

                </div>
            </div>
        </section>
        <!-- About Section Ends -->

        <!-- Facts Section Starts -->
        <section class="facts">
            <div class="container">
                <div class="row text-center facts-content">
                    <div class="text-center heading-facts">
                        <h2>{{config('app.name')}}<span> numbers</span></h2>
                        <p>leading cryptocurrency Investment Company</p>
                    </div>
                    <!-- Fact Badge Item Ends -->
                    <div class="col-xs-12 buttons">
                        <a class="btn btn-primary btn-pricing" href="register">Sign up</a>
                        <span class="or"> or </span>
                        <a class="btn btn-primary btn-register" href="login">Login</a>
                    </div>
                </div>
                <!-- Fact Badges Ends -->
            </div>
            <!-- Container Ends -->
        </section>
        <!-- facts Section Ends -->
  @include('partials.landing-footer')
@endsection
