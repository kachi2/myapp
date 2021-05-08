@extends('layouts.app', ['page_title' => 'Referral'])
@section('content')

    
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body p-0 red-card">
                        <div class="media p-3">
                            <div class="media-body">
                                <span class="text-uppercase font-size-12 font-weight-bold text-white">Total Referrals</span>
                                <h2 class="mb-0 text-white">{{ get_stats()['referral_count'] }}</h2>
                            </div>
                            <div class="align-self-center">
                                <span class="icon-lg tx-primary" data-feather="users"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body p-0 red-card">
                        <div class="media p-3">
                            <div class="media-body">
                                <span class="text-uppercase font-size-12 font-weight-bold text-white">Today
                                                Referrals</span>
                                <h2 class="mb-0 text-white">{{ $today_referrals }}</h2>
                            </div>
                            <div class="align-self-center">
                                <span class="icon-lg tx-primary" data-feather="trending-up"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body p-0 red-card">
                        <div class="media p-3">
                            <div class="media-body">
                                <span class="text-uppercase font-size-12 font-weight-bold text-white">Referral Earnings</span>
                                <h2 class="mb-0 text-white">{{ moneyFormat(get_stats()['all_time_referral_bonus'], 'USD') }}</h2>
                            </div>
                            <div class="align-self-center">
                                <span class="icon-lg tx-primary" data-feather="dollar-sign"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 id="section2" class="tx-semibold">REFERRAL LINK</h5>
                    <p class="mg-b-25">Below is your referral link, invite your friends with your referral link to earn more Income Bonus.</p> <br>

                    <form>
                      
                        <div class="form-group mg-b-0">
                          <label>Referral LINK:</label>
                          <input type="text" class="form-control wd" value="{{ auth_user()->ref_url }}" id="inputReferralLink">
                        </div><!-- form-group -->                
                      
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">                   

        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-3">

                        </div>
                        <div class="col-sm-9">
                            <div class="float-sm-right mt-3 mt-sm-0">

                                <div class="task-search d-inline-block mb-3 mb-sm-0 mr-sm-3">
                                    <form method="get">
                                        <div class="input-group">
                                            <input type="text" name="search" value="{{ request()->input('search') }}" class="form-control search-input"
                                                   placeholder="Search..." />
                                            <span class="uil uil-search icon-search"></span>
                                            <div class="input-group-append">
                                                <button class="btn btn-soft-primary" type="submit">
                                                    <i class='uil uil-file-search-alt'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class='uil uil-sort-amount-down'></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ filter_url('all') }}">All</a>
                                        <a class="dropdown-item" href="{{ filter_url('active') }}">Active</a>
                                        <a class="dropdown-item" href="{{ filter_url('completed') }}">Completed</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Registered Date</th>
                                        <th scope="col">Deposit Status</th>
                                        <th scope="col">Last Deposit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($referrals as $referral)
                                        <tr>
                                            <th scope="row">{{ $referral->user->username }}</th>
                                            <th scope="row">{{ $referral->user->first_name }}</th>
                                            <th scope="row">{{ $referral->user->last_name }}</th>
                                            <td>{{ $referral->user->created_at->diffForHumans() }}</td>
                                            <td>@if( $referral->has_deposit )
                                                    <span class="badge badge-pill badge-success">Deposit made</span>
                                                @else
                                                    <span class="badge badge-pill badge-warning">No deposit made yet</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($referral->deposit)
                                                    {{ moneyFormat($referral->deposit->amount, 'USD') }}
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td><span>No Referrals Yet</span>
                                            <td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="col mt-4">
                                {{ $referrals->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
