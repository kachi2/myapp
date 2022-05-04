@extends('layouts.mobile')
@section('content')


<div class="body-content body-content-lg"> <!-- "body-content-lg" add this class if any cards inside this div has "section-to-header" class -->
    <div class="container">
        <!-- Add-card -->
        <div class="add-card section-to-header mb-30">
            <div class="add-card-inner">
                <div class="add-card-item add-card-info">
                    <h3></h3>
                    <p></p>
                   
                    <p> Paymennt Ref:<span class="btn-success p-1">{{$plan->ref}}</span>  <span class="float-end btn-warning p-1">  {{$plan->payment_method}} </span></p>
                     <p>Expires: {{$plan->expires_at->diffForHumans()}}  @if($plan->status == 1) <small class="float-end p-1 btn-info" > completed </small> @else <small class="float-end p-1 btn-info" > Active</small> @endif </p>
                    <p> <span class=""> Date Created: {{$plan->created_at}} </span> <span class=""></span></p>

                </div>
            </div>
        </div>
        <div class="feature-section mb-15">
            <div class="row gx-3">
                <div class="col col-sm-6 pb-15">
                    <div class="feature-card feature-card-blue">
                        <div class="feature-card-thumb">
                            <i class="flaticon-expenses"></i>
                        </div>
                        <div class="feature-card-details">
                            <p>Total Payouts</p>
                            <h3>{{number_format($sum,2)}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6 pb-15">
                    <div class="feature-card feature-card-violet">
                        <div class="feature-card-thumb">
                            <i class="flaticon-invoice"></i>
                        </div>
                        <div class="feature-card-details">
                            <p>Pending Payouts</p>
                            <h3>{{number_format($plan->paid_amount - $sum,2)}}</h3>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="transaction-section pb-15">
            <div class="section-header">
                <h2>Payouts</h2>
            </div>
            @forelse ($payouts as $invst )
            <div class="transaction-card mb-15">
                <a href="transaction-details.html">
                    <div class="transaction-card-info">
                        <div class="transaction-info-text">
                            <p>{{$invst->ref}}</p>
                        </div>
                    </div>
                    <div class="transaction-card-det ">
                        <span style="color:green"><i class="flaticon-income"> </i>{{moneyFormat($invst->amount, 'USD')}}</span><br> 
                    </div>
                </a>
            </div>
            @empty
            @endforelse
        </div>
        
@endsection
