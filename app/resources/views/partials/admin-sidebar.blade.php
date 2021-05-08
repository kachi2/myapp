                <aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                            <li class="nav-static-title">Navigation</li>
                            <li>
                                <a href="{{ route('admin.home') }}" aria-expanded="false">
                                  <i class="nav-icon fa fa-home menu-icon"></i>
                                  <span class="nav-title">Admin Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a aria-expanded="false" href="{{ route('admin.packages') }}">
                                    <i class="nav-icon fa fa-grip-horizontal menu-icon" style="margin-right: 4px;"></i>
                                    Packages
                                </a>
                            </li>
                            <li>
                                <a aria-expanded="false" href="{{ route('admin.users') }}">
                                    <i class="fa fa-users menu-icon" style="margin-right: 4px;"></i>
                                    Users
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.withdrawals') }}" aria-expanded="false">
                                  <i class="nav-icon fa fa-download menu-icon"></i>
                                  <span class="nav-title">Withdrawals</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.deposits') }}" aria-expanded="false">
                                  <i class="nav-icon fa fa-list menu-icon"></i>
                                  <span class="nav-title">Deposits</span>
                                </a>
                            </li>
                               <li>
                                <a href="{{ route('admin.payment_request') }}" aria-expanded="false">
                                  <i class="nav-icon fa fa-list menu-icon"></i>
                                  <span class="nav-title">Approve Deposit</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.payouts') }}" aria-expanded="false">
                                  <i class="nav-icon fa fa-list-alt menu-icon"></i>
                                  <span class="nav-title">Payouts</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.users.send_users_bonus') }}" aria-expanded="false">
                                  <i class="nav-icon fa fa-unlink menu-icon"></i>
                                  <span class="nav-title">Send Bonus</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.referrals') }}" aria-expanded="false">
                                  <i class="nav-icon fa fa-bullhorn menu-icon"></i>
                                  <span class="nav-title">Referral</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.setting') }}" aria-expanded="false">
                                  <i class="nav-icon fa fa-cogs menu-icon"></i>
                                  <span class="nav-title">Account Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.testimonies') }}" aria-expanded="false">
                                  <i class="nav-icon fa fa-cog menu-icon"></i>
                                  <span class="nav-title">Testimony</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home') }}" aria-expanded="false">
                                  <i class="nav-icon fa fa-arrow-circle-right menu-icon"></i>
                                  <span class="nav-title">User Panel</span>
                                </a>
                            </li>                              
                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>

