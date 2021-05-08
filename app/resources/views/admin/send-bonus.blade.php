@extends('layouts.admin', ['page_title' => 'Send User Bonus'])
@section('content')
    <div class="body-content row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mt-3">
                        <img src="{{ $user->photo_url }}" alt={{ $user->username }}""
                             class="img-thumbnail" />
                        <h5 class="mt-2 mb-0">{{ $user->name }}</h5>
                        <h6 class="text-muted font-weight-normal mt-1 mb-0">{{ '@' }}{{ $user->username }}</h6>
                        <h6 class="text-muted font-weight-normal mt-2 mb-4">{{ $user->location }}</h6>
                        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-primary btn-sm mr-1">Edit</a>
                    </div>

                    <!-- profile  -->
                    <div class="mt-5 pt-2 border-top">
                        <h4 class="mb-3 font-size-15">About</h4>
                        <p class="text-muted mb-4">{{ $user->about }}</p>
                    </div>
                    <div class="mt-3 pt-2 border-top">
                        <h4 class="mb-3 font-size-15">Contact Information</h4>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0 text-muted">
                                <tbody>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td>{{ $user->location }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Registered At</th>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mb-xl-5"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <form method="post" action="{{ route('admin.users.send_bonus', ['id' => $user->id]) }}">
                                @csrf

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
                                        @forelse($packages as $package)
                                            @foreach($package->plans as $plan)
                                                <option {{ old('plan') == $plan->id ? 'selected' : '' }} value="{{ $plan->id }}">
                                                    {{ $plan->formatted_name }} {{ moneyFormat($plan->min_deposit, 'USD') }} - {{ moneyFormat($plan->max_deposit, 'USD') }}
                                                </option>
                                            @endforeach

                                            @empty
                                            <option>No Plan Yet</option>
                                        @endforelse
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
