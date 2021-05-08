@extends('layouts.admin', ['page_title' => 'Deposit Request'])
@section('content')
    <div class="body-content row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
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
                                        <th scope="col">Deposit Amount</th>
                                        <th scope="col">Profit</th>
                                        <th scope="col">verifying Amount</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($payment_request as $deposit)
                                        <tr>
                                            <th scope="row">{{ $deposit->ref }}</th>
                                            <td>
                                               <a href="{{ route('admin.users.show', ['id' => $deposit->user->id]) }}">
                                                    {{ $deposit->user->username }}
                                                </a>
                                            </td>
                                            <td>{{ $deposit->plan->formatted_name }}</td>
                                            <td>{{ moneyFormat($deposit->amount, 'USD') }}</td>
                                            <td>{{ moneyFormat($deposit->fee, 'USD') }}</td>
                                            <td>{{ moneyFormat($deposit->verifying_amount, 'USD') }}</td>
                                             
                                            <td>{{ $deposit->formatted_payment_method }}</td>
                                            <td>
                                                @if( $deposit->status == \App\Models\PENDINGDeposit::STATUS_PENDING)
                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                @elseif ($deposit->status == \App\Models\Deposit::STATUS_CANCELED)
                                                    <span class="badge badge-pill badge-warning">Canceled</span>
                                                @else
                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                @endif
                                            </td>
                                            <td>{{ $deposit->created_at }}</td>
                                            <td>
                                                @if($deposit->status == \App\Models\PENDINGDeposit::STATUS_PENDING)
                                                    <button class="btn btn-danger btn-sm"
                                                            onclick="markDepositExpired('{{ route('admin.deposits.approve', ['id' => encrypt($deposit->id)]) }}')">
                                                        Approve Payment</button>
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
                                {{$payment_request->links() }}
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
                confirmButtonText: 'Yes, Approve!',
                cancelButtonText: 'No, cancel!'
            }).then(function (result) {
                if (result.value) {
                    this.postDummy(url)
                }
            });
        }
    </script>
@endpush
