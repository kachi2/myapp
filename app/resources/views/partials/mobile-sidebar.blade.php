  <div class="modal fade" id="sidebarDrawer" tabindex="-1" aria-labelledby="sidebarDrawer" aria-hidden="true">
            <div class="modal-dialog side-modal-dialog">
                <div class="modal-content">
                    <div class="modal-header sidebar-modal-header">
                        <div class="sidebar-profile-info">
                            <div class="sidebar-profile-thumb">
                                <img src="assets/images/profile.jpg" alt="profile">
                            </div>
                            <div class="sidebar-profile-text">
                                <h3>{{strtoupper(auth()->user()->username)}}</h3>
                                <p><a href="tel:1545-8880">{{auth()->user()->email}}</a></p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="sidebar-profile-wallet">
                        <div class="add-card-info">
                            <p>Main Wallet</p>
                            <h3>{{ moneyFormat(auth()->user()->wallet->amount, 'USD') }}</h3>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="sidebar-nav">
                            <div class="sidebar-nav-item">
                                <ul class="sidebar-nav-list">
                                    <li><a href="{{ route('home') }}" class="active"><i class="flaticon-house"></i> Home</a></li>
                                    <li><a href="{{ route('user.packages') }}"><i class="flaticon-invoice"></i>Investment Plans</a></li>
                                    <li><a href="{{ route('transfer') }}"><i class="flaticon-menu-1"></i>Send Money</a></li>
                                    <li><a href="{{ route('withdrawals') }}"><i class="flaticon-credit-card"></i>Withdrawal</a></li>
                                    <li><a href="{{ route('referral') }}"><i class="flaticon-credit-card"></i>Earn Bonus</a></li>
                                    <li><a href="my-cards.html"><i class="flaticon-credit-card"></i>Markets</a></li>
                                    <li><a href="{{ route('account') }}"><i class="flaticon-settings"></i> Settings</a></li>
                                    <li><a href="mailto:support@zenithcapital.cc"><i class="flaticon-call-center-agent"></i> Contact Us</a></li>
                                    <li><a href="#"><i class="flaticon-logout"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>