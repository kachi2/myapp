@extends('layouts.admin', ['page_title' => 'Users'])
@section('content')

    <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="components-preview wide-md mx-auto">
                                 <div class="nk-block-head">
                                <div class="nk-block-between-md g-4">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title fw-normal">Users List</h5>
                                        
                                    </div>
                                    <div class="nk-block-head-content">
                                        <ul class="nk-block-tools gx-3">
                                            <li class="order-md-last">
                                                   <a href="{{ route('admin.users.add') }}" class="btn btn-primary"><i
                                                    class='uil uil-plus mr-1'></i>Add Users</a>
                                            <a href="{{ route('admin.message_users') }}" class="btn btn-primary ml-2"><i
                                                    class='uil uil-chart mr-1'></i>Email User</a> 
                                        
                                            </li>
                                       </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                                
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="true">
                                                <thead>
                                                    <tr class="nk-tb-item nk-tb-head">
                                                    <th></th>
                                                     <th class="nk-tb-col "><span class="sub-text">id</span></th>
                                                        <th class="nk-tb-col "><span class="sub-text">User</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Reg.Date</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Balance</span></th>
                                                        <th class="nk-tb-col "><span class="sub-text">Deposits</span></th>
                                                        <th class="nk-tb-col "><span class="sub-text">Withdrawals</span></th>
                                                          <th class="nk-tb-col "><span class="sub-text">Payouts</span></th>
                                                           <th class="nk-tb-col "><span class="sub-text">Active Deposits</span></th>

                                                        <th class="nk-tb-col nk-tb-col-tools text-right"> 
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($users as $user)
                                                    <tr class="nk-tb-item">
                                                        <td class="nk-tb-col " >
                                                            <span class="tb-amount">{{ $user->id }} </span>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <div class="user-card">
                                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                    <span>{{substr($user->username,0,2) }}</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                         <td class="nk-tb-col " >
                                                           <div class="user-info">
                                                                    <span class="tb-lead">{{ $user->username }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                                  
                                                        </div>
                                                        </td>
                                                        <td class="nk-tb-col " >
                                                            <span class="tb-amount">{{ $user->created_at }} </span>
                                                        </td>
                                                        <td class="nk-tb-col ">
                                                            <span>{{ moneyFormat($user->wallet->total_amount, 'USD') }}</span>
                                                        </td>
                                                        <td class="nk-tb-col " >
                                                             <span>{{ moneyFormat($user->deposits()->sum('amount'), 'USD') }}</span>      
                                                        </td>
                                                        <td class="nk-tb-col ">
                                                            <span>{{ moneyFormat($user->withdrawals()->sum('amount'), 'USD') }}</span>
                                                        </td>
                                                         <td class="nk-tb-col ">
                                                            <span>{{ moneyFormat($user->payouts()->sum('amount'), 'USD') }}</span>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <span>{{ moneyFormat($user->deposits()->where('status', \App\Models\Deposit::STATUS_ACTIVE)->sum('amount'), 'USD') }}</span>
                                                        </td>
                                                        <td class="nk-tb-col nk-tb-col-tools">
                                                            <ul class="nk-tb-actions gx-1"> 
                                                                <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="{{ route('admin.users.show', ['id' => $user->id]) }}"><em class="icon ni ni-focus"></em><span>Edit User</span></a></li>
                                                                                <li><a href="{{ route('admin.users.show', ['id' => $user->id]) }}"><em class="icon ni ni-eye"></em><span>View User</span></a></li>
                                                                                <li class="divider"></li>
                                                                                
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
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
                                    </div><!-- .card-preview -->
                                </div> <!-- nk-block -->
                            </div><!-- .components-preview -->
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
