@extends('layouts.landing', ['page_title' => 'About Us', 'heading' => 'About Us', 'sub_heading' => 'Enjoy real benefits and rewards on your accrue mining.'])
@section('content')
  @include('partials.landing-header') 
     <!-- Banner Area Starts -->
           <div class="page-area">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcrumb text-center">
                            <div class="section-headline white-headline">
                                <h3>FAQ</h3>
                            </div>
                            <ul class="breadcrumb-bg">
                                <li class="home-bread">Home</li>
                                <li>FAQ</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area Ends -->
        <!-- Section FAQ Starts -->
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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="company-faq">
                            <div class="faq-full">
								<div class="faq-details">
									<div class="panel-group" id="accordion">
										<!-- Panel Default -->
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="check-title">
													<a data-toggle="collapse" class="active" data-parent="#accordion" href="#check1">
														<span class="acc-icons"></span>HOW CAN I INVEST WITH Acrabuscapital
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
														<span class="acc-icons"></span>I WISH TO INVEST WITH Acrabuscapital BUT I DON'T HAVE AN ANY ECURRENCY ACCOUNT. WHAT SHOULD I DO?
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
        <!-- Section FAQ Ends -->
@include('partials.landing-footer')

@endsection
