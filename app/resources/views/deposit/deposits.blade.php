@extends('layouts.app')
@section('content')
       <div class="nk-content nk-content-fluid">
                     <div class="nk-content-body">
                            <div class="nk-block-head">
                                <div class="nk-block-between-md g-4">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title fw-normal">My Deposits</h5>
                                        
                                    </div>
                                    <div class="nk-block-head-content">
                                        <ul class="nk-block-tools gx-3">
                                            <li class="order-md-last">
                                                   <a href="{{ route('user.packages') }}" class="btn btn-primary"><i
                                                    class='uil uil-plus mr-1'></i>Make Deposit</a>
                                            <a href="{{ route('deposits.transactions') }}" class="btn btn-primary ml-2"><i
                                                    class='uil uil-chart mr-1'></i>View Transactions</a>
                                        
                                            </li>
                                       </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                        <div class="components-preview wide-md mx-auto">
                         <div class="nk-block nk-block-lg"> 
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                <thead>
                                                    <tr class="nk-tb-item nk-tb-head">
                                                       
                                                        <th class="nk-tb-col"><span class="sub-text">Ref</span></th>
                                                        <th class="nk-tb-col "><span class="sub-text">Plan</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Amount</span></th>
                                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Profit</span></th>
                                                        <th class="nk-tb-col "><span class="sub-text">Paid</span></th>
                                                         <th class="nk-tb-col tb-col-md "><span class="sub-text">Method</span></th>
                                                         <th class="nk-tb-col "><span class="sub-text">Status</span></th>
                                                        <th class="nk-tb-col tb-col-md "><span class="sub-text">Date</span></th>
                                                         <th class="nk-tb-col tb-col-md"><span class="sub-text">Expire At</span></th>
                                                        
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 @forelse($deposits as $deposit)
                                          
                                                    <tr class="nk-tb-item">
                                                         <td class="nk-tb-col" data-order="35040.34">
                                                            <span class="tb-amount">{{ $deposit->ref }} </span>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <span>{{ $deposit->plan->formatted_name }}</span>
                                                        </td>
                                                        <td class="nk-tb-col ">
                                                             <span>{{ moneyFormat($deposit->amount, 'USD') }}</span>
                                                        </td>
                                                        <td class="nk-tb-col tb-col-lg">
                                                            <span>{{ moneyFormat($deposit->profit, 'USD') }}</span>
                                                        </td>
                                                        <td class="nk-tb-col tb-col-lg">
                                                            <span>{{ moneyFormat($deposit->paid_amount, 'USD') }}</span>
                                                        </td>
                                                        <td class="nk-tb-col tb-col-lg">
                                                            <span>{{ $deposit->formatted_payment_method }}</span>
                                                        </td> 
                                                        <td class="nk-tb-col ">
                                                            @if( $deposit->status == \App\Models\Deposit::STATUS_COMPLETED)
                                                                <span class="tb-status text-success">Completed</span>
                                                            @elseif ($deposit->status == \App\Models\Deposit::STATUS_CANCELED)
                                                                <span class="tb-status text-danger">Cancelled</span>
                                                            @else
                                                                <span class="tb-status text-success">Active</span>
                                                            @endif
                                                        </td>
                                                        <td class="nk-tb-col tb-col-lg">{{ $deposit->created_at }}</td>
                                                        <td class="nk-tb-col tb-col-lg">{{ $deposit->expires_at->diffForHumans() }}</td>
                                                    </tr><!-- .nk-tb-item  -->
                                                   
                                                   @empty
                                                 <tr>
                                                <td><span>No Deposits Yet</span></td>
                                                
                                            </tr>
                                        @endforelse
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div> 
                                </div>
                         



                        </div>
                    </div>
               
@endsection
@section('scripts')
    <script>
        function cancelWithdrawal(url) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, do it!'
            }).then((result) => {
                if(result.value) {
                   form1.submit();
                }
            })
        }
    </script>
@endsection
