@extends('layouts.admin')
@section('content')



<div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head">
                                <div class="nk-block-head-sub"><span>Admin</span> </div><!-- .nk-block-head-sub -->
                                <div class="nk-block-between-md g-4">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title fw-normal">Admin Dashboard</h4>
                                        <div class="nk-block-des">
                                            <p>Here is the list of your assets / wallets!</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content">
                                        
                                    </div>
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="nk-block-head-sm">
                                    <div class="nk-block-head-content">
                                    </div>
                                </div>
                                <div class="row g-gs">
                                    <div class="col-sm-4 col-lg-4 col-xl-4 col-xxl-4">
                                        <div class="card card-bordered is-dark">
                                            <div class="nk-wgw">
                                                <div class="nk-wgw-inner">
                                                    <a class="nk-wgw-name" href="#">
                                                        <div class="nk-wgw-icon ">
                                                            <em class="icon ni ni-sign-usd"></em>
                                                        </div>
                                                        <h5 class="nk-wgw-title title">Accumulated Balance</h5>
                                                    </a>
                                                    <div class="nk-wgw-balance">
                                                        <div class="amount">{{ moneyFormat(get_admin_stats()['wallet_balance'], 'USD') }}</div>
                                                      
                                                    </div>
                                                </div>
                                                <div class="nk-wgw-actions">
                                                    <ul>
                                                        <li><a href="#"><em class="icon ni ni-arrow-up-right"></em> <span>Total Account Balance</span></a></li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div><!-- .card -->
                                    </div>
                                    
                                     <div class="col-sm-4 col-lg-4 col-xl-4 col-xxl-4">
                                        <div class="card card-bordered is-dark">
                                            <div class="nk-wgw">
                                                <div class="nk-wgw-inner">
                                                    <a class="nk-wgw-name" href="#">
                                                        <div class="nk-wgw-icon ">
                                                            <em class="icon ni ni-sign-usd"></em>
                                                        </div>
                                                        <h5 class="nk-wgw-title title">Accumulate Bonus</h5>
                                                    </a>
                                                    <div class="nk-wgw-balance">
                                                        <div class="amount">{{ moneyFormat(get_admin_stats()['bonus'], 'USD') }}</div>
                                                      
                                                    </div>
                                                </div>
                                                <div class="nk-wgw-actions">
                                                    <ul>
                                                        <li><a href="#"><em class="icon ni ni-arrow-up-right"></em> <span>Total Bonus Balance</span></a></li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div><!-- .card -->
                                    </div>
                                    
                                     <div class="col-sm-4 col-lg-4 col-xl-4 col-xxl-4">
                                        <div class="card card-bordered is-dark">
                                            <div class="nk-wgw">
                                                <div class="nk-wgw-inner">
                                                    <a class="nk-wgw-name" href="#">
                                                        <div class="nk-wgw-icon ">
                                                            <em class="icon ni ni-sign-usd"></em>
                                                        </div>
                                                        <h5 class="nk-wgw-title title">Accumulate Referral Earnings</h5>
                                                    </a>
                                                    <div class="nk-wgw-balance">
                                                        <div class="amount">{{ moneyFormat(get_admin_stats()['referral_bonus'], 'USD') }}</div>
                                                     
                                                    </div>
                                                </div>
                                                <div class="nk-wgw-actions">
                                                    <ul>
                                                        <li><a href="#"><em class="icon ni ni-arrow-up-right"></em> <span>Total Referrals Earnings</span></a></li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div><!-- .card -->
                                    </div>
                                    
                                    <!-- .col -->
                                  <!-- .col -->
                                </div><!-- .row -->
                            </div>
                         <div class="nk-block nk-block-lg">
                                <div class="row gy-gs">
                                    <div class="col-md-4">
                                        <div class="card-head">
                                           <div class="card-title  mb-0">
                                                <h5 class="title">Users</h5>
                                            </div>
                                        </div><!-- .card-head -->
                                        <div class="tranx-list card card-bordered">
                                            <div class="tranx-item">
                                                <div class="tranx-col">
                                                    <div class="tranx-info">
                                                        <div class="tranx-data">
                                                            <div class="tranx-label">Total Users</div>
                                                            <div class="tranx-date">{{ $total_users }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tranx-col">
                                                    <div class="tranx-amount">
                                                        <div class="number">{{ $total_users }}</div>
                                                    </div>
                                                </div>
                                            </div><!-- .tranx-item -->
                                            <div class="tranx-item">
                                                <div class="tranx-col">
                                                    <div class="tranx-info">
                                                        <div class="tranx-data">
                                                            <div class="tranx-label">Total Admin <span class="tranx-icon sm"><img src="./images/coins/eth.svg" alt=""></span></div>
                                                            <div class="tranx-date">{{ $admin_users }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tranx-col">
                                                    <div class="tranx-amount">
                                                        <div class="number">{{ $admin_users }}</div>   
                                                    </div>
                                                </div>
                                            </div><!-- .tranx-item -->
                                            <div class="tranx-item">
                                                <div class="tranx-col">
                                                    <div class="tranx-info">
                                                        <div class="tranx-data">
                                                            <div class="tranx-label">Today Users </div>
                                                            <div class="tranx-date">{{ $today_users }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tranx-col">
                                                    <div class="tranx-amount">
                                                        <div class="number">{{ $today_users }}</div>
                                                    </div>
                                                </div>
                                            </div><!-- .tranx-item -->
                                            <!-- .tranx-item -->
                                        </div><!-- .tranx-list -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-head">
                                            <div class="card-title  mb-0">
                                                <h5 class="title">Deposit History</h5>
                                            </div>
                                        </div><!-- .card-head -->
                                        <div class="tranx-list card card-bordered">
                                            <div class="tranx-item">
                                                <div class="tranx-col">
                                                    <div class="tranx-info">
                                                        <div class="tranx-data">
                                                            <div class="tranx-label">Total Deposits</div>
                                                            <div class="tranx-date">{{ moneyFormat($total_deposits, 'USD') }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tranx-col">
                                                    <div class="tranx-amount">
                                                        <div class="number">{{ moneyFormat($total_deposits, 'USD') }}</div>
                                                    </div>
                                                </div>
                                            </div><!-- .tranx-item -->
                                            <div class="tranx-item">
                                                <div class="tranx-col">
                                                    <div class="tranx-info">
                                                        <div class="tranx-data">
                                                            <div class="tranx-label">Active Deposits<span class="tranx-icon sm"><img src="./images/coins/eth.svg" alt=""></span></div>
                                                            <div class="tranx-date">{{ moneyFormat($active_deposits, 'USD') }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tranx-col">
                                                    <div class="tranx-amount">
                                                        <div class="number">{{ moneyFormat($active_deposits, 'USD') }}</div>
                                                      
                                                    </div>
                                                </div>
                                            </div><!-- .tranx-item -->
                                            <div class="tranx-item">
                                                <div class="tranx-col">
                                                    <div class="tranx-info">
                                                        <div class="tranx-data">
                                                            <div class="tranx-label">Last Deposits </div>
                                                            <div class="tranx-date">{{ moneyFormat($last_deposit, 'USD') }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tranx-col">
                                                    <div class="tranx-amount">
                                                        <div class="number">{{ moneyFormat($last_deposit, 'USD') }} </div>
                                                    </div>
                                                </div>
                                            </div><!-- .tranx-item -->
                                            <!-- .tranx-item -->
                                        </div><!-- .tranx-list -->
                                    </div>
                                     <div class="col-md-4">
                                        <div class="card-head">
                                            <div class="card-title  mb-0">
                                                <h5 class="title">Withdrawal History</h5>
                                            </div>
                                        </div><!-- .card-head -->
                                        <div class="tranx-list card card-bordered">
                                            <div class="tranx-item">
                                                <div class="tranx-col">
                                                    <div class="tranx-info">
                                                        <div class="tranx-data">
                                                            <div class="tranx-label">Total Withdrawal</div>
                                                            <div class="tranx-date">{{ moneyFormat($total_withdrawals, 'USD') }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tranx-col">
                                                    <div class="tranx-amount">
                                                        <div class="number">{{ moneyFormat($total_withdrawals, 'USD') }}</div>
                                                    </div>
                                                </div>
                                            </div><!-- .tranx-item -->
                                            <div class="tranx-item">
                                                <div class="tranx-col">
                                                    <div class="tranx-info">
                                                        <div class="tranx-data">
                                                            <div class="tranx-label">Pending Withdrawal<span class="tranx-icon sm"><img src="./images/coins/eth.svg" alt=""></span></div>
                                                            <div class="tranx-date">{{ moneyFormat($pending_withdrawals, 'USD') }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tranx-col">
                                                    <div class="tranx-amount">
                                                        <div class="number">{{ moneyFormat($pending_withdrawals, 'USD') }}</div>
                                                      
                                                    </div>
                                                </div>
                                            </div><!-- .tranx-item -->
                                            <div class="tranx-item">
                                                <div class="tranx-col">
                                                    <div class="tranx-info">
                                                        <div class="tranx-data">
                                                            <div class="tranx-label">Last Withdrawal </div>
                                                            <div class="tranx-date">{{ moneyFormat($last_withdrawal, 'USD') }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tranx-col">
                                                    <div class="tranx-amount">
                                                        <div class="number">{{ moneyFormat($last_withdrawal, 'USD') }} </div>
                                                    </div>
                                                </div>
                                            </div><!-- .tranx-item -->
                                            <!-- .tranx-item -->
                                        </div><!-- .tranx-list -->
                                    </div><!-- .col -->
                                    <!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .nk-block -->

                             <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
            <!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="card card-bordered card-stretch">
                                    <div class="card-inner-group">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h5 class="title">Recent Activities</h5>
                                                </div>
                                              <!-- .card-search -->
                                            </div><!-- .card-title-group -->
                                        </div><!-- .card-inner -->
                                        <div class="card-inner p-0">
                                            <div class="nk-tb-list nk-tb-tnx">
                                                <div class="nk-tb-item nk-tb-head">
                                                    <div class="nk-tb-col"><span>Activity</span></div>
                                                    <div class="nk-tb-col "><span>User</span></div>
                                                    <div class="nk-tb-col tb-col-lg"><span>Info</span></div>
                                                    <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-none d-md-block">Status</span></div>
                                                    
                                                </div><!-- .nk-tb-item -->
                                                @if(count($users)> 0 || count($login) > 0 || count($depo) > 0)
                                                @foreach ($users as $uu)
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col">
                                                        <div class="nk-tnx-type">
                                                            <div class="nk-tnx-type-icon bg-success-dim text-success">
                                                                <em class="icon ni ni-arrow-right"></em>
                                                            </div>
                                                            <div class="nk-tnx-type-text">
                                                                <span class="tb-lead">New Registration</span>
                                                                <span class="tb-date">{{$uu->created_at->DiffForHumans()}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col ">
                                                        <span class="tb-lead-sub">{{$uu->username}}</span>
                                                        <span class="tb-sub">{{$uu->first_name." ".$uu->last_name}}</span>
                                                    </div>
                                                    <div class="nk-tb-col ">
                                                        <span class="tb-lead-sub">{{$uu->email}}</span>
                                                        <span class="badge badge-dot badge-success">@if($uu->email_verified_at == null) Email Unverified @else Verified @endif</span>
                                                    </div>
                                                   
                                                    <div class="nk-tb-col nk-tb-col-status">
                                                        <div class="dot dot-success d-md-none"></div>
                                                        <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">Active</span>
                                                    </div>
                                                    
                                                </div>
                                                  @endforeach
                                                        @foreach ($login as $ll)
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col">
                                                        <div class="nk-tnx-type">
                                                            <div class="nk-tnx-type-icon bg-success-dim text-success">
                                                                <em class="icon ni ni-arrow-right"></em>
                                                            </div>
                                                            <div class="nk-tnx-type-text">
                                                                <span class="tb-lead">Recent Login Users</span>
                                                                <span class="tb-date">{{$ll->created_at->DiffForHumans()}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col ">
                                                        <span class="tb-lead-sub">{{$ll->user->username}}</span>
                                                        <span class="tb-sub">{{$ll->user->email}}</span>
                                                    </div>
                                                    <div class="nk-tb-col ">
                                                        <span class="tb-lead-sub">{{$user->updated_at}}</span>
                                                        <span class="badge badge-dot badge-success">{{$ll->created_at->DiffForHumans()}}</span>
                                                    </div>
                                                   
                                                    <div class="nk-tb-col nk-tb-col-status">
                                                        <div class="dot dot-success d-md-none"></div>
                                                        <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">Completed</span>
                                                    </div>
                                                    
                                                </div>
                                                  @endforeach
                                                        @foreach ($depo as $dd)
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col">
                                                        <div class="nk-tnx-type">
                                                            <div class="nk-tnx-type-icon bg-success-dim text-success">
                                                                <em class="icon ni ni-arrow-right"></em>
                                                            </div>
                                                            <div class="nk-tnx-type-text">
                                                                <span class="tb-lead">New Deposit</span>
                                                                <span class="tb-date">{{$dd->created_at->DiffForHumans()}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col ">
                                                        <span class="tb-lead-sub">{{$dd->user->username}}</span>
                                                        <span class="tb-sub">{{ moneyFormat($dd->amount, 'USD') }}</span>
                                                    </div>
                                                    <div class="nk-tb-col ">
                                                        <span class="tb-lead-sub">{{$dd->created_at}}</span>
                                                        <span class="badge badge-dot badge-success">{{$dd->created_at->DiffForHumans()}}</span>
                                                    </div>
                                                   
                                                    <div class="nk-tb-col nk-tb-col-status">
                                                        <div class="dot dot-success d-md-none"></div>
                                                        <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">@if($dd->status == 0) Active @elseif($dd->status == 1) Completed @else Cancelled @endif</span>
                                                    </div>
                                                    
                                                </div>
                                                  @endforeach
                                                      @foreach ($withdw as $ww)
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col">
                                                        <div class="nk-tnx-type">
                                                            <div class="nk-tnx-type-icon bg-success-dim text-success">
                                                                <em class="icon ni ni-arrow-right"></em>
                                                            </div>
                                                            <div class="nk-tnx-type-text">
                                                                <span class="tb-lead">New Withdrawal</span>
                                                                <span class="tb-date">{{$ww->created_at->DiffForHumans()}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col ">
                                                        <span class="tb-lead-sub">{{$ww->user->username}}</span>
                                                        <span class="tb-sub">{{ moneyFormat($dd->amount, 'USD') }}</span>
                                                    </div>
                                                    <div class="nk-tb-col ">
                                                        <span class="tb-lead-sub">{{$ww->created_at}}</span>
                                                        <span class="badge badge-dot badge-success">{{$ww->created_at->DiffForHumans()}}</span>
                                                    </div>
                                                   
                                                    <div class="nk-tb-col nk-tb-col-status">
                                                        <div class="dot dot-success d-md-none"></div>
                                                        <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">@if($ww->status == 0) Active @elseif($ww->status == 1) Completed @else Cancelled @endif</span>
                                                    </div>
                                                    
                                                </div>
                                                  @endforeach

                                                @endif<!-- .nk-tb-item -->
                                            <!-- .nk-tb-item -->
                                            </div><!-- .nk-tb-list -->
                                        </div><!-- .card-inner -->
                                        <div class="card-inner">
                                           
                                        </div><!-- .card-inner -->
                                    </div><!-- .card-inner-group -->
                                </div><!-- .card -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
                        </div>
                    </div>
                </div>

        
    
@endsection
