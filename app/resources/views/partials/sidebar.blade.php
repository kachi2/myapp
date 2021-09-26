 <div class="nk-sidebar is-dark nk-sidebar-fixed " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="{{route('index')}}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img"  src="{{asset('/logo.png')}}" srcset="{{asset('/logo.png')}} 2x" alt="logo">
                            <img class="logo-dark logo-img" src="{{asset('/logo.png')}}" srcset="{{asset('/logo.png')}} 2x" alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-body" data-simplebar>
                        <div class="nk-sidebar-content">
                            <div class="nk-sidebar-widget d-none d-xl-block">
                                <div class="user-account-info between-center">
                                    <div class="user-account-main">
                                        <h6 class="overline-title-alt">Available Balance</h6>
                                        <div class="user-balance">{{ moneyFormat(auth()->user()->wallet->amount, 'USD') }} </div>
                                    </div>
                                </div>
                                <ul class="user-account-data gy-1">
                                    <li>
                                        <div class="user-account-label">
                                            <span class="sub-text">Bonus Balance</span>
                                        </div>
                                        <div class="user-account-value">
                                            <span class="lead-text">{{ moneyFormat(auth()->user()->wallet->bonus, 'USD')}}
                                        </div>
                                    </li>
                                </ul>
                                <div class="user-account-actions">
                                    <ul class="g-3">
                                        <li><a href="{{ route('user.packages') }}" class="btn btn-lg  btn-primary"><span>Deposit</span></a></li>
                                        <li><a href="{{ route('withdrawals.request') }}" class="btn btn-lg  btn-warning"><span>Withdraw</span></a></li>
                                    </ul>
                                </div>
                            </div><!-- .nk-sidebar-widget -->
                            <div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
                                <a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="#">
                                    <div class="user-card-wrap">
                                        <div class="user-card">
                                            <div class="user-avatar">
                                          {{substr(strtoupper(auth()->user()->username),0,2)}}
                                            </div>
                                            <div class="user-info">
                                                <span class="lead-text">{{auth()->user()->username}}</span>
                                                <span class="sub-text">{{auth()->user()->email}}</span>
                                            </div>
                                            <div class="user-action">
                                                <em class="icon ni ni-chevron-down"></em>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">
                                    <div class="user-account-info between-center">
                                        <div class="user-account-main">
                                            <h6 class="overline-title-alt">Available Balance</h6>
                                            <div class="user-balance">{{ moneyFormat(auth()->user()->wallet->amount, 'USD') }}</div>
                                          
                                        </div>
                                    </div>
                                    <ul class="user-account-data">
                                        <li>
                                            <div class="user-account-label">
                                                <span class="sub-text">Bonus Balance</span>
                                            </div>
                                            <div class="user-account-value">
                                                <span class="lead-text">{{ moneyFormat(auth()->user()->wallet->bonus, 'USD')}}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="user-account-label">
                                                <span class="sub-text">Referal Earning</span>
                                            </div>
                                            <div class="user-account-value">
                                                <span class="sub-text text-base">{{ moneyFormat(auth()->user()->wallet->referrals, 'USD') }}</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .nk-sidebar-widget -->
                            <div class="nk-sidebar-menu">
                                <!-- Menu -->
                                <ul class="nk-menu">
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title">Menu</h6>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('home') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                            <span class="nk-menu-text">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('account') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-user-c"></em></span>
                                            <span class="nk-menu-text">My Account</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('withdrawals') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                            <span class="nk-menu-text">Withdrawals</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('deposits') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                            <span class="nk-menu-text">Deposit</span>
                                        </a>
                                    </li>
                                     <li class="nk-menu-item">
                                        <a href="{{ route('user.packages') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-package"></em></span>
                                            <span class="nk-menu-text">Packages</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('payouts') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-cc-alt2"></em></span>
                                            <span class="nk-menu-text">Payouts</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('transfer') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                            <span class="nk-menu-text">Transfer</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('referral') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-user-add"></em></span>
                                            <span class="nk-menu-text">My Referals</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('testimonies') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-notes-alt"></em></span>
                                            <span class="nk-menu-text">Testimony</span>
                                        </a>
                                    </li>

                                    <!-- .nk-menu-item -->
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title">Settings</h6>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('account') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                                            <span class="nk-menu-text">Account Settings</span>
                                        </a>
                                    </li>
                                    @if(auth_user()->is_admin)
                                     <li class="nk-menu-item">
                                        <a href="{{ route('admin.home') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-repeat"></em></span>
                                            <span class="nk-menu-text">Switch to Admin</span>
                                        </a>
                                    </li>
                                    @endif 
                                    
                                </ul><!-- .nk-menu -->
                            </div><!-- .nk-sidebar-menu -->
              <!-- .nk-sidebar-widget -->
                            <div class="nk-sidebar-footer">
                                <ul class="nk-menu nk-menu-footer">
                                    <li class="nk-menu-item">
                                        <a target="_blank" href="#"class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span>
                                            <span class="nk-menu-text">Support</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item ml-auto">
                                        <div class="dropup">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout4').submit();" class="nk-menu-link dropdown-indicator has-indicator" data-toggle="dropdown" data-offset="0,10">
                                                <span class="nk-menu-icon"><em class="icon ni ni-globe"></em></span>
                                                <span class="nk-menu-text">Sign Out</span>
                                            </a>
                                                <form id="frm-logout4" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }}
                                                </form>                                        </div>
                                    </li>
                                </ul><!-- .nk-footer-menu -->
                            </div><!-- .nk-sidebar-footer -->
                        </div><!-- .nk-sidebar-content -->
                    </div><!-- .nk-sidebar-body -->
                </div><!-- .nk-sidebar-element -->
            </div>