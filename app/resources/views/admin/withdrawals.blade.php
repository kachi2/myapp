@extends('layouts.admin', ['page_title' => 'Withdrawals'])
@section('content')
    <div class="body-content row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-3">
                            <a href="{{ route('admin.withdrawals.add') }}" class="btn btn-primary"><i
                                    class='uil uil-plus mr-1'></i>Add Withdrawal</a>
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
                                        <a class="dropdown-item" href="{{ filter_url('pending') }}">Pending</a>
                                        <a class="dropdown-item" href="{{ filter_url('processed') }}">Processed</a>
                                        <a class="dropdown-item" href="{{ filter_url('canceled') }}">Canceled</a>
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
                                        <th scope="col">Amount</th>
                                        <th scope="col">Wallet</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($withdrawals as $withdrawal)
                                            <tr>
                                                <th scope="row">{{ $withdrawal->ref }}</th>
                                                <td>
                                                    <a href="{{ route('admin.users.show', ['id' => $withdrawal->user->id]) }}">
                                                        {{ $withdrawal->user->username }}
                                                    </a>
                                                </td>
                                                <td>{{ moneyFormat($withdrawal->amount, 'USD') }}</td>
                                                <td>{{ $withdrawal->wallet_address }}</td>
                                                <td>{{ $withdrawal->formatted_payment_method }}</td>
                                                <td>
                                                    @if( $withdrawal->status == \App\Models\Withdrawal::STATUS_PAID)
                                                        <span class="badge badge-pill badge-success">Processed</span>
                                                    @elseif ($withdrawal->status == \App\Models\Withdrawal::STATUS_CANCELED)
                                                        <span class="badge badge-pill badge-warning">Canceled</span>
                                                    @else
                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                    @endif
                                                </td>
                                                <td>{{ $withdrawal->created_at }}</td>
                                                <td>
                                                    @if($withdrawal->status == \App\Models\Withdrawal::STATUS_PENDING)
                                                        <button class="btn btn-sm btn-danger" onclick="cancelWithdrawal('{{ route('admin.withdrawals.cancel', ['id' => $withdrawal->id]) }}')">Cancel</button>
                                                        @if(!$withdrawal->paid)
                                                            <button class="btn btn-danger btn-sm"
                                                                    onclick="markWithdrawalPaid('{{ route('admin.withdrawals.mark_paid', ['id' => $withdrawal->id]) }}')">
                                                                Mark Paid And Send Coin</button>
                                                        @endif
                                                        {{-- @if(!$withdrawal->paid)
                                                            <button class="btn btn-danger btn-sm"
                                                                    onclick="markWithdrawalAsPaid('{{ route('admin.withdrawals.mark_as_paid', ['id' => $withdrawal->id]) }}')">
                                                                Mark Paid</button>
                                                        @endif --}}
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td><span>No Withdrawals Yet</span>
                                                <td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="col mt-4">
                                {{ $withdrawals->links() }}
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
        function cancelWithdrawal(url) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, do it!'
            }).then((result) => {
                if(result.value) {
                    postDummy(url)
                }
            })
        }
        
        function markWithdrawalAsPaid(url) {
            Swal.fire({
                title: 'Are you sure?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, mark paid!',
                cancelButtonText: 'No, cancel!'
            }).then(function (result) {
                if (result.value) {
                    this.postDummy(url)
                }
            });
        }
        
        function markWithdrawalPaid(url) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, mark paid!',
                cancelButtonText: 'No, cancel!'
            }).then(function (result) {
                if (result.value) {
                    this.postDummy(url)
                }
            });
        }
    </script>
@endpush
