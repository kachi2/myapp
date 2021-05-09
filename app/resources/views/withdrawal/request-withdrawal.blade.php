@extends('layouts.app')
@section('content')

    <div class="body-content row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">

                    <dl class="row mb-4 mt-3">
                        <dt class="col-sm-9 font-weight-bold">Account Balance :</dt>
                        <dd class="col-sm-3 font-weight-normal">{{ moneyFormat($balance, 'USD') }}</dd>

                        <dt class="col-sm-9 font-weight-bold">Pending Withdrawals :</dt>
                        <dd class="col-sm-3 font-weight-normal">{{ moneyFormat($pending_withdrawals, 'USD') }}</dd>
                    </dl>

                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="nav nav-pills navtab-bg nav-justified">
                                <li class="nav-item">
                                    <a href="{{ tab_url('crypto') }}"
                                       class="nav-link {{ is_tab('crypto', true) ? 'active' : '' }}">
                                        <span>Crypto</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ tab_url('perfect-money') }}"
                                       class="nav-link {{ is_tab('perfect-money') ? 'active' : '' }}">
                                        <span>Perfect Money</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content text-muted" style="margin-top: 10px;">
                                <div class="tab-pane {{ is_tab('crypto', true) ? 'show active' : '' }}" id="crypto">
                                    <form method="post" action="{{ route('withdrawals.request', ['tab' => 'crypto']) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputPaymentMethod">Payment method</label>
                                            <select type="text" class="form-control {{ form_invalid('payment_method') }}" name="payment_method" id="inputPaymentMethod" aria-describedby="paymentMethodHelp">
                                                @foreach(get_withdrawal_methods() as $oKey => $oValue)
                                                    @if($oKey == 'wallet')
                                                            <option style="display: none;" {{ old('payment_method') == $oKey ? 'selected' : '' }} value="{{ $oKey }}">{{ $oValue }}</option>
                                                    @else
                                                        <option {{ old('payment_method') == $oKey ? 'selected' : '' }} value="{{ $oKey }}">{{ $oValue }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <small id="paymentMethodHelp" class="form-text text-muted">
                                                Select Withdrawal payment method
                                            </small>
                                            @showError('payment_method')
                                        </div>
                                        <div class="form-group">
                                            <label for="inputWalletAddress">Wallet address</label>
                                            <input type="text" name="wallet_address"
                                                   value="{{ old('wallet_address') }}"
                                                   class="form-control {{ form_invalid('wallet_address') }}" id="inputWalletAddress" aria-describedby="walletAddressHelp" placeholder="Enter address">
                                            <small id="walletAddressHelp" class="form-text text-muted">
                                                your wallet address
                                            </small>
                                            @showError('wallet_address')
                                        </div>

                                        <div class="form-group">
                                            <label for="inputBitcoinAmount">Amount</label>
                                            <input type="number" name="amount"
                                                   value="{{ old('amount') }}"
                                                   class="form-control {{ is_tab('bitcoin', true) ? form_invalid('amount') : '' }}" id="inputBitcoinAmount" aria-describedby="BitcoinAmountHelp" placeholder="Enter amount" step="0.01">
                                            <small id="BitcoinAmountHelp" class="form-text text-muted">
                                                withdrawal amount in USD
                                            </small>
                                            @if(is_tab('bitcoin', true))
                                                @showError('amount')
                                            @endif
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <div class="tab-pane {{ is_tab('perfect-money') ? 'show active' : '' }}" id="perfect-money">
                                    <form method="post" action="{{ route('withdrawals.request', ['tab' => 'perfect-money']) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputPmAccountId">PM Account ID</label>
                                            <input type="text" name="pm_account_id"
                                                   value="{{ old('pm_account_id') }}"
                                                   class="form-control {{ form_invalid('pm_account_id') }}" id="inputPmAccountId" aria-describedby="PmAccountIdHelp" placeholder="Enter Account Id">
                                            <small id="PmAccountIdHelp" class="form-text text-muted">
                                                your perfect money account id
                                            </small>
                                            @showError('pm_account_id')
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPmAmount">Amount</label>
                                            <input type="number" name="amount"
                                                   value="{{ old('amount') }}"
                                                   class="form-control {{ is_tab('perfect-money') ? form_invalid('amount') : '' }}" id="PmAmountHelp" aria-describedby="BitcoinAmountHelp" placeholder="Enter amount" step="0.01">
                                            <small id="PmAmountHelp" class="form-text text-muted">
                                                withdrawal amount in USD
                                            </small>
                                            @if(is_tab('perfect-money'))
                                                @showError('amount')
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
