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
                            <div class="swiper-slide p-2"style="background:#000; color:#fff; margin-left:15px" >
                                <a href="page-creator-profile.html" class="un-item-seller">
                                    <div class="media-profile"  >
                                        <figure class="image-avatar">
                                            <picture>
                                                <img src="{{asset('mobile/images/avatar/22.jpg')}}"  height="20" alt="">
                                            </picture>
                                        </figure>
                                        <div class="text" >
                                            <h3 style="color:#fff">Savest Wallet⚡</h3>
                                            <p style="color:#fff">{{moneyFormat(5000,'USD')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- next one -->

                                 <div class="swiper-slide p-2" style="background:#000; color:#fff">
                                <a href="page-creator-profile.html" class="un-item-seller">
                                    <div class="media-profile"  >
                                        <figure class="image-avatar">
                                            <picture>
                                                <img src="{{asset('mobile/images/avatar/22.jpg')}}"  height="20" alt="">
                                            </picture>
                                            <div class="icon-verify">
                                                <i class="ri-checkbox-circle-fill"></i>
                                            </div>
                                        </figure>
                                        <div class="text">
                                             <h3 style="color:#fff">Investment Wallet⚡</h3>
                                            <p style="color:#fff">{{moneyFormat(500,'USD')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide p-2" style="background:#000; color:#fff">
                                <a href="page-creator-profile.html" class="un-item-seller">
                                    <div class="media-profile"  >
                                        <figure class="image-avatar">
                                            <picture>
                                                <img src="{{asset('mobile/images/avatar/22.jpg')}}"  height="20" alt="">
                                            </picture>
                                            <div class="icon-verify">
                                                <i class="ri-checkbox-circle-fill"></i>
                                            </div>
                                        </figure>
                                        <div class="text">
                                             <h3 style="color:#fff">SafeLock Wallet⚡</h3>
                                            <p style="color:#fff">{{moneyFormat(5000,'USD')}}</p>
                                        </div>
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
                            <div class="cover-image">
                                <picture>
                                    <img class="big-image" src="{{asset('/mobile/images/other/30.jpg')}}" alt="">
                                </picture>
                                <div class="content-text">
                                    <div class="btn-like-click">
                                        <div class="btnLike">
                                            <input type="checkbox">
                                            <span class="count-likes">Savest Campaign</span>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="user-text">
                                    <div class="user-avatar">
                                        <picture>
                                            <img class="sm-user" src="{{asset('/mobile/images/avatar/10.jpg')}}" alt="">
                                        </picture>
                                        <span>Savest savings</span>
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
                                    <img class="big-image" src="{{asset('/mobile/images/other/30.jpg')}}" alt="">
                                </picture>
                                <div class="content-text">
                                    <div class="btn-like-click">
                                        <div class="btnLike">
                                            <input type="checkbox">
                                            <span class="count-likes">Savest Campaign</span>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="user-text">
                                    <div class="user-avatar">
                                        <picture>
                                            <img class="sm-user" src="{{asset('/mobile/images/avatar/10.jpg')}}" alt="">
                                        </picture>
                                        <span>Savest savings</span>
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
                                    <img class="big-image" src="{{asset('/mobile/images/other/30.jpg')}}" alt="">
                                </picture>
                                <div class="content-text">
                                    <div class="btn-like-click">
                                        <div class="btnLike">
                                            <input type="checkbox">
                                            <span class="count-likes">Savest Campaign</span>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="user-text">
                                    <div class="user-avatar">
                                        <picture>
                                            <img class="sm-user" src="{{asset('/mobile/images/avatar/10.jpg')}}" alt="">
                                        </picture>
                                        <span>Savest savings</span>
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
                                    <img class="big-image" src="{{asset('/mobile/images/other/30.jpg')}}" alt="">
                                </picture>
                                <div class="content-text">
                                    <div class="btn-like-click">
                                        <div class="btnLike">
                                            <input type="checkbox">
                                            <span class="count-likes">Savest Campaign</span>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="user-text">
                                    <div class="user-avatar">
                                        <picture>
                                            <img class="sm-user" src="{{asset('/mobile/images/avatar/10.jpg')}}" alt="">
                                        </picture>
                                        <span>Savest savings</span>
                                    </div>
                                    <div class="number-eth">
                                        <span class="main-price">15% p.a</span>
                                        <span>free transfer, instant withdrawals</span>
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
                        <h2>Best Sellers</h2>
                        <p>Best seller of this week's NFTs</p>
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
                                                <source srcset="images/avatar/22.webp" type="image/webp">
                                                <img src="images/avatar/22.jpg" alt="">
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
                                                <source srcset="images/avatar/18.webp" type="image/webp">
                                                <img src="images/avatar/18.jpg" alt="">
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
                            <div class="swiper-slide">
                                <!-- un-item-seller -->
                                <a href="page-creator-profile.html" class="un-item-seller">
                                    <div class="number">
                                        03
                                    </div>
                                    <div class="media-profile">
                                        <figure class="image-avatar">
                                            <picture>
                                                <source srcset="images/avatar/14.webp" type="image/webp">
                                                <img src="images/avatar/14.jpg" alt="">
                                            </picture>
                                            <div class="icon-verify">
                                                <i class="ri-checkbox-circle-fill"></i>
                                            </div>
                                        </figure>
                                        <div class="text">
                                            <h3>🚀 Pingu</h3>
                                            <p>3.9 ETH</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <!-- un-item-seller -->
                                <a href="page-creator-profile.html" class="un-item-seller">
                                    <div class="number">
                                        04
                                    </div>
                                    <div class="media-profile">
                                        <figure class="image-avatar">
                                            <picture>
                                                <source srcset="images/avatar/5.webp" type="image/webp">
                                                <img src="images/avatar/5.png" alt="">
                                            </picture>
                                            <div class="icon-verify">
                                                <i class="ri-checkbox-circle-fill"></i>
                                            </div>
                                        </figure>
                                        <div class="text">
                                            <h3>Julian Co.</h3>
                                            <p>2.8 ETH</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <!-- un-item-seller -->
                                <a href="page-creator-profile.html" class="un-item-seller">
                                    <div class="number">
                                        05
                                    </div>
                                    <div class="media-profile">
                                        <figure class="image-avatar">
                                            <picture>
                                                <source srcset="images/avatar/13.webp" type="image/webp">
                                                <img src="images/avatar/13.jpg" alt="">
                                            </picture>
                                            <div class="icon-verify">
                                                <i class="ri-checkbox-circle-fill"></i>
                                            </div>
                                        </figure>
                                        <div class="text">
                                            <h3>Tito_Calab</h3>
                                            <p>2.7 ETH</p>
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
                        <h2>Creators</h2>
                        <p>You can follow many Creators</p>
                    </div>
                    <div class="un-block-right">
                        <a href="page-creators.html" class="icon-back" aria-label="iconBtn">
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </div>
                </div>

                <div class="content-list-creatores">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="page-creator-profile.html">
                                <div class="item-user-img">
                                    <picture>
                                        <source srcset="images/avatar/13.webp" type="image/webp">
                                        <img class="avt-img" src="images/avatar/13.jpg" alt="">
                                    </picture>
                                    <div class="txt-user">
                                        <h5>Richard Noga</h5>
                                        <p>$9,500.32</p>
                                    </div>
                                </div>
                                <div class="other-option">
                                    <div class="color-text rounded-pill bg-snow btn-xs-size">44 Item</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page-creator-profile.html">
                                <div class="item-user-img">
                                    <picture>
                                        <source srcset="images/avatar/7.webp" type="image/webp">
                                        <img class="avt-img" src="images/avatar/7.jpg" alt="">
                                    </picture>
                                    <div class="txt-user">
                                        <h5>Tito_Calab</h5>
                                        <p>$8,382.32</p>
                                    </div>
                                </div>
                                <div class="other-option">
                                    <div class="color-text rounded-pill bg-snow btn-xs-size">37 Item</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page-creator-profile.html">
                                <div class="item-user-img">
                                    <picture>
                                        <source srcset="images/avatar/4.webp" type="image/webp">
                                        <img class="avt-img" src="images/avatar/4.jpg" alt="">
                                    </picture>
                                    <div class="txt-user">
                                        <h5>Settimio Loggia</h5>
                                        <p>$6,920.00</p>
                                    </div>
                                </div>
                                <div class="other-option">
                                    <div class="color-text rounded-pill bg-snow btn-xs-size">30 Item</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page-creator-profile.html">
                                <div class="item-user-img">
                                    <picture>
                                        <source srcset="images/avatar/1.webp" type="image/webp">
                                        <img class="avt-img" src="images/avatar/1.jpg" alt="user">
                                    </picture>
                                    <div class="txt-user">
                                        <h5>Vinicius O.</h5>
                                        <p>$4,500.32</p>
                                    </div>
                                </div>
                                <div class="other-option">
                                    <div class="color-text rounded-pill bg-snow btn-xs-size">20 Item</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
@endsection
