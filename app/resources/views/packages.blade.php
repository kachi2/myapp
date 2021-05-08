@extends('layouts.app')

@section('content')
<div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                <div class="nk-block-head-content text-center">
                                    <h4 class="nk-block-title fw-normal">Select Investment Package</h4>
                                   
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="card card-custom-s1 ">
                                    <div class="row no-gutters">
                                    @forelse($packages as $package)
                                        @foreach($package->plans as $plan)
                                        <div class="col-lg-4">
                                            <div class="card-inner-group h-100 card-bordered">
                                                <div class="card-inner">
                                                     <center>  <h6>{{ $plan->package->name }} ({{ $plan->name }})</h6></center>
                                                   <center> <h5 class="btn btn-light" style="margin-top:20px"> {{ $plan->profit_rate }}% / {{ $plan->package->formatted_payment_period_alt }}</h5></center>
                                               </div>
                                                <div class="card-inner">
                                                    <ul class="list list-step">
                                                        <li class="list-step-done">Minimum Deposit: {{ moneyFormat($plan->min_deposit, 'USD') }}</li>
                                                        <li class="list-step-done">Maximum Deposit: {{ moneyFormat($plan->max_deposit, 'USD') }}</li>
                                                        <li class="list-step-done">Automatic Withdrawal</li>
                                                        <li class="list-step-done">24x7 Support</li>
                                                    </ul>
                                                </div>
                                                <div class="card-inner">
                                                    <div class="align-center gx-3">
                                                        <div class="flex-item">
                                                            <div  style="width:50px">
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="flex-item">
                                                            <a href="{{ route('deposits.invest', ['id' => $plan->id]) }}" class="btn btn-primary">Select Package</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                             @endforeach
                                        @empty
                                         @endforelse 
                                        <!-- .col -->
                                        <!-- .col -->
                                    </div><!-- .row -->
                                </div><!-- .card -->
                            </div><!-- .nk-block -->
                           
                        </div>
                    </div>
                </div>

@endsection