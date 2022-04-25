  <!-- Body-content -->
  @extends('layouts.mobile')
  @section('content')
        <div class="body-content body-content-lg"> <!-- "body-content-lg" add this class if any cards inside this div has "section-to-header" class -->
            <div class="container">
                <!-- Add-card -->
                <div class="add-card section-to-header mb-30">
                    <div class="add-card-inner">
                        <div class="add-card-item add-card-info">
                            <p>Main Wallet</p>
                            <h3>$1,450.50</h3>
                        </div>
                        <div class="add-card-item add-balance" data-bs-toggle="modal" data-bs-target="#addBalance">
                            <a href="#"><i class="flaticon-plus"></i></a>
                            <p>Add Fund</p>
                        </div>
                    </div>
                </div>
                <!-- Add-card -->
                <!-- Option-section -->
                <div class="option-section mb-15">
                    <div class="row gx-3">
                        <div class="col pb-15">
                            <div class="option-card option-card-violet">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#withdraw">
                                    <div class="option-card-icon">
                                        <i class="flaticon-down-arrow"></i>
                                    </div>
                                    <p>Withdraw</p>
                                </a>
                            </div>
                        </div>
                        <div class="col pb-15">
                            <div class="option-card option-card-yellow">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#sendMoney">
                                    <div class="option-card-icon">
                                        <i class="flaticon-right-arrow"></i>
                                    </div>
                                    <p>Send</p>
                                </a>
                            </div>
                        </div>
                        <div class="col pb-15">
                            <div class="option-card option-card-blue">
                                <a href="my-cards.html">
                                    <div class="option-card-icon">
                                        <i class="flaticon-credit-card"></i>
                                    </div>
                                    <p>Deposit</p>
                                </a>
                            </div>
                        </div>
                        <div class="col pb-15">
                            <div class="option-card option-card-red">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exchange">
                                    <div class="option-card-icon">
                                        <i class="flaticon-exchange-arrows"></i>
                                    </div>
                                    <p>Earn</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Option-section -->
                <!-- Feature-section -->
                <div class="feature-section mb-15">
                    <div class="row gx-3">
                        <div class="col col-sm-6 pb-15">
                            <div class="feature-card feature-card-red">
                                <div class="feature-card-thumb">
                                    <i class="flaticon-income"></i>
                                </div>
                                <div class="feature-card-details">
                                    <p>Profits</p>
                                    <h3>$485.50</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col col-sm-6 pb-15">
                            <div class="feature-card feature-card-blue">
                                <div class="feature-card-thumb">
                                    <i class="flaticon-expenses"></i>
                                </div>
                                <div class="feature-card-details">
                                    <p>Bonus</p>
                                    <h3>$95.50</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col col-sm-6 pb-15">
                            <div class="feature-card feature-card-violet">
                                <div class="feature-card-thumb">
                                    <i class="flaticon-invoice"></i>
                                </div>
                                <div class="feature-card-details">
                                    <p>Referal Income</p>
                                    <h3>$75.00</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col col-sm-6 pb-15">
                            <div class="feature-card feature-card-green">
                                <div class="feature-card-thumb">
                                    <i class="flaticon-savings"></i>
                                </div>
                                <div class="feature-card-details">
                                    <p>Investments</p>
                                    <h3>$285.00</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Feature-section -->
                <!-- Transaction-section -->
                <div class="transaction-section pb-15">
                    <div class="section-header">
                        <h2>Transactions</h2>
                    </div>
                    <div class="transaction-card mb-15">
                        <a href="transaction-details.html">
                            <div class="transaction-card-info">
                                <div class="transaction-info-thumb">
                                    <img src="assets/images/user-2.jpg" alt="user">
                                </div>
                                <div class="transaction-info-text">
                                    <h3>Brenda Davis</h3>
                                    <p>Transfer</p>
                                </div>
                            </div>
                            <div class="transaction-card-det negative-number">
                                -$185.00
                            </div>
                        </a>
                    </div>
                    <div class="transaction-card mb-15">
                        <a href="transaction-details.html">
                            <div class="transaction-card-info">
                                <div class="transaction-info-thumb">
                                    <img src="assets/images/user-cm-logo-1.png" alt="user">
                                </div>
                                <div class="transaction-info-text">
                                    <h3>Appstore Purchase</h3>
                                    <p>App Purchase</p>
                                </div>
                            </div>
                            <div class="transaction-card-det">
                                -$159.99
                            </div>
                        </a>
                    </div>
                    <div class="transaction-card mb-15">
                        <a href="transaction-details.html">
                            <div class="transaction-card-info">
                                <div class="transaction-info-thumb">
                                    <img src="assets/images/user-1.jpg" alt="user">
                                </div>
                                <div class="transaction-info-text">
                                    <h3>Martin Neely</h3>
                                    <p>Transfer</p>
                                </div>
                            </div>
                            <div class="transaction-card-det">
                                +$170.00
                            </div>
                        </a>
                    </div>
                    <div class="transaction-card mb-15">
                        <a href="transaction-details.html">
                            <div class="transaction-card-info">
                                <div class="transaction-info-thumb">
                                    <img src="assets/images/user-3.jpg" alt="user">
                                </div>
                                <div class="transaction-info-text">
                                    <h3>Mary McMillian</h3>
                                    <p>Transfer</p>
                                </div>
                            </div>
                            <div class="transaction-card-det">
                                +$2573.00
                            </div>
                        </a>
                    </div>
                </div>
               
                <!-- Send-money-section -->
                <!-- Saving-goals-section -->
                <div class="saving-goals-section pb-15">
                    <div class="section-header">
                        <h2>Top Investment Plan</h2>
                    </div>
                    <div class="progress-card progress-card-red mb-15">
                        <div class="progress-card-info">
                            <div class="circular-progress" data-note="50.85">
                                <svg width="55" height="55" class="circle-svg">
                                    <circle cx="28" cy="27" r="25" class="circle-progress circle-progress-path"></circle>
                                    <circle cx="28" cy="27" r="25" class="circle-progress circle-progress-fill"></circle>
                                </svg>
                                <div class="percent">
                                    <span class="percent-int">0</span>%
                                </div>
                            </div>
                            <div class="progress-info-text">
                                <h3>New Gadget</h3>
                                <p>Lifestyle</p>
                            </div>
                        </div>
                        <div class="progress-card-amount">$250.00</div>
                    </div>
                    <div class="progress-card progress-card-blue mb-15">
                        <div class="progress-card-info">
                            <div class="circular-progress" data-note="25">
                                <svg width="55" height="55" class="circle-svg">
                                    <circle cx="28" cy="27" r="25" class="circle-progress circle-progress-path"></circle>
                                    <circle cx="28" cy="27" r="25" class="circle-progress circle-progress-fill"></circle>
                                </svg>
                                <div class="percent">
                                    <span class="percent-int">0</span>%
                                </div>
                            </div>
                            <div class="progress-info-text">
                                <h3>New Apartment</h3>
                                <p>Living</p>
                            </div>
                        </div>
                        <div class="progress-card-amount">$5000.00</div>
                    </div>
                    <div class="progress-card progress-card-green mb-15">
                        <div class="progress-card-info">
                            <div class="circular-progress" data-note="75">
                                <svg width="55" height="55" class="circle-svg">
                                    <circle cx="28" cy="27" r="25" class="circle-progress circle-progress-path"></circle>
                                    <circle cx="28" cy="27" r="25" class="circle-progress circle-progress-fill"></circle>
                                </svg>
                                <div class="percent">
                                    <span class="percent-int">0</span>%
                                </div>
                            </div>
                            <div class="progress-info-text">
                                <h3>Education</h3>
                                <p>Lifestyle</p>
                            </div>
                        </div>
                        <div class="progress-card-amount">$1250.00</div>
                    </div>
                </div>
            
                <!-- Latest-news-section -->
            </div>
        </div>
        <!-- Body-content -->
    @endsection