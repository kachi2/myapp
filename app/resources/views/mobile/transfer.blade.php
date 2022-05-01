@extends('layouts.mobile')
@section('content')

<div class="body-content body-content-lg"> <!-- "body-content-lg" add this class if any cards inside this div has "section-to-header" class -->
    <div class="container">
        <!-- Add-card -->
        <div class="add-card section-to-header mb-30">
            <div class="add-card-inner">
                <div class="add-card-item add-card-info">
                    <h3>Main Wallet <br> {{ moneyFormat(auth()->user()->wallet->amount, 'USD') }}</h3>
                    
                </div>
                <div class="add-card-item add-balance" data-bs-toggle="modal" data-bs-target="#addBalance">
                   
                  <a href="#"  data-bs-toggle="modal" data-bs-target="#transfer">Transfer Funds</a>
                </div>
            </div>
        </div>
        <div class="feature-section mb-15">
            <div class="row gx-3">
                <div class="col-md-12 col-sm-12 pb-15">
                    <div class="feature-card feature-card-red">
                        <div class="feature-card-thumb">
                            <i class="flaticon-income"></i>
                        </div>
                        <div class="feature-card-details">
                            <p>Total Transferred</p>
                            <h3>{{ moneyFormat(auth()->user()->wallet->bonus, 'USD')}}</h3>
                        </div> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                        <div class="feature-card-details">
                            <p>Total Received</p>
                            <h3>{{ moneyFormat(auth()->user()->wallet->bonus, 'USD')}}</h3>
                        </div>
                    </div>
                </div>
               
                
            </div>
        </div>

        <div class="transaction-section pb-15">
            <div class="section-header">
                <h2>Recent Transfers</h2>
            </div>
            @forelse ($transfers as $transfer )
            <div class="transaction-card mb-15">
                <a href="transaction-details.html">
                    <div class="transaction-card-info">
                        <div class="transaction-info-thumb" style="border-radius: 100%">
                            <span class="text-white" style="font-size:15px"></span>
                        </div>
                        <div class="transaction-info-text">
                            <h3>Ref:{{$transfer->receiver->username}}<small> <br>{{$transfer->created_at->format('d/m/y h:s A')}}</small>
                            </h3>
                            <p> <div class="dot dot-success d-md-none"></div>
                                @if( $withdrawal->status == \App\Models\Withdrawal::STATUS_PAID)
                               <span class="btn-success p-1 " style="font-size:12px">Completed</span>
                               @elseif ($withdrawal->status == \App\Models\Withdrawal::STATUS_CANCELED)
                               <span class="btn-danger p-1" style="font-size:12px">Cancelled</span>
                               @else
                                <span class="btn-warning p-1" style="font-size:12px">Pending</span>
                               @endif </small></p>
                        </div>
                    </div>
                    <div class="transaction-card-det ">
                        <span class="positive-number">{{ moneyFormat($transfer->amount, 'USD') }}</span><br> 
                       <small class="positive-number">{{ moneyFormat($transfer->sender_balance, 'USD') }}<small>
                    </div>
                </a>
            </div>
            @empty
            <div class="transaction-card mb-15">
                <a href="transaction-details.html">
                    <div class="transaction-card-info">
                        <div class="transaction-info-thumb" style="border-radius: 100%">
                            <span class="text-white" style="font-size:15px"></span>
                        </div>
                        <div class="transaction-info-text">
                            <h3>No Transfer found</small>
                            </h3>
                            
                        </div>
                    </div>
                    
                </a>
            </div>
            @endforelse
        </div>

        <form method="post" action="{{ route('withdrawals.request', ['tab' => 'crypto']) }}">
            @csrf
        <div class="modal fade" id="transfer" tabindex="-1" aria-labelledby="passwordModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="container">
                        <div class="modal-header">
                            <div class="modal-header-title">
                                <h5 class="modal-title">Transfer funds</h5>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                                <div class="form-group pb-15">
                                    <label>Amount</label>
                                    <div class="input-group">
                                        <input type="text"  type="number" name="amount"   value="{{ old('amount') }}"class="form-control {{ is_tab('bitcoin', true) ? form_invalid('amount') : '' }}" required placeholder="100">
                                        
                                    </div>
                                    @if(is_tab('bitcoin', true))
                                    @showError('amount')
                                @endif
                                </div>
                                <div class="form-group pb-15">
                                    <label>Username</label>
                                    <div class="input-group">
                                        <input type="text" name="username" value="{{ old('username') }}"class="form-control {{ form_invalid('username') }}" required placeholder="Enter Username">
                                        
                                    </div>
                                    @if(is_tab('bitcoin', true))
                                    @showError('username')
                                @endif
                                </div>
                                <button type="submit" class="btn main-btn main-btn-lg full-width">Initiate Transfer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<!-- end of container -->
    </div>
</div>




@endsection
