@extends('layouts.app')
@section('content')
       <div class="nk-content nk-content-fluid">
                     <div class="nk-content-body">
                            <div class="nk-block-head">
                                <div class="nk-block-between-md g-4">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title fw-normal">My Withdrawal</h5>
                                        
                                    </div>
                                    <div class="nk-block-head-content">
                                        <ul class="nk-block-tools gx-3">
                                            <li class="order-md-last">
                                            <a href="{{ route('withdrawals.request') }}" class="btn btn-primary"><span>Request Withdrawal</span> <em class="icon ni ni-arrow-long-right"></em></a></li>
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
                                                        <th class="nk-tb-col "><span class="sub-text">Amount</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Method</span></th>
                                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Date</span></th>
                                                        <th class="nk-tb-col "><span class="sub-text">Status</span></th>
                                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                                        </th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 @forelse($withdrawals as $withdrawal)
                                          
                                                    <tr class="nk-tb-item">
                                                         <td class="nk-tb-col" data-order="35040.34">
                                                            <span class="tb-amount">{{ $withdrawal->ref }} </span>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <span>{{ moneyFormat($withdrawal->amount, 'USD') }}</span>
                                                        </td>
                                                        <td class="nk-tb-col tb-col-lg">
                                                             <span>{{ $withdrawal->formatted_payment_method }}</span>
                                                        </td>
                                                        <td class="nk-tb-col tb-col-lg">
                                                            <span>{{ $withdrawal->created_at }}</span>
                                                        </td>
                                                        <td class="nk-tb-col ">
                                                         @if( $withdrawal->status == \App\Models\Withdrawal::STATUS_PAID)
                                                            <span class="tb-status text-success">Processed</span>
                                                            @elseif ($withdrawal->status == \App\Models\Withdrawal::STATUS_CANCELED)
                                                               <span class="tb-status text-danger">Cancelled</span>
                                                               @else
                                                              <span class="tb-status text-warning">Pending</span>
                                                                 @endif
                                                        </td>
                                                        
                                                        <td class="nk-tb-col">
                                                        @if($withdrawal->status == \App\Models\Withdrawal::STATUS_PENDING)
                                                      <ul class="nk-tb-actions gx-1">
                                                               
                                                                <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <ul class="link-list-opt no-bdr">
                                                                           
                                                                                 <form method="post" action="{{ route('withdrawals.cancel', ['id' => $withdrawal->id]) }}" id="form1"> 
                                                                                 @csrf
                                                                                
                                                                                </form>
                                                                               
                                                                                 
                                                                                 <li><a href="{{ route('withdrawals.cancel', ['id' => $withdrawal->id]) }}" onclick="event.preventDefault(); document.getElementById('form1').submit()"><em class="icon ni text-danger ni-shield-star"></em><span class=" text-danger ">Cancel</span></a>
                                                                                 </li>
                                                                             
                                                                             </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            @endif
                                                        </td>
                                                    </tr><!-- .nk-tb-item  -->
                                                   
                                                   @empty
                                                 <tr>
                                                <td><span>No Withdrawals Yet</span>
                                                <td>
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
