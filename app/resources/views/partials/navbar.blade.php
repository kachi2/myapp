     <div class="nk-header nk-header-fluid nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                               <a href="{{route('index')}}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{asset('/asset/images/logo.png')}}" srcset="{{asset('/asset/images/logo.png')}} 2x" alt="logo">
                            <img class="logo-dark logo-img" src="{{asset('/asset/images/logo-dark.png')}}" srcset="{{asset('/asset/images/logo-dark.png')}} 2x" alt="logo-dark">
                                 </a>
                            </div>
                            <div class="nk-header-news d-none d-xl-block">
                                <div class="nk-news-list">
                                    <span class="nk-news-item" >
                                        <div class="nk-news-icon">
                                            <em class="icon ni ni-card-view"></em>
                                        </div>
                                        <div class="nk-news-text">
                                           @if(auth()->user()->email_verified_at == null)   <p>
                                            <span> Please check your email and follow the link to verify your email address  </span> 
                                            </p>
                                            <form method="POST" action="{{route('verification.resend')}}" class="authentication-form" id="verify">
                                               @csrf
                                           <em> <button type="submit" class="icon ni ni-external btn btn-primay">Resend</button></em>
                                            </form>
                                            @else
                                            <p>
                                            <span> Hi {{auth()->user()->username}}, thanks for verifying your account, we will keep you updated on our new promotions...........       ....  </span> 
                                            </p>
                                            @endif
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <i class="icon ni ni-user-alt"> </i>
                                                </div>
                                                <div class="user-info  d-md-block">
                                                    @if(auth()->user()->email_verified_at == null)<div class="user-status user-status-unverified"> Unverified</div>
                                                     @else 
                                                        <div class="user-status user-status-verified"> Verified </div>
                                                     @endif
                                                    <div class="user-name dropdown-indicator"> {{strtoupper(auth()->user()->username)}}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>{{substr(strtoupper(auth()->user()->username),0,2)}}</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{strtoupper(auth()->user()->username)}}</span>
                                                        <span class="sub-text">{{auth()->user()->email}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                  <li><a href="{{ route('account') }}"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                    <li><a href="{{ route('account.activities') }}"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                    
                                                     <li>
                                                         @if(auth()->user()->email_verified_at == null)
                                                        <div class="user-status user-status-unverified"> <span style="color:#526484" >  Account Status:</span> Unverified </div> 
                                                        
                                                        <form method="POST" action="{{route('verification.resend')}}" class="authentication-form" id="verify">
                                               @csrf
                                           <em> <button type="submit" class="icon ni ni-external btn btn-primay">Resend Verification link</button></em>
                                            </form>
                                                     @else 
                                                        <div class="user-status user-status-verified"> <span style="color:#526484"  >  Account Status:</span> Verified </div>
                                                     @endif</li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout4').submit();" class="nk-menu-link dropdown-indicator has-indicator" data-toggle="dropdown" data-offset="0,10">
                                                <span class="nk-menu-icon"><em class="icon ni ni-globe"></em></span>
                                                <span class="nk-menu-text">Sign Out</span>
                                                
                                            </a></li>
                                                </ul>
                                                  <form id="frm-logout4" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }}
                                                </form>   
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown notification-dropdown mr-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-danger"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">

                                                @forelse($notification as $notify)
                                                
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">{{$notify->message}}</span></div>
                                                            <div class="nk-notification-time">{{$notify->created_at->DiffForHumans()}}</div>
                                                        </div>
                                                    </div><!-- .dropdown-inner -->
                                                    @empty
                                                     <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">No notification yet</span></div>
                                                      
                                                        </div>
                                                    </div>

                                                    @endforelse

                                                 
                                                </div>
                                            </div><!-- .nk-dropdown-body -->
                                           @if(count($notification) > 0)
                                            <div class="dropdown-foot center">
                                                <a href="{{route('create.notifications')}}">Clear All</a>
                                            </div>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
