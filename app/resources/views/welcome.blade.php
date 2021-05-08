
@extends('layouts.landing', ['page_title' => 'Home', 'heading' => 'Home', 'sub_heading' => 'Enjoy real benefits and rewards on your accrue mining.'])
@section('content')
  @include('partials.landing-header') 
      <!-- Slider Starts -->
        <div id="main-slide" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Indicators Starts -->
            <ol class="carousel-indicators visible-lg visible-md">
                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <!-- Indicators Ends -->
            <!-- Carousel Inner Starts -->
            <div class="carousel-inner">
                <!-- Carousel Item Starts -->
                <div class="item active bg-parallax item-1">
                    <div class="slider-content">
                        <div class="container">
                            <div class="slider-text text-center">
                                <h3 class="slide-title"><span>Secure</span> and <span>Easy Way</span><br /> To Trade Cryptocurrencies</h3>
                                <p>
                                    <a href="register" class="slider btn btn-primary">Sign up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item Ends -->
                <!-- Carousel Item Starts -->
                <div class="item bg-parallax item-2">
                    <div class="slider-content">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="slider-text text-center">
                                    <h3 class="slide-title"><span>{{config('app.name')}}</span> Trading Company <br />You can <span>Trust</span> </h3>
                                    <p>
                                        <a href="register" class="slider btn btn-primary">Create Account</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item Ends -->
            </div>
            <!-- Carousel Inner Ends -->
            <!-- Carousel Controlers Starts -->
            <a class="left carousel-control" href="#main-slide" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
            </a>
            <a class="right carousel-control" href="#main-slide" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
            </a>
            <!-- Carousel Controlers Ends -->
        </div>
        <!-- Slider Ends -->

        <!-- About Section Starts -->
        <section class="about-us" style="background-color: #fff;">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head" style="color: #000;">Our <span>Services</span></h2>
                    <div class="title-head-subtitle">
                        <p style="color: #000;">We provide the most trusted service for crypto Traders on the market</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row about-content">
                    <!-- Image Starts -->
                    <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                        <img class="img-responsive img-about-us" src="frontend_assets/ff/blockchain_graphic.png" alt="about us">
                    </div>
                    <!-- Image Ends -->
                    <!-- Content Starts -->
                    <div class="col-sm-12 col-md-7 col-lg-6">
                        <h3 class="title-about" style="color: #000;">WE RE-INVENTED CRYPTO Trading</h3>
                        <p class="about-text" style="color: #000;">{{config('app.name')}} is a highly trusted crypto Trading comapany, helping millions of individuals and firms across the globe to safely Trade and earn more with crypto currency.</p>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#menu1">Our Mission</a></li>
                            <li><a data-toggle="tab" href="#menu2">Our advantages</a></li>
                            <li><a data-toggle="tab" href="#menu3">Our values</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active">
                                <p style="color: #000;">To make cryptocurrency Trading easy and simple for everyone, by empowering individuals, Tradeors, and developers to join the revolution.</p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <p style="color: #000;">Our Organisation employs the best analyst and professional crypto traders who works with modern trends to bring more returns to your Trading.</p>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <p style="color: #000;">At {{config('app.name')}}, we belive that everyone should have an unmetered access to explore the wonderful world of crypto with all of its benefits. </p>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="register">Create a free account</a>
                    </div>
                    <!-- Content Ends -->
                </div>
                <div class="row about-content">
                    <!-- Image Starts -->
                    <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                        <img class="img-responsive img-about-us" src="desk.jpg" alt="about us">
                    </div>
                    <!-- Image Ends -->
                    <!-- Content Starts -->
                    <div class="col-sm-12 col-md-7 col-lg-6">
                        <h3 class="title-about" style="color: #000;">{{config('app.name')}} a broker by Traders for Traders and your Partner in the world of Finance</h3>
                        <p class="about-text" style="color: #000;">{{config('app.name')}} As a client- oriented company, we embrace the needs of the traders whom expect and demand tight spread, fast execution, and Transparency of operation</p><p>Whether you are an experienced trader or new into currency trading, our user-friendly trading platforms are simple yet sophisticated enough to give you the best Trading experience and provide quality trading infrastructure for all types of clients</p>
                        <a class="btn btn-primary" href="/register">Create a live account</a>
                    </div>
                    <!-- Content Ends -->
                </div>
                <!-- Section Content Ends -->
            </div>
        </section>
        <!-- About Section Ends -->
        <!-- Pricing Starts -->
        <section class="pricing">
            <div class="container">
                <div class="row text-center">
                    <h2 class="title-head">affordable investment <span>packages</span></h2>
                    <div class="title-head-subtitle">
                        <p>Choose a plan that fits your life style</p>
                    </div>
                </div>

                <div class="row pricing-tables-content">
                    <div class="pricing-container">
                        <ul class="pricing-list bounce-invert">
                            @foreach($packages as $package)
                               @foreach($package->plans as $plan)
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <li data-type="buy" class="is-visible">
                                        <header class="pricing-header">
                                           <h6 style="color: #FD961A; font-weight: bolder;">{{ $package->name }}({{ $plan->name }})</h6>
                                            <div class="price">
                                            
                                                <span class="value">{{ $plan->profit_rate }}</span>
                                                <span class="currency">%</span>
                                                
                                            </div>
                                            <h2>{{ $package->formatted_payment_period_alt2 }}</h2>
                                            <br>
                                            <h6 style="color: #fff;">Minimum Investment: {{ moneyFormat($plan->min_deposit, 'USD') }}</h6>
                                            <h6 style="color: #fff;">Maximum Investment: {{ moneyFormat($plan->max_deposit, 'USD') }}</h6>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="register" class="btn btn-primary">Select Plan</a>
                                        </footer>
                                    </li>
                                </ul>
                                @endforeach
                             @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Ends -->
        <!-- Features and Video Section Starts -->
        <section class="image-block">
            <div class="container-fluid">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <br>
                    <h2 class="title-head">Why Choose <span>Us?</span></h2>
                    <div class="title-head-subtitle">
                        <p>join the revolution and start earning</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <div class="row">
                    <div class="col ts-padding ">
                        <div class="gap-20"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="feature text-center" style="border: 2px solid #ebb112; padding: 5px;">
                                    <span class="feature-icon">
                                        <img src="frontend_assets/images/icons/orange/strong-security.png" alt="strong security" />
                                    </span>
                                    <h3 class="feature-title">Strong Security</h3>
                                    <p>Our user data and digital assets are secure stored military grade protection against DDoS attacks and full data encryption</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="feature text-center" style="border: 2px solid #ebb112; padding: 5px;">
                                    <span class="feature-icon">
                                        <img src="frontend_assets/images/icons/orange/world-coverage.png" alt="world coverage" />
                                    </span>
                                    <h3 class="feature-title">Amazing Returns</h3>
                                    <p>We work with professional Bitcoin analysts with years of experience in Bitcoin trading to bring more returns to your Trading. </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="feature text-center" style="border: 2px solid #ebb112; padding: 5px;">
                                    <span class="feature-icon">
                                        <img src="frontend_assets/images/icons/orange/world-coverage.png" alt="world coverage" />
                                    </span>
                                    <h3 class="feature-title">Your Funds are Insured</h3>
                                    <p>Your digital assets stored on our servers is covered by world class insurance policy to help keep your assets safe.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="feature text-center" style="border: 2px solid #ebb112; padding: 5px;">
                                    <span class="feature-icon">
                                        <img src="frontend_assets/images/icons/orange/strong-security.png" alt="strong security" />
                                    </span>
                                    <h3 class="feature-title">Trusted</h3>
                                    <p>We Trade and processed millions of dollars in transactions daily with happy customers in over 90 countries.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
         <!-- Quote and Chart Section Starts -->
        <section class="image-block2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 img-block-quote bg-image-2">
                        <blockquote>
                            <p>Bitcoin enables certain uses that are very unique. I think it offers possibilities that no other currency allows. For example the ability to spend a coin that only occurs when two separate parties agree to spend the coin; with a third party that couldn’t run away with the coin itself.</p>
                            <footer> <span>- Pieter Wuille</span></footer>
                        </blockquote>
                    </div>
                    <div class="col-md-8 bg-grey-chart">
                        <div class="chart-widget dark-chart chart-1">
                            <div>
                                <script src="https://widgets.coingecko.com/coingecko-coin-compare-chart-widget.js"></script>
                                <coingecko-coin-compare-chart-widget coin-ids="bitcoin,ethereum,eos,ripple,litecoin" currency="usd" locale="en"></coingecko-coin-compare-chart-widget>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Quote and Chart Section Ends -->
        
        <!-- Features and Video Section Starts -->
        <section class="image-block">
            <div class="container-fluid">
                <div class="row">
                    <!-- Features Starts -->
                    <div class="col-md-8 ts-padding img-block-left">
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="strong-security" src="frontend_assets/images/icons/orange/strong-security.png" alt="strong security"/>
                                    </span>
                                    <h3 class="feature-title">Strong Security</h3>
                                    <p>Protection against DDoS attacks, <br>full data encryption</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                            <div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="world-coverage" src="frontend_assets/images/icons/orange/world-coverage.png" alt="world coverage"/>
                                    </span>
                                    <h3 class="feature-title">World Coverage</h3>
                                    <p>Providing services in 99% countries<br> around all the globe</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="payment-options" src="frontend_assets/images/icons/orange/payment-options.png" alt="payment options"/>
                                    </span>
                                    <h3 class="feature-title">Payment Options</h3>
                                    <p>Popular methods: Visa, MasterCard, <br>bank transfer, cryptocurrency</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                            <div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="mobile-app" src="frontend_assets/images/icons/orange/mobile-app.png" alt="mobile app"/>
                                    </span>
                                    <h3 class="feature-title">Mobile App</h3>
                                    <p>Trading via our Mobile App, Available<br> in Play Store & App Store</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="cost-efficiency" src="frontend_assets/images/icons/orange/cost-efficiency.png" alt="cost efficiency"/>
                                    </span>
                                    <h3 class="feature-title">Cost efficiency</h3>
                                    <p>Reasonable trading fees for takers<br> and all market makers</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                            <div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="high-liquidity" src="frontend_assets/images/icons/orange/high-liquidity.png" alt="high liquidity"/>
                                    </span>
                                    <h3 class="feature-title">High Liquidity</h3>
                                    <p>Fast access to high liquidity orderbook<br> for top currency pairs</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                    </div>
                    <!-- Features Ends -->
                    <!-- Video Starts -->
                    <div class="col-md-4 ts-padding bg-image-1">
                        <div>
                            <div class="text-center">
                                <a class="button-video mfp-youtube" href="https://www.youtube.com/embed/Gc2en3nHxA4"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Video Ends -->
                </div>
            </div>
        </section>
        <!-- Features and Video Section Ends -->
        

  @include('partials.landing-footer')
@endsection


