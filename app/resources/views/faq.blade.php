@extends('layouts.landing', ['page_title' => 'Faq', 'heading' => 'Faq', 'sub_heading' => 'Enjoy real benefits and rewards on your accrue mining.'])
@section('content')
@include('partials.landing-header')
    <!-- Banner Area Starts -->
        <section class="banner-area">
            <div class="banner-overlay">
                <div class="banner-text text-center">
                    <div class="container">
                        <!-- Section Title Starts -->
                        <div class="row text-center">
                            <div class="col-xs-12">
                                <!-- Title Starts -->
                                <h2 class="title-head">Frequenty Asked <span>Questions</span></h2>
                                <!-- Title Ends -->
                                <hr>
                                <!-- Breadcrumb Starts -->
                                <ul class="breadcrumb">
                                    <li><a href="/"> home</a></li>
                                    <li>faq</li>
                                </ul>
                                <!-- Breadcrumb Ends -->
                            </div>
                        </div>
                        <!-- Section Title Ends -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Area Ends -->
        <!-- Section FAQ Starts -->
        <section class="faq">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <!-- Panel Group Starts -->
                        <div class="panel-group" id="accordion">
                            <!-- Panel Starts -->
                            <div class="panel panel-default">
                                <!-- Panel Heading Starts -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                            How can I invest with {{config('app.name')}} ?</a>
                                    </h4>
                                </div>
                                <!-- Panel Heading Ends -->
                                <!-- Panel Content Starts -->
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">To make a investment you must first become a member of {{config('app.name')}} . Once you are signed up, you can make your first deposit. All deposits must be made through the user dash board Area. You can login using the member username and password you receive when signup.</div>
                                </div>
                                <!-- Panel Content Starts -->
                            </div>
                            <!-- Panel Ends -->
                            <!-- Panel Starts -->
                            <div class="panel panel-default">
                                <!-- Panel Heading Starts -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                            I wish to invest with {{config('app.name')}} but I don't have an any ecurrency account. What should I do?</a>
                                    </h4>
                                </div>
                                <!-- Panel Heading Ends -->
                                <!-- Panel Content Starts -->
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">You can open a free Bitcoin account here: <a href="https://www.luno.com/">www.luno.com</a></div>
                                </div>
                                <!-- Panel Content Starts -->
                            </div>
                            <!-- Panel Ends -->
                            <!-- Panel Starts -->
                            <div class="panel panel-default">
                                <!-- Panel Heading Starts -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                            How do I open my {{config('app.name')}} Account?</a>
                                    </h4>
                                </div>
                                <!-- Panel Heading Ends -->
                                <!-- Panel Content Starts -->
                                <div id="collapse3" class="panel-collapse collapse">
                                    <div class="panel-body">It's quite easy and convenient. Click <a href="register.html">here</a> to get started, fill in the registration form and then press "Register". </div>
                                </div>
                                <!-- Panel Content Starts -->
                            </div>
                            <!-- Panel Ends -->
                            <!-- Panel Starts -->
                            <div class="panel panel-default">
                                <!-- Panel Heading Starts -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                            How can I withdraw funds?</a>
                                    </h4>
                                </div>
                                <!-- Panel Heading Ends -->
                                <!-- Panel Content Starts -->
                                <div id="collapse4" class="panel-collapse collapse">
                                    <div class="panel-body">Login to your account using your username and password and check the Withdraw section.</div>
                                </div>
                                <!-- Panel Content Starts -->
                            </div>
                            <!-- Panel Ends -->
                            <!-- Panel Starts -->
                            <div class="panel panel-default">
                                <!-- Panel Heading Starts -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                            How long does it take for my deposit to be added to my account?</a>
                                    </h4>
                                </div>
                                <!-- Panel Heading Ends -->
                                <!-- Panel Content Starts -->
                                <div id="collapse5" class="panel-collapse collapse">
                                    <div class="panel-body">AYour account will be updated after three blockchain confirmation, once you deposit.</div>
                                </div>
                                <!-- Panel Content Starts -->
                            </div>
                            <!-- Panel Ends -->
                            
                        </div>
                        <!-- Panel Group Ends -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Section FAQ Ends -->
@include('partials.landing-footer')

@endsection
