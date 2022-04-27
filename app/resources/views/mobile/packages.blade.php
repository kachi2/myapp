<!-- Body-content -->
@extends('layouts.mobile')
@section('content')

<div class="body-content body-content-lg"> <!-- "body-content-lg" add this class if any cards inside this div has "section-to-header" class -->
    <div class="container">

<div class="monthly-bill-section pb-15">
    <div class="section-header">
        <h2>Investment Packages
            <br>
            <small style="font-size:12px; font-weight:200">  Select Investment Plan that suits your saving plans</small>
        </h2>
        
    </div>
    <div class="row gx-3">

        @forelse($packages as $package)
        @foreach($package->plans as $plan)
        <div class="col-6 pb-15">
            <div class="monthly-bill-card monthly-bill-card-green">
                <div class="monthly-bill-thumb">
                    <img src="{{asset('/mobile/images/cm-logo-1.png')}}" alt="logo">
                </div>
                <div class="monthly-bill-body">
                    <h3><a href="{{ route('deposits.invest', ['id' => encrypt($plan->id)]) }}">{{ $plan->name }}</a></h3>
                    <p>invest  and earn {{ $plan->profit_rate }}% interest Daily for 7 Days.</p>
                    <p>(Min Deposit: {{ moneyFormat($plan->min_deposit, 'USD') }} | Max Deposit: {{ moneyFormat($plan->max_deposit, 'USD') }}).</p>
                </div>
                <div class="monthly-bill-footer monthly-bill-action">
                    <a href="{{ route('deposits.invest', ['id' => encrypt($plan->id)]) }}" class="btn main-btn">Pay Now</a>
                    <p class="monthly-bill-price">{{ $plan->profit_rate }}% Daily</p>
                </div>
            </div>
        </div>
        @endforeach
        @empty
         @endforelse 
        
        
    </div>
</div>

<div class="saving-goals-section pb-15">
    <div class="section-header">
        <h2>Top Invested Plans
            <br>
            <small style="font-size:12px; font-weight:200">  Weekly top investment plans</small>
        </h2>
    </div>
    <div class="progress-card progress-card-red mb-15">
        <div class="progress-card-info">
            <div class="circular-progress" data-note="50.85">
                <svg width="55" height="55" class="circle-svg">
                    <circle cx="28" cy="27" r="25" class="circle-progress circle-progress-path"></circle>
                    <circle cx="28" cy="27" r="25" class="circle-progress circle-progress-fill"></circle>
                </svg>
                <div class="percent">
                    <span class="percent-int">0</span>%
                </div>
            </div>
            <div class="progress-info-text">
                <h3>New Gadget</h3>
                <p>Lifestyle</p>
            </div>
        </div>
        <div class="progress-card-amount">$250.00</div>
    </div>
    <div class="progress-card progress-card-blue mb-15">
        <div class="progress-card-info">
            <div class="circular-progress" data-note="25">
                <svg width="55" height="55" class="circle-svg">
                    <circle cx="28" cy="27" r="25" class="circle-progress circle-progress-path"></circle>
                    <circle cx="28" cy="27" r="25" class="circle-progress circle-progress-fill"></circle>
                </svg>
                <div class="percent">
                    <span class="percent-int">0</span>%
                </div>
            </div>
            <div class="progress-info-text">
                <h3>New Apartment</h3>
                <p>Living</p>
            </div>
        </div>
        <div class="progress-card-amount">$5000.00</div>
    </div>
    <div class="progress-card progress-card-green mb-15">
        <div class="progress-card-info">
            <div class="circular-progress" data-note="75">
                <svg width="55" height="55" class="circle-svg">
                    <circle cx="28" cy="27" r="25" class="circle-progress circle-progress-path"></circle>
                    <circle cx="28" cy="27" r="25" class="circle-progress circle-progress-fill"></circle>
                </svg>
                <div class="percent">
                    <span class="percent-int">0</span>%
                </div>
            </div>
            <div class="progress-info-text">
                <h3>Education</h3>
                <p>Lifestyle</p>
            </div>
        </div>
        <div class="progress-card-amount">$1250.00</div>
    </div>
</div>
</div>
</div>


@endsection