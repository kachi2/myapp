@extends('layouts.admin', ['page_title' => 'Users'])
@section('content')
    <div class="body-content row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-3">
                            <a href="{{ route('admin.users.add') }}" class="btn btn-primary"><i
                                    class='uil uil-plus mr-1'></i>Add User</a>
                            <a href="{{ route('admin.message_users') }}" class="btn btn-primary"><i
                                    class='uil uil-message mr-1'></i>Mail Users</a>
                        </div>
                        <div class="col-sm-9">
                            <div class="float-sm-right mt-3 mt-sm-0">
                                <div class="task-search d-inline-block mb-3 mb-sm-0">
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
                                        <a class="dropdown-item" href="{{ filter_url('admins') }}">Admins</a>
                                        <a class="dropdown-item" href="{{ filter_url('non-admins') }}">Non Admins</a>
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
                                        <th scope="col">#Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Reg. Date</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Deposits</th>
                                        <th scope="col">Withdraws</th>
                                        <th scope="col">Payouts</th>
                                        <th scope="col">Active Dep</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->nam }} {{ '@' }}{{ $user->username }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ moneyFormat($user->wallet->total_amount, 'USD') }}</td>
                                            <td>{{ moneyFormat($user->deposits()->sum('amount'), 'USD') }}</td>
                                            <td>{{ moneyFormat($user->withdrawals()->sum('amount'), 'USD') }}</td>
                                            <td>{{ moneyFormat($user->payouts()->sum('amount'), 'USD') }}</td>
                                            <td>{{ moneyFormat($user->deposits()->where('status', \App\Models\Deposit::STATUS_ACTIVE)->sum('amount'), 'USD') }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.show', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">
                                                    <i class='uil uil-eye'></i>
                                                </a>
                                                <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">
                                                    <i class='uil uil-edit'></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger" onclick="deleteUser('{{ route('admin.users.delete', ['id' => $user->id]) }}')">
                                                    <i class='uil uil-trash'></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td><span>No Users Yet</span>
                                            <td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="col mt-4">
                                {{ $users->links() }}
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
        function deleteUser(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You wont be able to reveres this',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if(result.value) {
                    postDummy(url)
                }
            })
        }
    </script>
@endpush
