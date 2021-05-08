@extends('layouts.admin', ['page_title' => 'Deposits'])
@section('content')
    <div class="body-content row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-3">
                            <a href="{{ route('admin.deposits.add') }}" class="btn btn-primary"><i
                                    class='uil uil-plus mr-1'></i>Add Deposit</a>
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
                                        <th scope="col">Amount</th>
                                        <th scope="col">Profit</th>
                                        <th scope="col">Paid</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Expires At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($deposits as $deposit)
                                        <tr>
                                            <th scope="row">{{ $deposit->ref }}</th>
                                            <td>
                                                <a href="{{ route('admin.users.show', ['id' => $deposit->user->id]) }}">
                                                    {{ $deposit->user->username }}
                                                </a>
                                            </td>
                                            <td>{{ $deposit->plan->formatted_name }}</td>
                                            <td>{{ moneyFormat($deposit->amount, 'USD') }}</td>
                                            <td>{{ moneyFormat($deposit->profit, 'USD') }}</td>
                                            <td>{{ moneyFormat($deposit->paid_amount, 'USD') }}</td>
                                            <td>{{ $deposit->formatted_payment_method }}</td>
                                            <td>
                                                @if( $deposit->status == \App\Models\Deposit::STATUS_COMPLETED)
                                                    <span class="badge badge-pill badge-warning">Completed</span>
                                                @elseif ($deposit->status == \App\Models\Deposit::STATUS_CANCELED)
                                                    <span class="badge badge-pill badge-warning">Canceled</span>
                                                @else
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @endif
                                            </td>
                                            <td>{{ $deposit->created_at }}</td>
                                            <td>{{ $deposit->expires_at->diffForHumans() }}</td>
                                            <td>
                                                @if(!$deposit->has_expired)
                                                    <button class="btn btn-danger btn-sm"
                                                            onclick="markDepositExpired('{{ route('admin.deposits.mark_expired', ['id' => $deposit->id]) }}')">
                                                        Mark Expired</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td><span>No Deposits Yet</span>
                                            <td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="col mt-4">
                                {{ $deposits->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function markDepositExpired(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, mark expired!',
                cancelButtonText: 'No, cancel!'
            }).then(function (result) {
                if (result.value) {
                    this.postDummy(url)
                }
            });
        }
    </script>
@endpush
