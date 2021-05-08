@extends('layouts.admin', ['page_title' => 'Payouts'])
@section('content')
    <div class="body-content row">
        <div class="col">
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
                                        <th scope="col">#Ref</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Plan</th>
                                        <th scope="col">Deposit</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Profit</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($payouts as $payout)
                                        <tr>
                                            <th scope="row">{{ $payout->ref }}</th>
                                            <td>
                                                <a href="{{ route('admin.users.show', ['id' => $payout->user->id]) }}">
                                                    {{ $payout->user->username }}
                                                </a>
                                            </td>
                                            <td>{{ $payout->plan->formatted_name }}</td>
                                            <td><a href="{{ $payout->deposit->url }}">{{ $payout->deposit->ref }}</a></td>
                                            <td>{{ moneyFormat($payout->amount, 'USD') }}</td>
                                            <td>{{ moneyFormat($payout->profit, 'USD') }}</td>
                                            <td>{{ $payout->created_at }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td><span>No Payouts Yet</span>
                                            <td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="col mt-4">
                                {{ $payouts->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
