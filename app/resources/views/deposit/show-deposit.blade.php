@extends('layouts.app', ['page_title' => 'Deposit: ' . $deposit->ref])
@section('content')
    <div class="body-content row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <dl class="row mb-4 mt-3">
                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Ref :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->ref }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Package :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->plan->package->name }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Plan :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->plan->name }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Amount :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->amount }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Profit :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->profit }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Paid :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->paid_amount }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Payment Method :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->formatted_payment_method }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Profit Rate :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->formatted_profit_rate }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Duration :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->formatted_duration }}</dd>


                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Status :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">
                            @if( $deposit->status == \App\Models\Deposit::STATUS_COMPLETED)
                                <span class="badge badge-pill badge-success">Completed</span>
                            @elseif ($deposit->status == \App\Models\Deposit::STATUS_CANCELED)
                                <span class="badge badge-pill badge-warning">Canceled</span>
                            @else
                                <span class="badge badge-pill badge-success">Active</span>
                            @endif
                        </dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Date :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->created_at }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">expires At :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->expires_at->diffForHumans() }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
