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
        <div class="transaction-section pb-15">
            <div class="section-header">
                <h2>Task Center
                    <hr style="width:100%; color:brown">
                </h2>
               
                <p><small>Once you receive the task, the deadline countdown starts. Complete your task within the deadline to get your reward</small></p>
            </div>

      <div class="feature-section mb-15">
            <div class="row gx-3">
                <div class="col-md-12 col-sm-12">
                    <div  style="align-items:initial; box-shadow:none" class="feature-card feature-card-red">
                        <div class="feature-card-thumb">
                            <i class="flaticon-income"></i>
                        </div>
                        
                        <div class="feature-card-details">
                            <div class="col-md-6 col-sm-6">
                            <p style=color:#000>Trade and get reward atleast $50. get $1000 savings trial fund voucher
                            </p> 
                            <p> <small> <a href="#" data-bs-toggle="modal" data-bs-target="#centerModal">View Rules</a></small></p>
                        </div>
                        <div class="progress" style="height: 5px; width:50%">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 1%"></div>
                          </div><p>0/1 completed</p>
                          
                            <p><span style=" btn-sm btn-warning"> Reward</span> <span class="btn-warning p-1"> 20 USD</span> </p>
                            <p> <small> Expired in 23:23:232</small> <span class="float-end" style="color:green">Active</span></p>
                        </div>
                    </div>
                </div>
            </div>


            {{-- ///////// --}}
            <hr>
            <div class="row gx-3">
                <div class="col-md-12 col-sm-12">
                    <div  style="align-items:initial;box-shadow:none" class="feature-card feature-card-red">
                        <div class="feature-card-thumb">
                            <i class="flaticon-income"></i>
                        </div>
                        
                        <div class="feature-card-details">
                            <div class="col-md-6 col-sm-6">
                            <p style=color:#000>Trade and get reward atleast $50. get $1000 savings trial fund voucher
                            </p> 
                            <p> <small> <a href="#" data-bs-toggle="modal" data-bs-target="#centerModal">View Rules</a></small></p>
                        </div>
                        <div class="progress" style="height: 5px; width:50%">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                          </div><p>0/1 completed</p>
                          
                          <p><span style=" btn-sm btn-warning"> Reward</span> <span class="btn-warning p-1"> 20 USD</span> </p>
                          <p> <small> Expired in 23:23:232</small> <span class="float-end" style="color:green">Active</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>



@endsection