@extends('layouts.mobile')
@section('content')

<div class="body-content body-content-lg"> <!-- "body-content-lg" add this class if any cards inside this div has "section-to-header" class -->
    <div class="container">
        <!-- Add-card -->
        <div class="add-card section-to-header mb-30">
            <div class="add-card-inner">
                <div class="add-card-item add-card-info">
                    <h3>Total Bonus <br> {{ moneyFormat(auth()->user()->wallet->amount, 'USD') }}</h3>
                </div>
                <div class="add-card-item add-balance" data-bs-toggle="modal" data-bs-target="#addBalance">
                   
                  <a href="#"  data-bs-toggle="modal" data-bs-target="#transfer">Transfer Bonus</a>
                </div>
            </div>
        </div>
        <div class="feature-section mb-15">
            <div class="row gx-3">
                <div class="col-md-12 col-sm-12 pb-15">
                    <div class="feature-card feature-card-red">
                        <div class="feature-card-thumb">
                            <i class="flaticon-income"></i>
                        </div>
                        <div class="feature-card-details">
                            <p>Referral Bonus</p>
                            <h3>{{ moneyFormat(auth()->user()->wallet->bonus, 'USD')}}</h3>
                        </div> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                        <div class="feature-card-details">
                            <p>Task Bonus</p>
                            <h3>{{ moneyFormat(auth()->user()->wallet->bonus, 'USD')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="transaction-section pb-15">
            <div class="section-header">
                <h2>Task Center
                    <hr style="width:100%; color:brown">
                </h2>
               
                <p><small>Once you receive the task, the deadline countdown starts. Complete your task within the deadline to get your reward</small></p>
            </div>

              <div class="feature-section mb-15">
            <div class="row gx-3">
                <div class="col-md-12 col-sm-12 pb-15">
                    <div class="feature-card feature-card-red">
                        <div class="feature-card-thumb">
                            <i class="flaticon-income"></i>
                        </div>
                        
                        <div class="feature-card-details">
                            <div class="col-md-6 col-sm-6">
                            <p style=color:#000>Trade and get reward atleast $50. get $1000 savings trial fund voucher
                            </p> 
                            <p> <small> <small> <a href="#" data-bs-toggle="modal" data-bs-target="#centerModal">View Rules</a></small></small></p>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                          </div><p>0/1 completed</p>
                          
                            <h3></h3><span style=" btn-sm btn-warning"> Reward</span> <span class="btn-warning btn-sm"> 20 USD</span>
                            <p> <small> Expired in 23:23:232</small> <span class="float-end" style="color:green">Active</span></p>
                        </div>
                    </div>

                   

                    <hr>
                </div>
            </div>
        </div>
        </div>


 <!-- Centermodal -->
 <div class="modal fade" id="centerModal" tabindex="-1" aria-labelledby="centerModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="container">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h5 class="modal-title">My Modal</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 class="text-start">Hello World</h3>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of container -->
    </div>
</div>



@endsection