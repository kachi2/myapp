@extends('layouts.app', ['page_title' => 'Pay To Address'])
@section('content')
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h6 class="header-title mb-0 pb-3">
                        Pay ( {{$deposit->verifying_amount}} BTC ) to the given wallet address
                    </h6>
                    <div class="row mb-4 mt-3">
                        <div class="col-12">
                            <div class="card-img" style="width: 100%" align="center">
                                <img src="{!! $qrcode !!}" alt="{{ $deposit->token }}">                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form method="post" action="{{ route('deposits.invest', ['id' => $plan->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputAmount">Payment Address</label>
                                    <input type="text" value="{{ $deposit->token }}" class="form-control" id="inputAmount">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
