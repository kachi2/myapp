@extends('layouts.mobile')
@section('content')
<div class="space-items"></div>

                    <div class="bg-white padding-20 ">
                        <div class="item-card-gradual shadow-sm ">
                            <div class="head-card d-flex justify-content-between align-items-center">
                                <div class="creator-name">
                                    <div class="image-user">
                                        <picture>
                                            <img class="img-avatar" src="{{asset('/mobile/images/avatar/5.png')}}" alt="">
                                        </picture>
                                    </div>
                                    <h3 style="font-weight:bolder">Savest Campaign</h3>
                                </div>
                                  <div class="btn-like-click">
                                    <div class="btnLike">
                                        <input type="checkbox">
                                        <span class="count-likes btn-primary btn text-white">28.0% P.A</span>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="page-collectibles-details.html" class="body-card py-0">
                                <div class="cover-nft">
                                    <picture>
                                        <img class="img-cover" src="{{asset('/mobile/images/other/2.jpg')}}" alt="image NFT">
                                    </picture>
                                    <div class="countdown-time" style="text-align:center; border-radius:20px; left:2px">
                                        <span >This is cash account for you to keep your funds. Receive funds, transfer and withdrawal for free</span>
                                    </div>
                                    
                                </div>
                                <div class="title-card-nft">
                                    <div class="side-one">
                                        <p style="color:green">$2.00 at (28.0% p.a)</p>
                                         <p>Interest in 21 Days</p>
                                    </div>
                                    <div class="side-other" >
                                        <span class="no-sales btn btn-outline-primary">Tranfer</span>
                                    </div>
                                </div>

                            </a>
                            <div class="footer-card">
                                <div class="starting-bad">
                                    <h4 style="color:green">$2,000.00</h4>
                                    <span>Avail Balance</span>
                                </div>
                                <button type="button"
                                    class="btn btn-md-size effect-click bg-primary text-white rounded-pill">
                                    Add Fund
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="space-items"></div>
            <section class="un-details-collectibles ">
                <!-- head -->
                <div class="head shadow ">
                    <div class="title-card-text d-flex align-items-center justify-content-between">
                        <div class="text">
                            <h1>Withdraw Fund</h1>
                            <p>Fund will be transferred to main wallet</p>
                        </div>
                        <span class="btn-xs-size bg-pink text-white ">Withdraw Now</span>
                    </div>
                    <div class="txt-price-coundown d-flex justify-content-between">
                        <div class="price">
                            <h2>Total Deposit</h2>
                            <p>$8,350 </p>
                        </div>
                        <div class="coundown">
                            <h3>Total Withdraw</h3>
                            <span>$8,350</span>
                        </div>
                    </div>
                </div>
                <!-- body -->
                <div class="space-items"></div>
                <div class="body shadow-sm">
                    <div class="description">
                        <p>
                            Transactions
                        </p>
                    </div>
                    <ul class="nav nav-pills nav-pilled-tab" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-Info-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Info" type="button" role="tab" aria-controls="pills-Info"
                                aria-selected="true">All</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-Owner-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Owner" type="button" role="tab" aria-controls="pills-Owner"
                                aria-selected="false">Deposit</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-History-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-History" type="button" role="tab" aria-controls="pills-History"
                                aria-selected="false">Withdrawal</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-Bids-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Bids" type="button" role="tab" aria-controls="pills-Bids"
                                aria-selected="false">Interest</button>
                        </li>
                    </ul>

                    <div class="tab-content content-custome-data" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-Info" role="tabpanel"
                            aria-labelledby="pills-Info-tab">
                            <ul class="nav flex-column nav-users-profile margin-t-20">
                               <li class="nav-item">
                            <a class="nav-link" href="page-creator-profile.html">
                                <div class="item-user-img">
                                    <picture>
                                  <div class="text-white rounded-pill debit" style=""></div>
                                    </picture>
                                    <div class="txt-user" >
                                        <p>Withdraw made</p>
                                        <p>Date: 22/2/2022 8:3pm</p>
                                    </div>
                                </div>
                                <div class="other-option">
                                
                                    <div class="color-text rounded-pill font-size-12" > <span class="debit_text">$2,000.00  </span><br>
                                    
                                    $3,500
                                    </div>
                                </div>
                            </a>
                        </li>
                                 <li class="nav-item">
                            <a class="nav-link" href="page-creator-profile.html">
                                <div class="item-user-img">
                                    <picture>
                                  <div class="text-white rounded-pill debit" style=""></div>
                                    </picture>
                                    <div class="txt-user">
                                        <p>Withdraw made</p>
                                        <p>Date: 22/2/2022 8:3pm</p>
                                    </div>
                                </div>
                                <div class="other-option">
                                
                                    <div class="color-text rounded-pill font-size-12" > <span class="debit_text">$2,000.00  </span><br>
                                    
                                    $3,500
                                    </div>
                                </div>
                            </a>
                        </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-Owner" role="tabpanel" aria-labelledby="pills-Owner-tab">
                            <ul class="nav flex-column nav-users-profile margin-t-20">
                                 <li class="nav-item">
                            <a class="nav-link" href="page-creator-profile.html">
                                <div class="item-user-img">
                                    <picture>
                                        <div class="text-white rounded-pill credit"></div>
                                    </picture>
                                    <div class="txt-user" style="font-weight:0px; font-size:13px">
                                        <p>Interest Payment on your savest deposit
                                        <small> (Calculated daily) </small></p>
                                        <p>Date: Tues, 2/22/2022 23:36:18</p>
                                    </div>
                                </div>
                                <div class="other-option">
                                <div class="color-text rounded-pill font-size-12" > <span class="credit_text">$2,000.00  </span><br>
                                    
                                     $3,500
                                    </div>

                                </div>
                            </a>
                        </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-History" role="tabpanel"
                            aria-labelledby="pills-History-tab">
                            <ul class="nav flex-column nav-users-profile margin-t-20">
                            <li class="nav-item">
                                <a class="nav-link" href="page-creator-profile.html">
                                    <div class="item-user-img">
                                        <picture>
                                            <div class="text-white rounded-pill credit"></div>
                                        </picture>
                                        <div class="txt-user">
                                            <p>Interest Payment on your savest deposit
                                            <small> (Calculated daily) </small></p>
                                            <p>Date: Tues, 2/22/2022 23:36:18</p>
                                        </div>
                                    </div>
                                    <div class="other-option">
                                    <div class="color-text rounded-pill font-size-12" > <span class="credit_text">$2,000.00  </span><br>
                                        
                                        $3,500
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
                                            <p>Interest Payment on your savest deposit
                                            <small> (Calculated daily) </small></p>
                                            <p>Date: Tues, 2/22/2022 23:36:18</p>
                                        </div>
                                    </div>
                                    <div class="other-option">
                                    <div class="color-text rounded-pill font-size-12" > <span class="credit_text">$2,000.00  </span><br>
                                        
                                        $3,500
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
                                            <p>Interest Payment on your savest deposit
                                            <small> (Calculated daily) </small></p>
                                            <p>Date: Tues, 2/22/2022 23:36:18</p>
                                        </div>
                                    </div>
                                    <div class="other-option">
                                    <div class="color-text rounded-pill font-size-12" > <span class="credit_text">$2,000.00  </span><br>
                                        
                                        $3,500
                                        </div>

                                    </div>
                                </a>
                            </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-Bids" role="tabpanel" aria-labelledby="pills-Bids-tab">
                            <ul class="nav flex-column nav-users-profile margin-t-20">
                            <li class="nav-item">
                                <a class="nav-link" href="page-creator-profile.html">
                                    <div class="item-user-img">
                                        <picture>
                                            <div class="text-white rounded-pill credit"></div>
                                        </picture>
                                        <div class="txt-user">
                                            <p>Interest Payment on your savest deposit
                                            <small> (Calculated daily) </small></p>
                                            <p>Date: Tues, 2/22/2022 23:36:18</p>
                                        </div>
                                    </div>
                                    <div class="other-option">
                                    <div class="color-text rounded-pill font-size-12" > <span class="credit_text">$2,000.00  </span><br>
                                        
                                        $3,500
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
                                            <p>Interest Payment on your savest deposit
                                            <small> (Calculated daily) </small></p>
                                            <p>Date: Tues, 2/22/2022 23:36:18</p>
                                        </div>
                                    </div>
                                    <div class="other-option">
                                    <div class="color-text rounded-pill font-size-12" > <span class="credit_text">$2,000.00  </span><br>
                                        
                                        $3,500
                                        </div>

                                    </div>
                                </a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- footer -->
            </section>
@endsection