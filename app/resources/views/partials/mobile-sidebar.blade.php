  <div class="modal fade" id="sidebarDrawer" tabindex="-1" aria-labelledby="sidebarDrawer" aria-hidden="true">
            <div class="modal-dialog side-modal-dialog">
                <div class="modal-content">
                    <div class="modal-header sidebar-modal-header">
                        <div class="sidebar-profile-info">
                            <div class="sidebar-profile-thumb">
                                <img data-cfsrc="{{asset('images/'.auth()->user()->image_path)}}" alt="profile" src="{{asset('images/'.auth()->user()->image_path)}}">
                            </div>
                            <div class="sidebar-profile-text">
                                <h3>
                                    <span style="font-weight:bolder"> {{strtoupper(auth()->user()->username)}}</span>   
                                    @if(auth()->user()->email_verified_at != null) 
                                    <span style="font-size:13px; color:#32CD32; font-weight:bolder">  Verified</span>@else
                                    <span class="" style="font-size:12px; color:#c81508; font-weight:bolder">  Unverified</span>
                                    @endif
                                </h3>
                                <p><a href="tel:1545-8880">{{auth()->user()->email}}</a></p>
                                <p><a href="tel:1545-8880">Account No:{{auth()->user()->btc}}</a></p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="sidebar-profile-wallet" style="box-shadow:0px  5px #d7d5da;">
                        <div class="add-card-info" >
                            <p>Main Balance</p>
                            <h3>{{ moneyFormat(auth()->user()->wallet->amount, 'USD') }}</h3>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="sidebar-nav">
                            <div class="sidebar-nav-item">
                                <ul class="sidebar-nav-list">
                                    <li><a href="{{ route('home') }}" class="active"><i class="flaticon-house"></i> Home</a></li>
                                 
                                    <li><a href="{{ route('transfer') }}"><i class="flaticon-menu-1"></i>Transfer</a></li>
                                    <li><a href="{{ route('transactions') }}"><i class="flaticon-credit-card"></i>Transactions</a></li>
                                    <li><a href="{{ route('card.deposit') }}"><i class="flaticon-credit-card"></i>Deposits</a></li>
                                    <li><a href="{{ route('earn.bonus') }}"><i class="flaticon-credit-card"></i>Earn Bonus</a></li>
                                    <li><a href="{{ route('account') }}"><i class="flaticon-settings"></i> Settings</a></li>
                                    <li> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout4').submit();"><i class="flaticon-logout"></i> Logout</a></li>
                                </ul>
                                <form id="frm-logout4" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }}
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>