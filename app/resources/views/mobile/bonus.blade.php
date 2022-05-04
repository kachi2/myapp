@extends('layouts.mobile')
@section('content')

<div class="body-content body-content-lg"> <!-- "body-content-lg" add this class if any cards inside this div has "section-to-header" class -->
    <div class="container">
        <!-- Add-card -->
        <div class="add-card section-to-header mb-30">
            <div class="add-card-inner">
                <div class="add-card-item add-card-info">
                    <h3>Total Bonus <br> {{ moneyFormat(auth()->user()->wallet->bonus, 'USD') }}</h3>
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
          @forelse ($tasks as $task)
            <div class="row gx-3">
                <div class="col-md-12 col-sm-12">
                    <div  style="align-items:initial; box-shadow:none" class="feature-card feature-card-red">
                        <div class="feature-card-thumb">
                            <i class="flaticon-income"></i>
                        </div>
                        
                        <div class="feature-card-details">
                            <div class="col-md-6 col-sm-6">
                            <p style=color:#000>{{$task->name}} <a href="" style="font-size:9px" class="btn-primary p-1 float-end">@if($task->is_clicked)running @else @if($task->status == null)Start Task @else Closed @endif  @endif </a>
                            </p> 
                            <p> <small> <a href="#" data-bs-toggle="modal" data-bs-target="#centerModal{{$task->id}}">View Rules</a></small></p>
                        </div>
                        <div class="progress" style="height: 5px; width:50%">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:@if($task->is_clicked)5% @else 0% @endif "></div>
                          </div><p>@if($task->is_clicked) initiated @else  @endif</p> 
                          
                            <p><span style=" btn-sm btn-warning"> Reward</span> <span class="btn-warning p-1"> {{$task->reward}} USD</span> </p>
                            <p> <small> Expired in {{$task->expires}}</small> <span class="float-end" style="color:green">@if($task->status == null)Active</span>@else <span class="p-1" style="color:#fff; background:rgb(208, 208, 212)">Expired</span> @endif</p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Centermodal -->
 <div class="modal fade" id="centerModal{{$task->id}}" tabindex="-1" aria-labelledby="centerModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="container">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h5 class="modal-title">Task Rule</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">{{$task->rules}}</p>
                </div>
            </div>
        </div>
    </div>
</div>   <hr>
<!-- end of container -->
            @empty

            <div class="row gx-3">
                <div class="col-md-12 col-sm-12">
                    <div  style="align-items:initial; box-shadow:none" class="feature-card feature-card-red">
                        <div class="feature-card-thumb">
                            <i class="flaticon-income"></i>
                        </div>
                        
                        <div class="feature-card-details">
                            <div class="col-md-6 col-sm-6">
                            <p style=color:#000>You dont have any task yet. check back later
                            </p> 
                         </div>
                    </div>
                </div>
            </div>
                
            @endforelse
            {{-- ///////// --}}
         
        </div>
        </div>


 
    </div>
</div>



@endsection