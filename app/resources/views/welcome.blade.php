@extends('layouts.landing')
@section('content')

 <!-- Start New App Main Banner Wrap Area -->
 <div class="new-app-main-banner-wrap-area">
   <div class="container-fluid">
       <div class="row align-items-center">
           <div class="col-lg-6 col-md-12">
               <div class="new-app-main-banner-wrap-content">
                   <h1 style="font-size: 50px; font-weight:500">Deposit, Invest Cryptocurrencies and Earn Profits on Advent</h1>
                   <p></p>
                   <div class="app-btn-box">
                       <a href="#" class="applestore-btn" target="_blank">
                           <img src="{{asset('/frontend_assets/assets/img/apple-store.png')}}" alt="image">
                           Download on the
                           <span>Apple Store</span>
                       </a>

                       <a href="#" class="playstore-btn" target="_blank">
                           <img src="{{asset('/frontend_assets/assets/img/play-store.png')}}" alt="image">
                           Get It On
                           <span>Google Play</span>
                       </a>
                   </div>
               </div>
           </div> 
           <div class="col-lg-6 col-md-12">
               <div class="new-app-main-banner-wrap-image" data-aos="fade-left" data-aos-duration="2000">
                   <img src="{{asset('/frontend_assets/assets/img/phone.png')}}" width="600px" alt="image">

                   <div class="wrap-image-shape-1">
                       <img src="{{asset('frontend_assets/assets/img/more-home/banner/shape-3.png')}}" alt="image">
                   </div>
                   <div class="wrap-image-shape-2">
                       <img src="{{asset('frontend_assets/assets/img/more-home/banner/shape-4.png')}}" alt="image">
                   </div>
                   <div class="banner-circle">
                       <img src="{{asset('frontend_assets/assets/img/more-home/banner/banner-circle.png')}}" alt="image">
                   </div>
               </div>
           </div>
       </div>
   </div>

   <div class="new-app-main-banner-wrap-shape">
       <img src="assets/img/more-home/banner/shape-5.png" alt="image">
   </div>
</div>
<!-- End New App Main Banner Wrap Area -->
<div class="features-area pt-100 pb-75">
   <div class="container">
       <div class="row align-items-center">
           <div class="col-lg-6 col-md-12">
               <div class="features-inner-content">
                   <span class="sub-title">Why Choose Us</span>
                   <h2>Most Probably Included Best Features Ever</h2>
                   <p>Here at Advent, we are committed to user protection with strict protocols and industry-leading technical measures.</p>
                   <div class="btn-box">
                     <a href="{{route('login')}}" class="default-btn">Get Started </a>
                 </div>
               </div>
           </div>
           <div class="col-lg-6 col-md-12 features-inner-list">
               <div class="row justify-content-center">
                   <div class="col-lg-6 col-sm-6">
                       <div class="features-inner-card">
                           <div class="icon">
                               <i class="ri-eye-line"></i>

                               <h3>Expertize Managment</h3>
                           </div>
                           <p>We understands that crypto investment is a highly risky business, our trained expertize and robot systems enable us to make decisions</p>
                       </div>
                   </div>

                   <div class="col-lg-6 col-sm-6">
                       <div class="features-inner-card with-box-shadow">
                           <div class="icon">
                               <i class="ri-stack-line"></i>
                               
                               <h3>Secured Investments</h3>
                           </div>
                           <p>Our user data and digital assets are secure stored in highly secured cloud system against DDoS attacks and our data are fully encrypted</p>
                       </div>
                   </div>

                   <div class="col-lg-6 col-sm-6">
                       <div class="features-inner-card with-box-shadow">
                           <div class="icon">
                               <i class="ri-cloud-line"></i>
                               
                               <h3>Automated Withdrawals</h3>
                           </div>
                           <p>Your payouts are automatically sent to your wallet at the completion your compaign without human intervention.</p>
                       </div>
                   </div>

                   <div class="col-lg-6 col-sm-6">
                       <div class="features-inner-card">
                           <div class="icon">
                               <i class="ri-leaf-line"></i>
                               
                               <h3>Advanced Data Encryption</h3>
                           </div>
                           <p>Your transaction data is secured via end-to-end encryption, ensuring that only you have access to your personal information.</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- Start Features Area -->

<!-- End Features Area -->

<!-- Start Features Area -->
<div class="features-area pb-75">
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-xl-3 col-lg-3 col-sm-3 col-md-3 col-6">
               <div class="features-box-card">
                   <div class="icon">
                       <i class="ri-smartphone-line"></i>
                   </div>
                   <h3>User Friendly</h3>
               </div>
           </div>
           <div class="col-xl-3 col-lg-3 col-sm-3 col-md-3 col-6">
               <div class="features-box-card">
                   <div class="icon bg2">
                       <i class="ri-award-line"></i>
                   </div>
                   <h3>Award Winning App</h3>
               </div>
           </div>
           <div class="col-xl-3 col-lg-3 col-sm-3 col-md-3 col-6">
               <div class="features-box-card">
                   <div class="icon">
                       <i class="ri-fingerprint-line"></i>
                   </div>
                   <h3>Privacy Protected</h3>
               </div>
           </div>
           <div class="col-xl-3 col-lg-3 col-sm-3 col-md-3 col-6">
               <div class="features-box-card">
                   <div class="icon bg2">
                       <i class="ri-vip-diamond-line"></i>
                   </div>
                   <h3>Lifetime Update</h3>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- End Features Area -->

<!-- Start App About Area -->
<div class="app-about-area pb-100">
   <div class="container">
       <div class="row align-items-center">
           <div class="col-lg-6 col-md-12">
               <div class="app-about-image">
                   <img src="assets/img/more-home/about/about-2.png" alt="image">
               </div>
           </div>

           <div class="col-lg-6 col-md-12">
               <div class="app-about-content">
                   <span class="sub-title">ABOUT US</span>
                   <h2>Most Probably You Are Getting Best App Ever</h2>
                   <p>Cloud based storage for your data backup just log in with your mail account from play store and using whatever you want for your business purpose orem ipsum dummy text. Never missyour chance its just began.</p>
                   <ul class="list">
                       <li>
                           <div class="icon bg-3">
                               <i class="ri-award-line"></i>
                           </div>
                           <h3>Trusted and Reliable</h3>
                           <p>Most provabily best you can trust on it, just log in with your mail account from play store and using whatever you want for your business.</p>
                       </li>
                       <li>
                           <div class="icon bg-3">
                               <i class="ri-download-cloud-2-line"></i>
                           </div>
                           <h3>Cloud Storage</h3>
                           <p>Just log in with your mail account from play store and using whatever you want for your business purpose.</p>
                       </li>
                   </ul>
                   <div class="btn-box">
                       <a href="app-download.html" class="default-btn">Start Free Trial</a>
                       <a href="features-1.html" class="link-btn">See All Features</a>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- End App About Area -->

<!-- Start Key Features Area -->
<div class="key-features-area bg-transparent-with-color pt-100 pb-100">
   <div class="container">
       <div class="section-title">
           <span class="sub-title">KEY FEATURES</span>
           <h2>Most Probably Included Best Features Ever</h2>
       </div>

       <div class="row justify-content-center">
           <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
               <div class="key-features-card style-two">
                   <div class="icon">
                       <i class="ri-eye-line"></i>
                   </div>
                   <h3>High Resolution</h3>
                   <p>Just log in with your mail account from play store and using whatever you want for your able business purpose.</p>
               </div>
           </div>
           <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
               <div class="key-features-card bg-color-two style-two">
                   <div class="icon bg2">
                       <i class="ri-stack-line"></i>
                   </div>
                   <h3>Retina Ready Screen</h3>
                   <p>Just log in with your mail account from play store and using whatever you want for your able business purpose.</p>
               </div>
           </div>
           <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
               <div class="key-features-card style-two">
                   <div class="icon">
                       <i class="ri-leaf-line"></i>
                   </div>
                   <h3>Easy Editable Data</h3>
                   <p>Just log in with your mail account from play store and using whatever you want for your able business purpose.</p>
               </div>
           </div>
           <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
               <div class="key-features-card bg-color-two style-two">
                   <div class="icon bg2">
                       <i class="ri-secure-payment-line"></i>
                   </div>
                   <h3>Fully Secured</h3>
                   <p>Just log in with your mail account from play store and using whatever you want for your able business purpose.</p>
               </div>
           </div>
           <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
               <div class="key-features-card style-two">
                   <div class="icon">
                       <i class="ri-cloud-line"></i>
                   </div>
                   <h3>Cloud Storage</h3>
                   <p>Just log in with your mail account from play store and using whatever you want for your able business purpose.</p>
               </div>
           </div>
           <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
               <div class="key-features-card bg-color-two style-two">
                   <div class="icon bg2">
                       <i class="ri-pie-chart-2-line"></i>
                   </div>
                   <h3>Responsive Ready</h3>
                   <p>Just log in with your mail account from play store and using whatever you want for your able business purpose.</p>
               </div>
           </div>
       </div>

       <div class="key-features-btn">
           <a href="app-download.html" class="default-btn">Start Free Trial</a>
       </div>
   </div>
</div>
<!-- End Key Features Area --> 

<!-- Start App Screenshots Area -->
<div class="app-screenshots-area ptb-100">
   <div class="container">
       <div class="section-title">
           <span class="sub-title">APP SCREENS</span>
           <h2>Beautifully Crafted All App Screenshots</h2>
       </div>
       <div class="app-screenshots-slides owl-carousel owl-theme">
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots1.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots2.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots3.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots4.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots5.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots1.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots2.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots3.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots4.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots5.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots1.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots2.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots3.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots4.png" alt="screenshots">
           </div>
           <div class="single-screenshot-card">
               <img src="assets/img/more-home/screenshots/screenshots5.png" alt="screenshots">
           </div>
       </div>
   </div>
</div>
<!-- End App Screenshots Area -->

<!-- Start App Video Area -->
<div class="app-video-area pb-100">
   <div class="container">
       <div class="row align-items-center">
           <div class="col-lg-6 col-md-12">
               <div class="app-intro-video-box">
                   <img src="assets/img/more-home/video/video-2.jpg" alt="video-img">
                   <a href="https://www.youtube.com/watch?v=PWvPbGWVRrU" class="video-btn popup-video"><i class="ri-play-line"></i></a>

                   <div class="intro-video-shape">
                       <img src="assets/img/more-home/video/shape-3.png" alt="image">
                   </div>
               </div>
           </div>

           <div class="col-lg-6 col-md-12">
               <div class="app-intro-video-content">
                   <span class="sub-title">INTRO VIDEO</span>
                   <h2>Watch Our Most Watched Pakap App Video</h2>
                   <p>Cloud based storage for your data backup just log in with your mail account from play store and using whatever you want for your business purpose orem ipsum dummy text. Never missyour chance its just began. Cloud based storage for your data backup just log in with your mail account from play store and using whatever you want for your business purpose orem ipsum dummy text.Never missyour chance its just began.</p>
                   <a href="contact.html" class="default-btn">Get Started</a>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- End App Video Area -->

<!-- Start Gradient Funfacts Area -->
<div class="gradient-funfacts-area pt-100 pb-75">
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-lg-3 col-sm-6 col-md-6">
               <div class="single-funfacts-card">
                   <div class="icon">
                       <i class="ri-download-2-line"></i>
                   </div>
                   <p>Total Downloads</p>
                   <h3><span class="odometer" data-count="10">00</span><span class="sign">M</span></h3>
               </div>
           </div>
           <div class="col-lg-3 col-sm-6 col-md-6">
               <div class="single-funfacts-card">
                   <div class="icon">
                       <i class="ri-star-fill"></i>
                   </div>
                   <p>Total Reviews</p>
                   <h3><span class="odometer" data-count="799">00</span><span class="sign">K</span></h3>
               </div>
           </div>
           <div class="col-lg-3 col-sm-6 col-md-6">
               <div class="single-funfacts-card">
                   <div class="icon">
                       <i class="ri-global-line"></i>
                   </div>
                   <p>Worldwide Countries</p>
                   <h3><span class="odometer" data-count="150">00</span><span class="sign">+</span></h3>
               </div>
           </div>
           <div class="col-lg-3 col-sm-6 col-md-6">
               <div class="single-funfacts-card">
                   <div class="icon">
                       <i class="ri-map-pin-user-line"></i>
                   </div>
                   <p>Active Users</p>
                   <h3><span class="odometer" data-count="5">00</span><span class="sign">M</span></h3>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- End Gradient Funfacts Area -->

<!-- Start New App Download Area -->
<div class="new-app-download-wrap-area ptb-100">
   <div class="container">
       <div class="row align-items-center">
           <div class="col-lg-6 col-md-12">
               <div class="new-app-download-content">
                   <span class="sub-title">DOWNLOAD APP</span>
                   <h2>Let's Get Your Free Copy From Apple and Play Store</h2>
                   <p>Instant free download from store Cloud based storage for your data backup just log in with your mail account from play store and using whatever you want for your business purpose orem ipsum dummy text.</p>
                   <div class="btn-box color-wrap">
                       <a href="#" class="playstore-btn" target="_blank">
                           <img src="assets/img/play-store.png" alt="image">
                           Get It On
                           <span>Google Play</span>
                       </a>
                       <a href="#" class="applestore-btn" target="_blank">
                           <img src="assets/img/apple-store.png" alt="image">
                           Download on the
                           <span>Apple Store</span>
                       </a>
                   </div>
               </div>
           </div>

           <div class="col-lg-6 col-md-12">
               <div class="new-app-download-image text-end" data-aos="fade-up">
                   <img src="assets/img/more-home/app-download/download-2.png" alt="app-img">

                   <div class="download-circle">
                       <img src="assets/img/more-home/app-download/download-circle.png" alt="image">
                   </div>
               </div>
           </div>
       </div>
   </div>

   <div class="app-download-shape-1">
       <img src="assets/img/more-home/app-download/shape-1.png" alt="image">
   </div>
   <div class="app-download-shape-2">
       <img src="assets/img/more-home/app-download/shape-2.png" alt="image">
   </div>
</div>
<!-- End New App Download Area -->

<!-- Start Feedback Wrap Area -->
<div class="feedback-wrap-area ptb-100">
   <div class="container">
       <div class="section-title">
           <span class="sub-title">CLIENT REVIEWS</span>
           <h2>What Our Customer Say About Us</h2>
       </div>
       <div class="feedback-swiper-wrap-slides swiper-container">
           <div class="swiper-wrapper">
               <div class="swiper-slide">
                   <div class="single-feedback-wrap-item">
                       <div class="rating">
                           <h5>Theme Customization</h5>
                           <div>
                               <i class="ri-star-fill"></i>
                               <i class="ri-star-fill"></i>
                               <i class="ri-star-fill"></i>
                               <i class="ri-star-fill"></i>
                               <i class="ri-star-fill"></i>
                           </div>
                       </div>
                       <p>‘Kiedo is the best digital agency in our area As a midsize software developent company we combine the best of both worlds. We have the focus and speed of the small it outsurcing companies.’</p>
                       <div class="client-info">
                           <img src="assets/img/user/user1.jpg" alt="user">
                           <div class="title">
                               <h3>Deanna Hodges</h3>
                               <span>Spotify Developer</span>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="swiper-slide">
                   <div class="single-feedback-wrap-item">
                       <div class="rating">
                           <h5>Theme Customization</h5>
                           <div>
                               <i class="ri-star-fill"></i>
                               <i class="ri-star-fill"></i>
                               <i class="ri-star-fill"></i>
                               <i class="ri-star-fill"></i>
                               <i class="ri-star-fill"></i>
                           </div>
                       </div>
                       <p>‘Kiedo is the best digital agency in our area As a midsize software developent company we combine the best of both worlds. We have the focus and speed of the small it outsurcing companies.’</p>
                       <div class="client-info">
                           <img src="assets/img/user/user2.jpg" alt="user">
                           <div class="title">
                               <h3>Deanna Hodges</h3>
                               <span>Spotify Developer</span>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="swiper-slide">
                   <div class="single-feedback-wrap-item">
                       <div class="rating">
                           <h5>Theme Customization</h5>
                           <div>
                               <i class="ri-star-fill"></i>
                               <i class="ri-star-fill"></i>
                               <i class="ri-star-fill"></i>
                               <i class="ri-star-fill"></i>
                               <i class="ri-star-fill"></i>
                           </div>
                       </div>
                       <p>‘Kiedo is the best digital agency in our area As a midsize software developent company we combine the best of both worlds. We have the focus and speed of the small it outsurcing companies.’</p>
                       <div class="client-info">
                           <img src="assets/img/user/user3.jpg" alt="user">
                           <div class="title">
                               <h3>Deanna Hodges</h3>
                               <span>Spotify Developer</span>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- Add Pagination -->
           <div class="swiper-button-next" data-aos="fade-right"></div>
           <div class="swiper-button-prev" data-aos="fade-left"></div>
       </div>
   </div>
</div>
<!-- End Feedback Wrap Area -->

<!-- Start App Pricing Area -->
<div class="app-pricing-area pt-100 pb-75">
   <div class="container">
       <div class="row align-items-center">
           <div class="col-lg-4 col-md-12">
               <div class="app-pricing-section-title">
                   <span class="sub-title">PRICING TABLE</span>
                   <h2>No Hidden Charge Applied, Choose Your Plan</h2>
                   <a href="pricing.html">See All Pricing Plan</a>
               </div>
           </div>
           <div class="col-lg-8 col-md-12">
               <div class="row align-items-center">
                   <div class="col-lg-6 col-md-6 col-sm-6">
                       <div class="single-app-pricing-box with-border-radius">
                           <div class="title">
                               <h3>Small Team</h3>
                               <p>Powerful & awesome elements</p>
                           </div>
                           <span class="popular">Most Popular</span>
                           <div class="price">
                               $59 <span>/Month</span>
                           </div>
                           <div class="pricing-btn">
                               <a href="#" class="default-btn">Purchase Plan</a>
                           </div>
                           <ul class="features-list">
                               <li><i class="ri-check-line"></i> Up to 10 Website</li>
                               <li><i class="ri-check-line"></i> Lifetime free Support</li>
                               <li><i class="ri-check-line"></i> 10 GB Dedicated Hosting free</li>
                               <li><i class="ri-check-line"></i> 24/7 Hours Support</li>
                               <li><i class="ri-check-line"></i> SEO Optimized</li>
                               <li><i class="ri-check-line"></i> Live Support</li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                       <div class="single-app-pricing-box with-border-radius">
                           <div class="title">
                               <h3>Business</h3>
                               <p>Powerful & awesome elements</p>
                           </div>
                           <div class="price">
                               $69 <span>/Month</span>
                           </div>
                           <div class="pricing-btn">
                               <a href="#" class="default-btn">Purchase Plan</a>
                           </div>
                           <ul class="features-list">
                               <li><i class="ri-check-line"></i> Up to 10 Website</li>
                               <li><i class="ri-check-line"></i> Lifetime free Support</li>
                               <li><i class="ri-check-line"></i> 10 GB Dedicated Hosting free</li>
                               <li><i class="ri-check-line"></i> 24/7 Hours Support</li>
                               <li><i class="ri-check-line"></i> SEO Optimized</li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- End App Pricing Area -->

@endsection


