@extends('layouts.admin')
@section('content')


            <div class="row">
                  
                <div class="col-md-4 grid-margin">
                    <div class="card">
                        <div class="card-body red-card">
                            <h4 class="card-title mb-0 text-white">Accumulate Balance</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0 text-white">{{ moneyFormat(get_admin_stats()['wallet_balance'], 'USD') }}</h2>
                                        
                                    </div>
                                    <small class="text-gray">Total Account Balance</small>
                                </div>
                                <!-- <div class="d-inline-block">
                                    <i class="fas fa-chart-pie text-warning icon-lg"></i>                                    
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin">
                    <div class="card">
                        <div class="card-body red-card">
                            <h4 class="card-title mb-0 text-white">Accumulate Bonus</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0 text-white">{{ moneyFormat(get_admin_stats()['bonus'], 'USD') }}</h2>
                                        <!-- <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                            <i class="far fa-clock text-muted"></i>
                                            <small class="ml-1 mb-0">Updated: now</small>
                                        </div> -->
                                    </div>
                                    <small class="text-gray">Total Bonus Earnings</small>
                                </div>
                                <!-- <div class="d-inline-block">
                                    <i class="fas fa-cube text-warning icon-lg"></i>                                    
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 grid-margin">
                    <div class="card">
                        <div class="card-body red-card">
                            <h4 class="card-title mb-0 text-white">Accumulate Referral Earnings</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0 text-white">{{ moneyFormat(get_admin_stats()['referral_bonus'], 'USD') }}</h2>
                                        <!-- <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                            <i class="far fa-clock text-muted"></i>
                                            <small class="ml-1 mb-0">Updated: now</small>
                                        </div> -->
                                    </div>
                                    <small class="text-gray">Total Referral Earnings</small>
                                </div>
                                <!-- <div class="d-inline-block">
                                    <i class="fas fa-cube text-warning icon-lg"></i>                                    
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <h5 class="card-title header-title border-bottom p-3 mb-0" style="background: #fff; color: #111; border-left: 4px solid #c32a36">Users</h5>
                            <!-- stat 1 -->
                            <div class="media px-3 py-2 border-bottom badge-light">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ $total_users }}</h4>
                                    <span class="text-muted">Total Users</span>
                                </div>
                                <i class="fa fa-users"></i>
                            </div>

                            <!-- stat 2 -->
                            <div class="media px-3 py-2 border-bottom">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ $admin_users }}</h4>
                                    <span class="text-muted">Admin Users</span>
                                </div>
                                <i class="fa fa-user-shield"></i>
                            </div>

                            <!-- stat 3 -->
                            <div class="media px-3 py-2  badge-light">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ $today_users }}</h4>
                                    <span class="text-muted">Today Users</span>
                                </div>
                                <i class="fa fa-user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <h5 class="card-title header-title border-bottom p-3 mb-0" style="background: #fff; color: #111; border-left: 4px solid #c32a36">Deposit History</h5>
                            <!-- stat 1 -->
                            <div class="media px-3 py-2 border-bottom  badge-light">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ moneyFormat($total_deposits, 'USD') }}</h4>
                                    <span class="text-muted">Total Deposits</span>
                                </div>
                                <i class="fa fa-comment-dollar"></i>
                            </div>

                            <!-- stat 2 -->
                            <div class="media px-3 py-2 border-bottom">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ moneyFormat($active_deposits, 'USD') }}</h4>
                                    <span class="text-muted">Active Deposits</span>
                                </div>
                                <i class="fa fa-comment-dollar"></i>
                            </div>

                            <!-- stat 3 -->
                            <div class="media px-3 py-2  badge-light">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ moneyFormat($last_deposit, 'USD') }}</h4>
                                    <span class="text-muted">Last Deposit</span>
                                </div>
                                <i class="fa fa-comment-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <h5 class="card-title header-title border-bottom p-3 mb-0" style="background: #fff; color: #111; border-left: 4px solid #c32a36">Withdrawal History</h5>
                            <!-- stat 1 -->
                            <div class="media px-3 py-2 border-bottom  badge-light">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ moneyFormat($total_withdrawals, 'USD') }}</h4>
                                    <span class="text-muted">Total Withdrawals</span>
                                </div>
                                <i class="fa fa-comment-dollar"></i>
                            </div>

                            <!-- stat 2 -->
                            <div class="media px-3 py-2 border-bottom">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ moneyFormat($pending_withdrawals, 'USD') }}</h4>
                                    <span class="text-muted">Pending Withdrawals</span>
                                </div>
                                <i class="fa fa-comment-dollar"></i>
                            </div>

                            <!-- stat 3 -->
                            <div class="media px-3 py-2  badge-light">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ moneyFormat($last_withdrawal, 'USD') }}</h4>
                                    <span class="text-muted">Last Withdrawal</span>
                                </div>
                                <i class="fa fa-comment-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
                
                    

                
                    
                
            <div class="row">
                @forelse($packages as $package)
                    @foreach($package->plans as $plan)

                        <div class="col-md-3 col-sm-12" style="margin-bottom: 10px;">
                          <div class="pricingTable">
                              <div class="pricingTable-header">
                                  <h3 class="title">{{ $plan->package->name }} ({{ $plan->name }})</h3>
                                  <span class="duration">{{ $plan->profit_rate }}% / {{ $plan->package->formatted_payment_period_alt }}</span>
                              </div>
                              <div class="pricing-content">
                                  <div class="price-value">
                                      <span class="amount">{{ $plan->profit_rate }}%</span>
                                  </div>
                                  <ul class="inner-content">
                                    <li class="text-black">Minimum Deposit: {{ moneyFormat($plan->min_deposit, 'USD') }}</li>
                                    <li class="text-black">Maximum Deposit: {{ moneyFormat($plan->max_deposit, 'USD') }}</li>
                                    <li class="text-black"><i class="fa fa-check"></i> Automatic Withdrawal</li>
                                    <li class="text-black"><i class="fa fa-check"></i> 24x7 Support</li>              
                                  </ul>
                                  <div class="pricingTable-signup">
                                      <a href="{{ route('deposits.invest', ['id' => $plan->id]) }}" class="pricing_action">Choose plan</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                        
                    @endforeach
                @empty
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-4">
                                No Package yet
                            </div>
                        </div>
                    </div>
                @endforelse          
            </div>








        
    
@endsection
