@extends('layouts.admin', ['page_title' => 'User: ' . $user->username])
@section('content')
    <div class="body-content row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mt-3">
                        <img src="{{ $user->photo_url }}" alt={{ $user->username }}""
                             class="img-fluid" />
                        <h5 class="mt-2 mb-0">{{ $user->name }}</h5>
                        <h6 class="text-muted font-weight-normal mt-1 mb-0">{{ '@' }}{{ $user->username }}</h6>
                        <h6 class="text-muted font-weight-normal mt-2 mb-4">{{ $user->location }}</h6>
                        <a href="{{ route('admin.users.send_bonus', ['id' => $user->id]) }}" class="btn btn-primary btn-sm mr-1 pr-3">Send Bonus </a>
                        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-primary btn-sm mr-1">Edit</a>
                        <a href="{{ route('admin.users.send_message', ['id' => $user->id]) }}" class="btn btn-primary btn-sm mr-1">Send Message</a>
                    </div>

                    <!-- profile  -->
                    <div class="mt-5 pt-2 border-top">
                        <h4 class="mb-3 font-size-15">About</h4>
                        <p class="text-muted mb-4">{{ $user->about }}</p>
                    </div>
                    <div class="mt-3 pt-2 border-top">
                        <h4 class="mb-3 font-size-15">Contact Information</h4>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0 text-muted">
                                <tbody>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td>{{ $user->location }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Registered At</th>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mb-xl-5"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Account Balance</span>
                                    <h2 class="mb-0">{{ moneyFormat($user->wallet->amount, 'USD') }}</h2>
                                </div>
                                <div class="align-self-center">;
                                    <span class="icon-lg icon-dual-primary" data-feather="dollar-sign"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Bonus</span>
                                    <h2 class="mb-0">{{ moneyFormat($user->wallet->bonus, 'USD') }}</h2>
                                </div>
                                <div class="align-self-center">
                                    <span class="icon-lg icon-dual-primary" data-feather="dollar-sign"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Referral Earnings</span>
                                    <h2 class="mb-0">{{ moneyFormat($user->wallet->referrals, 'USD') }}</h2>
                                </div>
                                <div class="align-self-center">
                                    <span class="icon-lg icon-dual-primary" data-feather="dollar-sign"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <h5 class="card-title header-title border-bottom p-3 mb-0">Deposit History</h5>
                            <!-- stat 1 -->
                            <div class="media px-3 py-4 border-bottom">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ moneyFormat($total_deposits, 'USD') }}</h4>
                                    <span class="text-muted">Total Deposits</span>
                                </div>
                                <i data-feather="dollar-sign" class="align-self-center icon-dual icon-lg"></i>
                            </div>

                            <!-- stat 2 -->
                            <div class="media px-3 py-4 border-bottom">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ moneyFormat($active_deposits, 'USD') }}</h4>
                                    <span class="text-muted">Active Deposits</span>
                                </div>
                                <i data-feather="dollar-sign" class="align-self-center icon-dual icon-lg"></i>
                            </div>

                            <!-- stat 3 -->
                            <div class="media px-3 py-4">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ moneyFormat($last_deposit, 'USD') }}</h4>
                                    <span class="text-muted">Last Deposit</span>
                                </div>
                                <i data-feather="dollar-sign" class="align-self-center icon-dual icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <h5 class="card-title header-title border-bottom p-3 mb-0">Withdrawal History</h5>
                            <!-- stat 1 -->
                            <div class="media px-3 py-4 border-bottom">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ moneyFormat($total_withdrawals, 'USD') }}</h4>
                                    <span class="text-muted">Total Withdrawals</span>
                                </div>
                                <i data-feather="dollar-sign" class="align-self-center icon-dual icon-lg"></i>
                            </div>

                            <!-- stat 2 -->
                            <div class="media px-3 py-4 border-bottom">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ moneyFormat($pending_withdrawals, 'USD') }}</h4>
                                    <span class="text-muted">Pending Withdrawals</span>
                                </div>
                                <i data-feather="dollar-sign" class="align-self-center icon-dual icon-lg"></i>
                            </div>

                            <!-- stat 3 -->
                            <div class="media px-3 py-4">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{ moneyFormat($last_withdrawal, 'USD') }}</h4>
                                    <span class="text-muted">Last Withdrawal</span>
                                </div>
                                <i data-feather="dollar-sign" class="align-self-center icon-dual icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
