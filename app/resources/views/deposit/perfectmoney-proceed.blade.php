@extends('layouts.app', ['page_title' => 'Proceed Investment'])
@section('content')
    <div class="body-content row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h6 class="header-title mb-0 pb-3">
                        Click proceed to continue the transaction
                    </h6>
                    <dl class="row mb-4 mt-3">
                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Package :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->plan->package->name }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Plan :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->plan->name }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Profit :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->plan->formatted_profit_rate }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Duration :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $deposit->plan->package->formatted_duration }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Amount :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ moneyFormat($deposit->amount, 'USD') }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Fee :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ moneyFormat($deposit->fee, 'USD') }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Total :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ moneyFormat($deposit->verifying_amount, 'USD') }}</dd>
                    </dl>

                    <div class="row">
                        <div class="col-sm-12">
                            {!! $proceed_form !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
