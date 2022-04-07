@extends('layouts.mobile')
@section('content')
         <section class="margin-t-20 unList-creatores">
                <!-- un-title-default -->
                <div class="un-title-default">
                    <div class="text">
                        <h2>Hi Michael</h2>
                        <p>Howdy! stay safe</p>
                    </div>
                </div> 
            </section>
            <section class="un-section-seller margin-t-20">
                <div class="un-block-creators margin-t-20">
                    <div class="swiper swiperCreators">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide p-2"style="background:#191970; color:#fff; margin-left:15px" >
                                <a href="page-creator-profile.html" class="un-item-seller">
                                    <div class="media-profile"  >
                                       
                                        <div class="text" >
                                            <h3 style="color:#fff">Main Wallet</h3>
                                            <p style="color:#fff">{{moneyFormat(5000,'USD')}}</p>
                                        </div>
                                         <figure class="image-avatar">
                                            <picture>
                                                <img src="{{asset('mobile/images/avatar/22.jpg')}}"  height="10" alt="">
                                            </picture>
                                        </figure>
                                    </div>
                                </a>
                            </div>

                            <!-- next one -->
                                <div class="swiper-slide p-2"style="background:#191970; color:#fff; margin-left:15px" >
                                <a href="page-creator-profile.html" class="un-item-seller">
                                    <div class="media-profile"  >
                                       
                                        <div class="text" >
                                            <h3 style="color:#fff">Savest Wallet</h3>
                                            <p style="color:#fff">{{moneyFormat(5000,'USD')}}</p>
                                        </div>
                                         <figure class="image-avatar">
                                            <picture>
                                                <img src="{{asset('mobile/images/avatar/22.jpg')}}"  height="10" alt="">
                                            </picture>
                                        </figure>
                                    </div>
                                </a>
                            </div>
                            <!-- next one -->
                            <div class="swiper-slide p-2" style="background:#191970; color:#fff">
                                <a href="page-creator-profile.html" class="un-item-seller">
                                    <div class="media-profile"  >
                                        <div class="text">
                                             <h3 style="color:#fff">SafeLock Wallet</h3>
                                            <p style="color:#fff">{{moneyFormat(5000,'USD')}}</p>
                                        </div>
                                        
                                        <figure class="image-avatar">
                                            <picture>
                                                <img src="{{asset('mobile/images/avatar/22.jpg')}}"  height="10" alt="">
                                            </picture>
                                        </figure>
                                    </div>
                                </a>
                            </div>
                            <!-- next one -->
                                 <div class="swiper-slide p-2" style="background:#191970; color:#fff">
                                <a href="page-creator-profile.html" class="un-item-seller">
                                    <div class="media-profile"  >
                                        <div class="text">
                                             <h3 style="color:#fff">Investment Wallet</h3>
                                            <p style="color:#fff">{{moneyFormat(500,'USD')}}</p>
                                        </div>
                                        
                                        <figure class="image-avatar">
                                            <picture>
                                                <img src="{{asset('mobile/images/avatar/22.jpg')}}"  height="10" alt="">
                                            </picture>
                                        </figure>
                                    </div>
                                </a>
                            </div>
                           
                            <!-- next wallet -->
                        </div>
                    </div>
                </div>
            </section>
      
            <!-- ===================================
              START THE BORDER SECTIONS
            ==================================== -->
            
            <!-- ===================================
              START THE RANDOM NFTS
            ==================================== -->
            <section class="unSwiper-cards margin-t-20">
                <!-- un-title-default -->
                <div class="un-title-default">
                    <div class="text">
                        <h2>Campaign</h2>
                        <p>Choose the best savings that suits you.</p>
                    </div>
                    <div class="un-block-right">
                        <a href="page-search-random.html" class="icon-back" aria-label="iconBtn">
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </div>
                </div>
                <div class="discover-nft-random margin-t-20">
                    <div class="content-NFTs-body">
                       
                        <!-- item-sm-card-NFTs -->
                        <a href="page-collectibles-details.html" class="item-sm-card-NFTs">
                            <div class="cover-image" style="background:blue">
                                <picture>
                                    <img class="big-image" src="{{asset('/mobile/images/bg.jpg')}}" alt="">
                                </picture>
                                <div class="content-text">
                                    <div class="btn-like-click">
                                        <div class="btnLike">
                                            <input type="checkbox">
                                            <span class="count-likes" style="font-weight:bolder">Savest Campaign</span>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="user-text">
                                    <div class="user-avatar">
                                        <picture>
                                            <img class="sm-user" src="{{asset('/mobile/images/avatar/10.jpg')}}" alt="">
                                        </picture>
                                        <span>Daily Savings</span>
                                    </div>
                                    <div class="number-eth">
                                        <span class="main-price">15% p.a</span>
                                        <span>free transfer, instant withdrawals</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                         <a href="page-collectibles-details.html" class="item-sm-card-NFTs">
                            <div class="cover-image">
                                <picture>
                                    <img class="big-image" src="{{asset('/mobile/images/pg.jpg')}}" alt="">
                                </picture>
                                <div class="content-text">
                                    <div class="btn-like-click">
                                        <div class="btnLike">
                                            <input type="checkbox">
                                            <span class="count-likes">SafeLock Campaign</span>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="user-text">
                                    <div class="user-avatar">
                                        <picture>
                                            <img class="sm-user" src="{{asset('/mobile/images/avatar/10.jpg')}}" alt="">
                                        </picture>
                                        <span>Lock Funds </span>
                                    </div>
                                    <div class="number-eth">
                                        <span class="main-price">25% p.a</span>
                                        <span>Lock Funds for certain period</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                       
                        <a href="page-collectibles-details.html" class="item-sm-card-NFTs">
                            <div class="cover-image">
                                <picture>
                                    <img class="big-image" src="{{asset('/mobile/images/pk.jpg')}}" alt="">
                                </picture>
                                <div class="content-text">
                                    <div class="btn-like-click">
                                        <div class="btnLike">
                                            <input type="checkbox">
                                            <span class="count-likes">Investify Campaign</span>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="user-text">
                                    <div class="user-avatar">
                                        <picture>
                                            <img class="sm-user" src="{{asset('/mobile/images/avatar/10.jpg')}}" alt="">
                                        </picture>
                                        <span>Invest Funds</span>
                                    </div>
                                    <div class="number-eth">
                                        <span class="main-price">profit from 8% weekly</span>
                                        <span>free transfer, instant withdrawals</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                       
                        <a href="page-collectibles-details.html" class="item-sm-card-NFTs">
                            <div class="cover-image">
                                <picture>
                                    <img class="big-image" src="{{asset('/mobile/images/mx.jpg')}}" alt="">
                                </picture>
                                <div class="content-text">
                                    <div class="btn-like-click">
                                        <div class="btnLike">
                                            <input type="checkbox">
                                            <span class="count-likes">Target Campaign</span>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="user-text">
                                    <div class="user-avatar">
                                        <picture>
                                            <img class="sm-user" src="{{asset('/mobile/images/avatar/10.jpg')}}" alt="">
                                        </picture>
                                        <span>Savings Target</span>
                                    </div>
                                    <div class="number-eth">
                                        <span class="main-price">20% p.a</span>
                                        <span>Set savings target, and strive to meet target with a period</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                       
                       
                    </div>
                </div>
            </section>
            <!-- ===================================
              START THE BEST SELLER
            ==================================== -->
            <section class="un-section-seller margin-y-20">
                <!-- un-title-default -->
                <div class="un-title-default">
                    <div class="text">
                        <h2>Martket Updates</h2>
                        <p>coins prices </p>
                    </div>
                    <div class="un-block-right">
                        <a href="page-best-seller.html" class="icon-back" aria-label="iconBtn">
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </div>
                </div>
                <!-- un-block-auther -->
                <div class="un-block-creators margin-t-20">
                    <!-- Swiper -->
                    <div class="swiper swiperCreators">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!-- un-item-seller -->
                                <a href="page-creator-profile.html" class="un-item-seller">
                                    <div class="number">
                                        01
                                    </div>
                                    <div class="media-profile">
                                        <figure class="image-avatar">
                                            <picture>
                                                <img src="{{asset('/mobile/images/avatar/22.jpg')}}" alt="">
                                            </picture>
                                            <div class="icon-verify">
                                                <i class="ri-checkbox-circle-fill"></i>
                                            </div>
                                        </figure>
                                        <div class="text">
                                            <h3>MelonPixel⚡</h3>
                                            <p>19.4 ETH</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <!-- un-item-seller -->
                                <a href="page-creator-profile.html" class="un-item-seller">
                                    <div class="number">
                                        02
                                    </div>
                                    <div class="media-profile">
                                        <figure class="image-avatar">
                                            <picture>
                                             <img src="{{asset('/mobile/images/avatar/18.jpg')}}" alt="">
                                            </picture>
                                            <div class="icon-verify">
                                                <i class="ri-checkbox-circle-fill"></i>
                                            </div>
                                        </figure>
                                        <div class="text">
                                            <h3>Camillo Ferrari</h3>
                                            <p>5.3 ETH</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </section>
            <!-- ===================================
              START THE BORDER SECTIONS
            ==================================== -->
            <div class="border-sections-home"></div>
            <!-- ===================================
              START THE CREATORES
            ==================================== -->
            <section class="margin-t-20 unList-creatores">
                <!-- un-title-default -->
                <div class="un-title-default">
                    <div class="text">
                        <h2>Transactions</h2>
                        <p>Recent Transactions</p>
                    </div>
                  
                </div>

                <div class="content-list-creatores">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="page-creator-profile.html">
                                <div class="item-user-img">
                                    <picture>
                                  <div class="text-white rounded-pill debit" style=""></div>
                                    </picture>
                                    <div class="txt-user">
                                        <h5>Withdraw made</h5>
                                        <p>Date: 22/2/2022 8:3pm</p>
                                    </div>
                                </div>
                                <div class="other-option">
                                
                                    <div class="color-text rounded-pill font-size-12" > <span class="debit_text">$2,000.00  </span><br>
                                    
                                    Bal: $3,500
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page-creator-profile.html">
                                <div class="item-user-img">
                                    <picture>
                                        <div class="text-white rounded-pill credit"></div>
                                    </picture>
                                    <div class="txt-user">
                                        <h5>Savest Withdrawal</h5>
                                        <p>$8,382.32</p>
                                    </div>
                                </div>
                                <div class="other-option">
                                <div class="color-text rounded-pill font-size-12" > <span class="credit_text">$2,000.00  </span><br>
                                    
                                    Bal: $3,500
                                    </div>

                                </div>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </section>
        </div>
@endsection
