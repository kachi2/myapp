@extends('layouts.app')
@section('content')
       <div class="nk-content nk-content-fluid">
                     <div class="nk-content-body">
                            <div class="nk-block-head">
                                <div class="nk-block-between-md g-4">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title fw-normal">My Payouts</h5>
                                        
                                    </div>
                                    <div class="nk-block-head-content">
                                        <ul class="nk-block-tools gx-3">
                                            <li class="order-md-last">
                                                   <a href="{{ route('user.packages') }}" class="btn btn-primary"><i
                                                    class='uil uil-plus mr-1'></i>Make Deposit</a>
                                            <a href="{{ route('deposits') }}" class="btn btn-primary ml-2"><i
                                                    class='uil uil-chart mr-1'></i>View Deposits</a>
                                        
                                            </li>
                                       </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                        <div class="components-preview wide-md mx-auto">
                         <div class="nk-block nk-block-lg"> 
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="true">
                                                <thead>
                                                    <tr class="nk-tb-item nk-tb-head">
                                                       
                                                     
                                                             <th class="nk-tb-col"><span class="sub-text">Id</th>
                                                          <th class="nk-tb-col"><span class="sub-text">#Ref</th>
                                                          <th class="nk-tb-col"><span class="sub-text">Plan</th>
                                                          <th class="nk-tb-col"><span class="sub-text">Deposit</th>
                                                           <th class="nk-tb-col"><span class="sub-text">Amount</th>
                                                          <th class="nk-tb-col tb-col-lg"><span class="sub-text">Date</th>
                                                                        
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($payouts as $payout)
                                        <tr>
                                            <td  class="nk-tb-col">{{ $payout->id }}</td>
                                            <td  class="nk-tb-col">{{ $payout->ref }}</td>
                                            <td  class="nk-tb-col">{{ $payout->plan->formatted_name }}</td>
                                            <td  class="nk-tb-col"><a href="{{ $payout->deposit->url }}">{{ $payout->deposit->ref }}</a></td>
                                            <td  class="nk-tb-col">{{ moneyFormat($payout->amount, 'USD') }}</td>
                                            <td  class="nk-tb-col">{{ $payout->created_at }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td  class="nk-tb-col"><span>No Payouts Yet</span>
                                            </td>
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
