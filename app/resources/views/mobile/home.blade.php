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
                            <h3>{{ moneyFormat(auth()->user()->wallet->amount, 'USD') }}</h3>
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
                                    <h3>{{ moneyFormat(auth()->user()->wallet->bonus, 'USD')}}</h3>
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
                        <h2>Recent Investment</h2>
                    </div>
                    @forelse ($investment as $invst )
                    <div class="transaction-card mb-15">
                        <a href="transaction-details.html">
                            <div class="transaction-card-info">
                                <div class="transaction-info-thumb">
                                    <span class="text-white">{{substr($invst->plan->name,0,2)}}</span>
                                </div>
                                <div class="transaction-info-text">
                                    <h3>{{$invst->plan->name}} - <small>Daily {{$invst->profit_rate}}% </small></h3>
                                    <p> {{$invst->duration}} Days |  <small><span class="btn-primary p-1 btn-sm">Active</span> </small></p>
                                </div>
                            </div>
                            <div class="transaction-card-det ">
                                <span class="positive-number">{{moneyFormat($invst->paid_amount, 'USD')}}</span><br> 
                               <small class="negative-number">{{moneyFormat($invst->amount, 'USD')}}<small>
                            </div>
                        </a>
                    </div>
                    @empty
                    @endforelse
                </div>
               
                <!-- Send-money-section -->
                <!-- Saving-goals-section -->
               
            
                <!-- Latest-news-section -->
            </div>
        </div>
        <!-- Body-content -->
    @endsection