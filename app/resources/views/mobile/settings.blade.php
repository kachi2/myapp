@extends('layouts.mobile')
@section('content')
<div class="body-content">
    <div class="container">
        <!-- Setting -->
        <div class="setting-section pb-15">
            <div class="user-setting-thumb">
                <div class="user-setting-thumb-up">
                    <img src="{{asset('/mobile/images/profile.png')}}"alt="profile">
                </div>
                <p><span class="" style="font-size:12px; color:#32CD32; font-weight:bolder"> <i class="flaticon-check"> </i> Verified</span></p>
            </div>

            <!-- Setting-list -->
            <p class="pb-2"></p>
            
            <div class="setting-list">
                <ul>
                    <li>
                         <a href="#" > Username <span style="padding-left:50%">{{$user->username}} </span> </a>
                    </li>
                    <li>
                        <a href="#" >Name <span style="padding-left:50%;">{{$user->first_name .' '.$user->last_name }} </span> </a>
                   </li>
                    <li>
                        <a href="#" > Email <span style="padding-left:50%">{{$user->email}} </span>  </a>
                    </li>
                    <li>
                        <a href="#" > Phone <span style="padding-left:50%">{{$user->phone}} </span> </a>
                    </li>
                    <li>
                        <a href="#" >City <span style="padding-left:50%">{{$user->city}} </span></a>
                    </li>
                    <li>
                        <a href="#" >State <span style="padding-left:50%">{{$user->state}}</span></a>
                    </li>
                    <li>
                        <a href="#" >Country <span style="padding-left:50%">{{$user->country}} </span> </a>
                    </li>
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#passwordModal">Change Password</a>
                    </li>
                    <li>
                        <a href="#"  data-bs-toggle="modal" data-bs-target="#updatedetails">Update Account Details  </a>
                    </li>
                </ul>
            </div>
            
           
             <form method="post" action="{{ route('setting.profile') }}" enctype="multipart/form-data">
                @csrf
            <div class="modal fade" id="updatedetails" tabindex="-1" aria-labelledby="addressModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="container">
                            <div class="modal-header">
                                <div class="modal-header-title">
                                    <h5 class="modal-title">Update Details</h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group mb-15">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}" placeholder="Enter First name">
                                    </div>
                                    <div class="form-group mb-15">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}" placeholder="Enter last name">
                                    </div>
                                    <div class="form-group mb-15">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control"  value="{{$user->phone}} "placeholder="Enter Phone">
                                    </div>
                                    
                                    <div class="form-group mb-15">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" value="{{$user->city}}" placeholder="Enter City">
                                    </div>

                                    <div class="form-group mb-15">
                                        <label class="form-label">State</label>
                                        <input type="text" name="state" class="form-control"  value="{{$user->state}}" placeholder="Enter State">
                                    </div>
                                    <div class="form-group mb-15">
                                        <label class="form-label">Country</label>
                                        <input type="text" name="country" class="form-control" value="{{$user->country}}" placeholder="Enter Country">
                                    </div>
                                    <button type="submit"  class="btn main-btn main-btn-lg full-width">Update Address</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             </form>
             <form method="post" action="{{ route('setting.password') }}">
                @csrf
             <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="container">
                            <div class="modal-header">
                                <div class="modal-header-title">
                                    <h5 class="modal-title">Change Password</h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group pb-15">
                                        <label>Current Password</label>
                                        <div class="input-group">
                                            <input type="password" name="old_password"
                                            value="{{ old('old_password') }}"
                                            class="form-control {{ form_invalid('old_password') }} password" id="inputOldPassword" placeholder="Enter old password">
                                        @showError('old_password') 
                                           <span class="input-group-text reveal">
                                                <i class="flaticon-invisible pass-close"></i>
                                                <i class="flaticon-visibility pass-view"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group pb-15">
                                        <label>New Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password"
                                                value="{{ old('password') }}"
                                               class="form-control {{ form_invalid('password') }} passsword " id="inputNewPassword" placeholder="Enter new password">
                                                @showError('password')
                                                <span class="input-group-text reveal">
                                                <i class="flaticon-invisible pass-close"></i>
                                                <i class="flaticon-visibility pass-view"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn main-btn main-btn-lg full-width">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             </form>
            <!-- Setting-list -->
        </div>
        <!-- Setting -->
    </div>
</div>
@endsection