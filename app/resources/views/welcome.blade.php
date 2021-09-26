
@extends('layouts.landing', ['page_title' => 'Home', 'heading' => 'Home', 'sub_heading' => 'Enjoy real benefits and rewards on your accrue mining.'])
@section('content')
  @include('partials.landing-header') 
        <div class="intro-area">
           <div class="main-overly"></div>
            <div class="intro-carousel">
                <div class="intro-content">
                    <div class="slider-images">
                        <img src="{{asset('/frontend/img/slider.jpg')}}" alt="">
                    </div>
                    <div class="slider-content">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <!-- Start Slider content -->
                                            <div class="slide-content text-center">
                                                <h2 class="title2">Best secure investment plan</h2>
                                                <div class="layer-1-3">
                                                    <a href="{{route('register')}}" class="ready-btn left-btn" >Get started</a>
                                                </div>
                                            </div>
                                            <!-- End Slider content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="intro-content">
                    <div class="slider-images">
                        <img src="{{asset('/frontend/img/slider1.jpg')}}" alt="">
                    </div>
                    <div class="slider-content">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="container">
                                    <div class="row">
                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                            <!-- Start Slider content -->
                                            <div class="slide-content text-center">
                                                <h2 class="title2">Acrabuscapital is a trading comapany you can trust</h2>
                                                <div class="layer-1-3">
                                                    <a href="{{route('register')}}" class="ready-btn left-btn" >Get started</a>
                                                </div>
                                            </div>
                                            <!-- End Slider content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->
          <div class="feature-area bg-color fix area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="feature-content">
                            <div class="feature-images">
                                <img src="{{asset('/frontend/img/feature/f1.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="feature-text">
                            <h3>WE RE-INVENTED CRYPTO TRADING</h3>
						    <p>Acrabuscapital is a highly trusted crypto Trading comapany, helping millions of individuals and firms across the globe to safely Trade and earn more with crypto currency</p>
                            <ul>
                               <li><a href="#">Automated and Robot analyzed trading system</a></li>
                                <li><a href="#">Trading made easy, simple and fast</a></li>
                                <li><a href="#">Safe secure platform, you are very much safe with Acrabuscapital system</a></li>
                            </ul>
                            <a class="feature-btn" href="{{route('index')}}">Register Now</a>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
        <!-- Start Count area -->
        <div class="counter-area fix area-padding-2">
            <div class="container">
                <!-- Start counter Area -->
                 <div class="row">
                    <div class="fun-content">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <!-- fun_text  -->
                            <div class="fun_text">
                                <span class="counter-icon"><i class="flaticon-035-savings"></i></span>
                                <span class="counter">$5974544</span>
                                <h4>Total Deposited</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <!-- fun_text  -->
                            <div class="fun_text">
                               <span class="counter-icon"><i class="flaticon-034-reward"></i></span>
                                <span class="counter">2209</span>
                                <h4>Total Members</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <!-- fun_text  -->
                            <div class="fun_text">
                               <span class="counter-icon"><i class="flaticon-016-graph"></i></span>
                                <span class="counter">$3974544</span>
                                <h4>Total Payments</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <!-- fun_text  -->
                            <div class="fun_text">
                              <span class="counter-icon"><i class="flaticon-043-world"></i></span>
                                <span class="counter">80</span>
                                <h4>World Country</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Count area -->
        <!-- Start Invest area -->
        <div class="invest-area bg-color area-padding-2">
            <div class="container">
                <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
                            <h3>The best investment plan</h3>
                            <p>Choose the best plan for you.</p>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="pricing-content">
                     @foreach($packages as $package)
                               @foreach($package->plans as $plan)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="pri_table_list">
                                <div class="top-price-inner">
                                <span style="font-size:12px">{{ $package->name }}({{ $plan->name }})</span>
                                   <div class="rates">
                                        <span class="prices">{{ $plan->profit_rate }}%</span><span class="users"></span>
                                    </div>
                                    <span class="per-day">{{ $package->formatted_payment_period_alt2 }}</span>
                                </div>
                                <ol class="pricing-text">
                                    <li class="check">Minimum Investment: {{ moneyFormat($plan->min_deposit, 'USD') }}</li>
                                    <li class="check">Maximum Investment: {{ moneyFormat($plan->max_deposit, 'USD') }}</li>
                                </ol>
                                <div class="price-btn blue">
                                    <a class="blue" href="#">Select Plan</a>
                                </div>
                            </div>
                        </div>
                           @endforeach
                             @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End Invest area -->
        <!-- Start Support-service Area -->
        <div class="support-service-area fix area-padding-2">
            <div class="container">
                <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
                            <h3>Why choose Us</h3>
                            <p>JOIN THE REVOLUTION AND START EARNING.</p>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="support-all">
                        <!-- Start About -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="support-services wow ">
                                <a class="support-images" href="#"><i class="flaticon-023-management"></i></a>
                                <div class="support-content">
                                    <h4>Expert Management</h4>
                                    <p>We understands that crypto investment is a highly risky business, our trained expertize and robot systems enable us to make decisions</p>
                                </div>
                            </div>
                        </div>
                        <!-- Start About -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="support-services ">
                                <a class="support-images" href="#"><i class="flaticon-036-security"></i></a>
                                <div class="support-content">
                                    <h4>Secure investment</h4>
                                    <p>Our user data and digital assets are secure stored in highly secured cloud system against DDoS attacks and our data are fully encrypted</p>
                                </div>
                            </div>
                        </div>
                        <!-- Start services -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="support-services ">
                                <a class="support-images" href="#"><i class="flaticon-003-approve"></i></a>
                                <div class="support-content">
                                    <h4>Investment Returns</h4>
                                    <p>We work with professional Bitcoin analysts with years of experience in Bitcoin trading to bring more returns to your Trading.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Start services -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="support-services">
                                <a class="support-images" href="#"><i class="flaticon-042-wallet"></i></a>
                                <div class="support-content">
                                    <h4>Instant withdrawal</h4>
                                    <p>Your investment is automatically sent to your wallet at the completion your compaigne without human intervention</p>
                                </div>
                            </div>
                        </div>
                        <!-- Start services -->
                    
                    </div>
                </div>
            </div>
        </div>
        <!-- End Support-service Area -->
        <!-- Start Self-area -->
        
        <!-- End Self-area -->
        <!-- Start Work proses Area -->
        <div class="work-proses fix bg-color area-padding-2">
			<div class="container">
			    <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
                            <h3>Referral bonus level</h3>
                            <p>There is a great reward for every hardwork, our referral program is perfect for everyone.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="work-proses-inner text-center">
							    <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="single-proses">
                                        <div class="proses-content">
                                            <div class="proses-icon point-blue">
                                                <span class="point-view">01</span>
                                                <a href="#"><i class="ti-briefcase"></i></a>
                                            </div>
                                            <div class="proses-text">
                                                <h4>Starter Account, instant $10</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End column -->
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="single-proses">
                                        <div class="proses-content">
                                            <div class="proses-icon point-orange">
                                               <span class="point-view">02</span>
                                                <a href="#"><i class="ti-layers"></i></a>
                                            </div>
                                            <div class="proses-text">
                                                <h4>Regular Account, instant $15</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End column -->
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="single-proses last-item">
                                        <div class="proses-content">
                                            <div class="proses-icon point-green">
                                               <span class="point-view">03</span>
                                                <a href="#"><i class="ti-bar-chart-alt"></i></a>
                                            </div>
                                            <div class="proses-text">
                                                <h4>Premium Account instant $25</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End column -->
							</div>
						</div>
                    </div>
				</div>
			</div>
		</div>
        <!-- End Work proses Area -->
        <!--Start payment-history area -->
    
        <!-- End payment-history area -->
        <!-- Start Banner Area -->
        <div class="banner-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="banner-all area-80 text-center">
                        
                    <div class="col-md-12 col-sm-12 col-xs-12">
                     <div><center><h2 style="color:#fff; font-weight:bold"> Crypto Live Updates</h2></center>
                                <embed src="https://coinmarkets.today" style="width:100%; height: 400px;">
                              
                                <coingecko-coin-compare-chart-widget coin-ids="bitcoin,ethereum,eos,ripple,litecoin" currency="usd" locale="en"></coingecko-coin-compare-chart-widget>
                            </div>
                  </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Area -->
        <!-- Start Blog Area-->
      
        <!-- End Blog Area-->
        <!-- Start reviews Area -->
        <div class="reviews-area fix area-padding">
            <div class="container">
                <div class="row">
                    <div class="reviews-top">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="testimonial-inner">
                                <div class="review-head">
                                    <h3>What our customers say about Us</h3>
                                    <p>Good work deserves good testimonies, read few of our customers testimonies. you can always drop your testimony on the dashoard</p>
                                    <a class="reviews-btn" href="{{route('register')}}">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="reviews-content">
                                <!-- start testimonial carousel -->
                                <div class="testimonial-carousel item-indicator">
                                    <div class="single-testi">
                                        <div class="testi-text">
                                            <div class="clients-text">
                                                <p>I am so delighted to be part of this campaign, you help me grow my savings weekly, am so glad</p>
                                            </div>
                                            <div class="testi-img ">
                                                <div class="guest-details">
                                                    <h4>James Wills</h4>
                                                    <span class="guest-rev"><i class="fa fa-facebook"></i> - <a href="https://web.facebook.com/james.mills.5832">James Wills</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End single item -->
                                    <div class="single-testi">
                                        <div class="testi-text">
                                            <div class="clients-text">
                                              
                                                <p>I started using this platform over 3 years and i must confess, am glad am here</p>
                                            </div>
                                            <div class="testi-img ">
                                                <div class="guest-details">
                                                    <h4>Henry Woods</h4>
                                                    <span class="guest-rev"><i class="fa fa-facebook"></i> - <a href="https://web.facebook.com/henry.woods.3956">Angella Woods</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End single item -->
                                    <div class="single-testi">
                                        <div class="testi-text">
                                            <div class="clients-text">
                                                
                                                <p>My friend James introduced me to Acrabuscapital last year, and since then, i have enjoyed my returns</p>
                                            </div>
                                            <div class="testi-img ">
                                                <div class="guest-details">
                                                    <h4>Arthur Rodriguez</h4>
                                                    <span class="guest-rev"><i class="fa fa-facebook"></i> - <a href="https://web.facebook.com/arthur.rodriguez">Arthur Rodriguez</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End single item -->
                                  
                                    <!-- End single item -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End reviews Area -->
        <!-- Start FAQ area -->
        <div class="faq-area bg-color area-padding">
            <div class="container">
               <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
                            <h3>Most Frequently asked questions</h3>
                            <hr>
                       </div>
					</div>
				</div>
                <div class="row">
                    <!-- Start Column Start -->
                    <div class="col-md-12 col-sm-8 col-xs-12">
                        <div class="company-faq">
                            <div class="faq-full">
								<div class="faq-details">
									<div class="panel-group" id="accordion">
										<!-- Panel Default -->
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="check-title">
													<a data-toggle="collapse" class="active" data-parent="#accordion" href="#check1">
														<span class="acc-icons"></span>HOW CAN I INVEST WITH ACRABUSCAPITAL
													</a>
												</h4>
											</div>
											<div id="check1" class="panel-collapse collapse in">
												<div class="panel-body">
													     <p>To invest on our system, you must be a registered member . Once you are signed up, you can make your first deposit. You can login using the member username and password you receive when signup.</p>
								
												</div>
											</div>
										</div>
										<!-- End Panel Default -->
										<!-- Panel Default -->
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="check-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#check2">
														<span class="acc-icons"></span>I WISH TO INVEST WITH ACRABUSCAPITAL BUT I DON'T HAVE AN ANY ECURRENCY ACCOUNT. WHAT SHOULD I DO?
													</a>
												</h4>
											</div>
											<div id="check2" class="panel-collapse collapse">
												<div class="panel-body">
													<p>
														You can open a free Bitcoin account here: www.coinbase.com
													</p>										
												</div>
											</div>
										</div>
										<!-- End Panel Default -->
										<!-- Panel Default -->
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="check-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#check3">
														<span class="acc-icons"></span>HOW CAN I WITHDRAW FUNDS? 
													</a>
												</h4>
											</div>
											<div id="check3" class="panel-collapse collapse ">
												<div class="panel-body">
													<p>
														Login to your account using your username and password and check the Withdrawal section.
													</p>	
												</div>
											</div>
										</div>
										<!-- End Panel Default -->	
										<!-- Panel Default -->
									
										<!-- End Panel Default -->
										<!-- Panel Default -->
										
										<!-- End Panel Default -->										
									</div>
								</div>
								<!-- End FAQ -->
							</div>
                        </div>
                    </div>
                    <!-- End Column -->
             
                    <!-- End Column -->
                </div>
            </div>
        </div>

  @include('partials.landing-footer')
@endsection


