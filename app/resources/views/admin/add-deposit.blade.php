@extends('layouts.admin', ['page_title' => 'Invest'])
@section('content')
    <div class="body-content row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">

                    <dl class="row mb-4 mt-3">
                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Package :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $plan->package->name }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Plan :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $plan->name }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Min Deposit :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ moneyFormat($plan->min_deposit, 'USD') }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Max Deposit :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ moneyFormat($plan->max_deposit, 'USD') }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Profit :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $plan->formatted_profit_rate }}</dd>

                        <dt class="col-9 font-weight-bold" style="font-size: 16px;">Duration :</dt>
                        <dd class="col-3 font-weight-normal" style="font-size: 16px;">{{ $plan->package->formatted_duration }}</dd>
                    </dl>

                    <div class="row">
                        <div class="col-sm-12">
                            <form method="post" action="{{ route('admin.deposits.add', ['id' => $plan->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" name="email"
                                           value="{{ old('email') }}"
                                           class="form-control {{ form_invalid('email') }}" id="inputEmail" placeholder="Enter email address">
                                    @showError('email')
                                </div>

                                <div class="form-group">
                                    <label for="inputUserName">User Name</label>
                                    <input type="text" name="user_name"
                                           value="{{ old('user_name') }}"
                                           class="form-control {{ form_invalid('user_name') }}" id="inputUserName" placeholder="Enter user name">
                                    @showError('user_name')
                                </div>

                                <div class="form-group">
                                    <label for="inputAmount">Amount</label>
                                    <input type="number" name="amount" value="{{ old('amount', $plan->min_deposit) }}" class="form-control {{ form_invalid('amount') }}" id="inputAmount" aria-describedby="AmountHelp" placeholder="Enter amount">
                                    <small id="AmountHelp" class="form-text text-muted">
                                        Deposit amount in USD
                                    </small>
                                    @showError('amount')
                                </div>

                                <div class="form-group">
                                    <label for="inputPaymentMethod">Payment method</label>
                                    <select type="text" class="form-control {{ form_invalid('payment_method') }}" name="payment_method" id="inputPaymentMethod" aria-describedby="paymentMethodHelp">
                                        @foreach(get_payment_methods() as $oKey => $oValue)
                                            <option {{ old('payment_method') == $oKey ? 'selected' : '' }} value="{{ $oKey }}">{{ $oValue }}</option>
                                        @endforeach
                                    </select>
                                    <small id="AmountHelp" class="form-text text-muted">
                                        Select deposit payment method
                                    </small>
                                    @showError('payment_method')
                                </div>

                                <button type="submit" class="btn btn-primary">Invest Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
