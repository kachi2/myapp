@extends('layouts.mobile')
@section('content')
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
                                            <h3>MelonPixel⚡</h3>
                                            <p>19.4 ETH</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- next block -->

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
                                            <h3>MelonPixel⚡</h3>
                                            <p>19.4 ETH</p>
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
              START THE NFT SWIPER
            ==================================== -->
            <section class="unSwiper-cards margin-t-20">
                <!-- un-title-default -->
                <div class="un-title-default">
                    <div class="text">
                        <h2>Discover</h2>
                        <p>Be on the lookout for the latest NFTs</p>
                    </div>
                    <div class="un-block-right">
                        <a href="page-search-grid.html" class="icon-back" aria-label="iconBtn">
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </div>
                </div>
                <div class="content-cards-NFTs margin-t-20">
                    <div class="swiper cardGradual">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!-- item-card-gradual -->
                                <div class="item-card-gradual">
                                    <!-- <div class="head-card"></div> -->
                                    <a href="page-collectibles-details.html" class="body-card">
                                        <div class="cover-nft">
                                            <picture>
                                                <img class="img-cover" src="{{asset('mobile/images/other/26.jpg')}}" alt="image NFT">
                                            </picture>
                                            <div class="icon-type">
                                                <i class="ri-vidicon-line"></i>
                                            </div>
                                            <div class="countdown-time">
                                                <span>08H 38M 16S</span>
                                            </div>
                                        </div>
                                        <div class="title-card-nft">
                                            <div class="side-one">
                                                <h2>The Dark Corner</h2>
                                                <p>8 Editions Minted</p>
                                            </div>
                                            <div class="side-other">
                                                <span class="no-sales">3 for sale</span>
                                            </div>
                                        </div>
                                        <div class="creator-name">
                                            <div class="image-user">
                                                <picture>
                                                    <img class="img-avatar" src="{{asset('mobile/images/avatar/14.jpg')}}" alt="">
                                                </picture>
                                                <div class="icon">
                                                    <i class="ri-checkbox-circle-fill"></i>
                                                </div>
                                            </div>
                                            <h3>Settimio Loggia</h3>
                                        </div>
                                    </a>
                                    <div class="footer-card">
                                        <div class="starting-bad">
                                            <h4>2.78 ETH</h4>
                                            <span>Starting Bid</span>
                                        </div>
                                        <div class="btn-like-click">
                                            <div class="btnLike">
                                                <input type="checkbox">
                                                <span class="count-likes">195</span>
                                                <i class="ri-heart-3-line"></i>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <!-- item-card-gradual -->
                                <div class="item-card-gradual">
                                    <!-- <div class="head-card"></div> -->
                                    <a href="page-collectibles-details.html" class="body-card">
                                        <div class="cover-nft">
                                            <picture>
                                                <img class="img-cover" src="{{asset('mobile/images/other/14.jpg')}}" alt="image NFT">
                                            </picture>
                                            <div class="countdown-time">
                                                <span>08H 38M 16S</span>
                                            </div>
                                        </div>
                                        <div class="title-card-nft">
                                            <div class="side-one">
                                                <h2>Galaxy on Earth</h2>
                                                <p>6 Editions Minted</p>
                                            </div>
                                            <div class="side-other">
                                                <span class="no-sales">2 for sale</span>
                                            </div>
                                        </div>
                                        <div class="creator-name">
                                            <div class="image-user">
                                                <picture>
                                                    <img class="img-avatar" src="{{asset('mobile/images/avatar/21.jpg')}}" alt="">
                                                </picture>
                                                <div class="icon">
                                                    <i class="ri-checkbox-circle-fill"></i>
                                                </div>
                                            </div>
                                            <h3>Leda Beneventi</h3>
                                        </div>
                                    </a>
                                    <div class="footer-card">
                                        <div class="starting-bad">
                                            <h4>2.40 ETH</h4>
                                            <span>Starting Bid</span>
                                        </div>
                                        <div class="btn-like-click">
                                            <div class="btnLike">
                                                <input type="checkbox" checked>
                                                <span class="count-likes">164</span>
                                                <i class="ri-heart-3-line"></i>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <!-- item-card-gradual -->
                                <div class="item-card-gradual">
                                    <!-- <div class="head-card"></div> -->
                                    <a href="page-collectibles-details.html" class="body-card">
                                        <div class="cover-nft">
                                            <picture>
                                                <img class="img-cover" src="{{asset('mobile/images/other/27.jpg')}}" alt="image NFT">
                                            </picture>
                                            <div class="countdown-time">
                                                <span>08H 38M 16S</span>
                                            </div>
                                        </div>
                                        <div class="title-card-nft">
                                            <div class="side-one">
                                                <h2>The Scary Shib</h2>
                                                <p>8 Editions Minted</p>
                                            </div>
                                            <div class="side-other">
                                                <span class="no-sales">3 for sale</span>
                                            </div>
                                        </div>
                                        <div class="creator-name">
                                            <div class="image-user">
                                                <picture>
                                                    <img class="img-avatar" src="{{asset('mobile/images/avatar/13.jpg')}}" alt="">
                                                </picture>
                                                <div class="icon">
                                                    <i class="ri-checkbox-circle-fill"></i>
                                                </div>
                                            </div>
                                            <h3>Bruce Wheless</h3>
                                        </div>
                                    </a>
                                    <div class="footer-card">
                                        <div class="starting-bad">
                                            <h4>1.27 ETH</h4>
                                            <span>Starting Bid</span>
                                        </div>
                                        <div class="btn-like-click">
                                            <div class="btnLike">
                                                <input type="checkbox">
                                                <span class="count-likes">95</span>
                                                <i class="ri-heart-3-line"></i>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <!-- item-card-gradual -->
                                <div class="item-card-gradual">
                                    <!-- <div class="head-card"></div> -->
                                    <a href="page-collectibles-details.html" class="body-card">
                                        <div class="cover-nft">
                                            <picture>
                                                <img class="img-cover" src="{{asset('mobile/images/other/16.jpg')}}" alt="image NFT">
                                            </picture>
                                            <div class="icon-type">
                                                <i class="ri-vidicon-line"></i>
                                            </div>

                                        </div>
                                        <div class="title-card-nft">
                                            <div class="side-one">
                                                <h2>The Dark Corner</h2>
                                                <p>25 Editions Minted</p>
                                            </div>
                                            <div class="side-other">
                                                <span class="no-sales">5 for sale</span>
                                            </div>
                                        </div>
                                        <div class="creator-name">
                                            <div class="image-user">
                                                <picture>
                                                    <img class="img-avatar" src="{{asset('mobile/images/avatar/17.jpg')}}" alt="">
                                                </picture>
                                                <div class="icon">
                                                    <i class="ri-checkbox-circle-fill"></i>
                                                </div>
                                            </div>
                                            <h3>Steve Jones</h3>
                                        </div>
                                    </a>
                                    <div class="footer-card">
                                        <div class="starting-bad">
                                            <h4>1.29 ETH</h4>
                                            <span>Starting Bid</span>
                                        </div>
                                        <div class="btn-like-click">
                                            <div class="btnLike">
                                                <input type="checkbox">
                                                <span class="count-likes">195</span>
                                                <i class="ri-heart-3-line"></i>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <!-- item-card-gradual -->
                                <div class="item-card-gradual">
                                    <!-- <div class="head-card"></div> -->
                                    <a href="page-collectibles-details.html" class="body-card">
                                        <div class="cover-nft">
                                            <picture>
                                                <img class="img-cover" src="{{asset('mobile/images/other/21.jpg')}}" alt="image NFT">
                                            </picture>
                                            <div class="countdown-time">
                                                <span>08H 38M 16S</span>
                                            </div>
                                        </div>
                                        <div class="title-card-nft">
                                            <div class="side-one">
                                                <h2>Ecstasy of the Dead</h2>
                                                <p>350 Editions Minted</p>
                                            </div>
                                            <div class="side-other">
                                                <span class="no-sales">9 for sale</span>
                                            </div>
                                        </div>
                                        <div class="creator-name">
                                            <div class="image-user">
                                                <picture>
                                                    <img class="img-avatar" src="{{asset('mobile/images/avatar/19.jpg')}}" alt="">
                                                </picture>
                                                <div class="icon">
                                                    <i class="ri-checkbox-circle-fill"></i>
                                                </div>
                                            </div>
                                            <h3>Hunter Taylor</h3>
                                        </div>
                                    </a>
                                    <div class="footer-card">
                                        <div class="starting-bad">
                                            <h4>1.79 ETH</h4>
                                            <span>Starting Bid</span>
                                        </div>
                                        <div class="btn-like-click">
                                            <div class="btnLike">
                                                <input type="checkbox">
                                                <span class="count-likes">297</span>
                                                <i class="ri-heart-3-line"></i>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <!-- item-card-gradual -->
                                <div class="item-card-gradual">
                                    <!-- <div class="head-card"></div> -->
                                    <a href="page-collectibles-details.html" class="body-card">
                                        <div class="cover-nft">
                                            <picture>
                                                <img class="img-cover" src="{{asset('mobile/images/other/6.jpg')}}" alt="image NFT">
                                            </picture>
                                            <div class="icon-type">
                                                <i class="ri-vidicon-line"></i>
                                            </div>
                                            <div class="countdown-time">
                                                <span>08H 38M 16S</span>
                                            </div>
                                        </div>
                                        <div class="title-card-nft">
                                            <div class="side-one">
                                                <h2>The Moon Boi</h2>
                                                <p>14 Editions Minted</p>
                                            </div>
                                            <div class="side-other">
                                                <span class="no-sales">2 for sale</span>
                                            </div>
                                        </div>
                                        <div class="creator-name">
                                            <div class="image-user">
                                                <picture>
                                                    <img class="img-avatar" src="{{asset('mobile/images/avatar/18.jpg')}}" alt="">
                                                </picture>
                                                <div class="icon">
                                                    <i class="ri-checkbox-circle-fill"></i>
                                                </div>
                                            </div>
                                            <h3>Craig Leach</h3>
                                        </div>
                                    </a>
                                    <div class="footer-card">
                                        <div class="starting-bad">
                                            <h4>2.78 ETH</h4>
                                            <span>Starting Bid</span>
                                        </div>
                                        <div class="btn-like-click">
                                            <div class="btnLike">
                                                <input type="checkbox">
                                                <span class="count-likes">195</span>
                                                <i class="ri-heart-3-line"></i>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </section>
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
                                        <img class="avt-img" src="{{asset('mobile/images/avatar/13.jpg')}}" alt="">
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
                                        <img class="avt-img" src="{{asset('mobile/images/avatar/7.jpg')}}" alt="">
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
                                        <img class="avt-img" src="{{asset('mobile/images/avatar/4.jpg')}}" alt="">
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
                                        <img class="avt-img" src="{{asset('mobile/images/avatar/1.jpg')}}" alt="user">
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
