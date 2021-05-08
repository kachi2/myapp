@extends('layouts.landing', ['page_title' => 'Cryptominex.com', 'heading' => 'Cryptominex.com', 'sub_heading' => 'Welcome to Cryptominex.com'])

@section('content')
    <!-- Content Section -->
    @include('partials.landing-header')
<!-- Start Banner 
    ============================================= -->
<div class="banner-area text-combo top-pad-90 rectangular-shape bg-light-gradient">
    <div class="item">
        <div class="box-table">
            <div class="box-cell">
                <div class="container">
                    <div class="row">
                        <div class="double-items">
                            <div class="col-lg-6 info">
                                <h2 class="wow fadeInDown" data-wow-duration="1s"><span>A Higher Dimension</span> Of Financial Growth</h2>
                                <p class="wow fadeInLeft" data-wow-duration="1.5s">The key to growth is the introduction of higher dimensions into your awareness. At {{config('app.name')}} LLC, we have been continuously transforming the traditional money management industry, in order to open the financial markets to everyone, everywhere.</p>
                                <div style="display: inline-block"><a class="btn  circle btn-gradient wow fadeInUp" data-wow-duration="1.8s" href="login">Login <i class="fas fa-plus"></i></a><a class="btn  circle btn-gradient wow fadeInUp" data-wow-duration="1.8s" href="register">Signup <i class="fas fa-plus"></i></a>
                              </div>
                             </div>
                            <div class="col-lg-6 thumb wow fadeInRight" data-wow-duration="1s">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner --><!-- Start Our Features
    ============================================= -->
<div class="our-features-area wavesshape-bottom carousel-shadow default-padding">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-12 info">
                <div class="feature-items feature-carousel owl-carousel owl-theme">
                    <!-- Single Item -->
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-target"></i>
                        </div>
                        <h3>Affliate Program</h3>
                        <p>
                            Are you a true leader, eager to help not only yourself, but also other investors reach their financial independence? Become an official representative of our company and receive up to 10% of additional income from your partners’ newly created deposits.


                        </p>
                        <div class="bottom">
                            <a class="btn-simple" href="#"><i class="fas fa-angle-right"></i> Get Started</a>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-competition"></i>
                        </div>
                        <h3>Analysis competitors</h3>
                        <p>
                           Our investment plans, developed by the team of professional traders and economists of {{config('app.name')}} LLC, offer you the most beneficial terms for arranging your own source of passive income. The minimum deposit amount for our platform is only $15, which is much more acceptable than any other trust management options on today’s market.


                        </p>
                        <div class="bottom">
                            <a class="btn-simple" href="#"><i class="fas fa-angle-right"></i> Get Started</a>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-data"></i>
                        </div>
                        <h3>Crypto Trading</h3>
                        <p>
                            You think that cryptocurrency trading is too risky, and the entry threshold for the Forex market, as well as stock exchanges, is set too high? With {{config('app.name')}} LLC, you will not have to worry about any of these aspects anymore - entrust your money management to our professional team.
                        </p>
                        <div class="bottom">
                            <a class="btn-simple" href="#"><i class="fas fa-angle-right"></i> Get Started</a>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </div>
    <div class="waveshape">
        <img src="design/app/dist/img/shape/6.svg" alt="Shape">
    </div>
</div>
<!-- End Features -->

<!-- Start Our About
    ============================================= -->
<div class="about-area text-center bg-gray">
    <div class="container">
        <div class="about-items">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="heading">
                        <h4>About Us</h4>
                        <h2>
                            We provide big data analytics Techniques & realtime investment Solutions
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="content">
                        <p>
                            Broadly defined, high-frequency trading refers to automated, electronic systems that use complex algorithms (strings of coded instructions for computers) to buy and sell much faster and at much greater scale than any human could do. Our system is designed to make just a tiny profit on each transaction, but through sheer speed and volume, we generate large returns. Hence, we don’t risk a lot but we do profit a lot.

                        </p>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Our About -->


<!-- Start Fun Factor Area
    ============================================= -->
    <div class="fun-factor-area bg-gray default-padding">
        <!-- Fixed BG -->
        <div class="fixed-bg" style="background-image: url(assets/img/map.html);"></div>
        <!-- Fixed BG -->
        <div class="container">
            <div class="client-items text-center">
                <div class="row">
                    <div class="col-lg-3 col-md-6 item">
                        <div class="fun-fact">
                            <div class="timer" data-to="687" data-speed="5000">687M</div>
                            <span class="medium">LAST MONTHS PAYOUTS</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 item">
                        <div class="fun-fact">
                            <div class="timer" data-to="2348" data-speed="5000">2348</div>
                            <span class="medium">REGISTERED USERS</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 item">
                        <div class="fun-fact">
                            <div class="timer" data-to="450" data-speed="5000">450</div>
                            <span class="medium">NUMBER OF EMPLOYEE'S</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 item">
                        <div class="fun-fact">
                            <div class="timer" data-to="100" data-speed="5000">100</div>
                            <span class="medium">YEARS OF EXPERIENCE </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Fun Factor Area -->

<!-- Start Fun Factor Area
    ============================================= -->
<!-- End Fun Factor Area -->

<!-- Start Services Area
    ============================================= -->
<div class="services-area left-border default-padding bottom-less">

    <!-- Shape Fixed Rotation -->
    <div class="shape-fixed animation-rotation">
        <img src="design/app/dist/img/round-shappe.png" alt="Thumb">
    </div>
    <!-- Dhape Fixed Rotation -->

    <div class="container">
        <div class="heading-left">
            <div class="row">
                <div class="col-lg-5">
                    <h2>
                        We offer a wide range of services and provide realtime investment Solutions
                    </h2>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <p>
                        GET STARTED WITH {{config('app.name')}} LLC NOW!
Do not delay until tomorrow what you can earn today!
                    </p>
                </div>
            </div>
        </div>
        <div class="services-items">
            <div class="row">
                <!-- Single Item -->
                <div class="single-item col-lg-4 col-md-6">
                    <div class="item">
                        <img src="design/app/dist/img/icon/1.png" alt="Thumb">
                        <h4>Trust</h4>
                        <p>
                            Our company is fully regulated by the FCA and CySec


                        </p>
                        
                    </div>
                </div>
                <!-- Single Item -->
                <!-- Single Item -->
                <div class="single-item col-lg-4 col-md-6">
                    <div class="item">
                        <img src="design/app/dist/img/icon/2.png" alt="Thumb">
                        <h4>Security</h4>
                        <p>
                            Your funds are protected by industry-leading security protocols


                        </p>
                        
                    </div>
                </div>
                <!-- Single Item -->
                <!-- Single Item -->
                <div class="single-item col-lg-4 col-md-6">
                    <div class="item">
                        <img src="design/app/dist/img/icon/3.png" alt="Thumb">
                        <h4>Data Privacy</h4>
                        <p>
                           We will never share your private data without your permission


                        
                    </div>
                </div>
                <!-- Single Item -->
            </div>
        </div>
    </div>
</div>
<!-- End Services Area -->

<!-- Start Work Process Area
    ============================================= -->
<div class="work-process-area bg-gray default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h4>Work Process</h4>
                    <h2>
                        How We Work
                    </h2>
                </div>
            </div>
        </div>
        <div class="works-process-items text-center">
            <div class="row">
                <!-- Single Item -->
                <div class="col-lg-4 single-item">
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-problem"></i>
                            <span>01</span>
                        </div>
                        <div class="info">
                            <h4>Create Account
</h4>
                            <p>
                                Hit the Signup button & share your details to create your Centrofinance account.

                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-lg-4 single-item">
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-data-collection"></i>
                            <span>02</span>
                        </div>
                        <div class="info">
                            <h4>Open Deposit
</h4>
                            <p>
                               We offer versatile investment plans to suit your financial benefits. Pick a plan and make deposit.

                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-lg-4 single-item">
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-cloud-data"></i>
                            <span>03</span>
                        </div>
                        <div class="info">
                            <h4>Smart Earnings
</h4>
                            <p>
                                Watch your earnings grow continuously on your dashboard


                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div>
</div>
<!-- End Work Process Area -->


<!-- Start Testimonials Area
    ============================================= -->
<div class="testimonials-area default-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center mt-5">
                    <h4>Testimonials</h4>
                    <h2>
                        What people say
                    </h2>
                </div>
            </div>
        </div>
        <div class="testimonial-items text-center">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="carousel slide" data-ride="carousel" id="testimonial-carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <i class="ti-quote-left"></i>
                                <p>
Etoro is a fantastic trading platform, both from an ease of use and technical perspective.                                </p>
                                <h4>Junl Sarukh</h4>
                            </div>
                            <div class="carousel-item">
                                <i class="ti-quote-left"></i>
                                <p>
It provides a huge variety of investments and a great community of traders...                                </p>
                                <h4>Anil Spia</h4>
                            </div>
                            <div class="carousel-item">
                                <i class="ti-quote-left"></i>
                                <p>
I am very satisfied with the services eToro platform provides.                                </p>
                                <h4>Paul Munni</h4>
                            </div>
                        </div>
                        <!-- End Carousel Content -->

                        <!-- Carousel Indicators -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Testimonials Area -->
<!-- Start Blog Area
    ============================================= -->
<div class="blog-area default-padding bg-gray bottom-less">
    <div class="container">
       
        <div class="blog-items">
            <div class="row">
                            </div>
        </div>
    </div>
</div>
<!-- End Blog Area -->


    <!-- end of Content Section -->
@include('partials.landing-footer')

@endsection
