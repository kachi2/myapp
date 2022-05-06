@extends('layouts.mobile')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="carousel-section pb-15">
            <h3 class="block-text mb-10">Coins Prices and Stats</h3>
            <div class="basic-carousel owl-carousel owl-theme mb-30">
                @foreach ( $coins as $coin)
                <div class="item">
                    <div class="monthly-bill-card monthly-bill-card-green">
                        <div class="monthly-bill-body">
                            <h3><a href="#">Envato.com</a></h3>
                            <p>Debit Services Subscribtion</p>
                        </div>
                        <div class="monthly-bill-footer monthly-bill-action">
                            <a href="#" class="btn main-btn">Pay Now</a>
                            <p class="monthly-bill-price">$99.99</p>
                        </div>
                    </div>
                </div>  
                @endforeach
            </div>
        </div>

        @foreach ($coins as $coin )
        <div class="transaction-section pb-1">
            <div class="transaction-card mb-1">
                <a href="transaction-details.html">
                    <div class="transaction-card-info">
                        <div class="transaction-info-thumb">
                            <img src="{{$coin['image']}}" alt="user">
                        </div>
                        <div class="transaction-info-text">
                            <h3>Brenda Davis</h3>
                            <p>Transfer</p>
                        </div>
                    </div>
                    <div class="transaction-card-det negative-number">
                        -$185.00
                    </div>
                </a>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection