@extends('layouts.admin', ['page_title' => 'Send Users Bonus'])
@section('content')
    <div class="body-content row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <form method="post" action="{{ route('admin.users.send_users_bonus') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="inputRecipients">Recipients</label>
                                    <select name="recipients" id="inputRecipients" class="form-control {{ form_invalid('recipients') }}"
                                            style="border-radius: 0 !important;">

                                        <option value="all" {{ old('recipients') == 'all' ? 'selected' : ''}}>All Users</option>
                                        <option value="deposited" {{ old('recipients') == 'deposited' ? 'selected' : ''}}>
                                            Deposited Users
                                        </option>
                                        <option
                                            value="non-deposited" {{ old('recipients') == 'non-deposited' ? 'selected' : ''}}>
                                            Non-Deposited Users
                                        </option>

                                    </select>
                                    @showError('recipients')
                                </div>

                                <div class="form-group">
                                    <label for="inputPaymentMethod">Currency</label>
                                    <select type="text" class="form-control {{ form_invalid('payment_method') }}" name="payment_method" id="inputPaymentMethod" aria-describedby="paymentMethodHelp">
                                        @foreach(get_payment_methods() as $oKey => $oValue)
                                            @if($oKey != 'wallet')
                                                <option {{ old('payment_method') == $oKey ? 'selected' : '' }} value="{{ $oKey }}">{{ $oValue }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <small id="paymentMethodHelp" class="form-text text-muted">
                                        Select deposit payment method
                                    </small>
                                    @showError('payment_method')
                                </div>

                                <div class="form-group">
                                    <label for="inputAmount">Amount</label>
                                    <input type="number" name="amount" value="{{ old('amount') }}" class="form-control {{ form_invalid('amount') }}" id="inputAmount" aria-describedby="AmountHelp" placeholder="Enter amount">
                                    <small id="AmountHelp" class="form-text text-muted">
                                        Deposit amount in USD
                                    </small>
                                    @showError('amount')
                                </div>

                                <div class="form-group">
                                    <label for="inputPlan">Plan (optional)</label>
                                    <select id="inputPlan" name="plan"
                                            class="form-control {{ form_invalid('plan') }}" aria-describedby="PlanHelp">
                                        <option>Select Plan</option>
                                        @foreach($plans as $plan)
                                            <option {{ old('plan') == $plan->id ? 'selected' : '' }} value="{{ $plan->id }}">
                                                {{ $plan->formatted_name }} {{ moneyFormat($plan->min_deposit, 'USD') }} - {{ moneyFormat($plan->max_deposit, 'USD') }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @showError('plan')
                                    <small id="PlanHelp" class="form-text text-muted">
                                        Select plan to invest the bonus on
                                    </small>
                                </div>

                                <div class="form-group checkbox">
                                    <div class="form-check">
                                        <input name="notify" class="form-check-input {{ form_invalid('notify') }}" {{ old('notify') ? 'checked' : '' }} type="checkbox" id="inputNotify">
                                        <label class="form-check-label" for="inputNotify">
                                            Send the email notification
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Send Bonus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
