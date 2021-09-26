<div id="preloader"></div>
        <header class="header-one">
            <!-- Start top bar -->
            <div class="topbar-area fix hidden-xs">
                <div class="container">
                    <div class="row">
                       <div class="col-md-6 col-sm-6">
                           <div class="topbar-left">
                                <ul>
                                    <li><a href="mailto:info@acrabuscapital.com"><i class="fa fa-envelope"></i> info@acrabuscapital.com</a></li>
                                    <li><a href="tel:+510-736-5829"><i class="fa fa-phone"></i> +510-736-5829</a></li>
                                </ul>
							</div>
                        </div>
                        <div class=" col-md-6 col-sm-6">
                            <div class="topbar-left">
                            <div class="topbar-right">
                                    <ul>
                                        <li ><a  href="{{route('register')}}">Get Started</a></li>
                                    </ul> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End top bar -->
            <!-- header-area start -->
            <div id="sticker" class="header-area hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <!-- logo start -->
                                <div class="col-md-3 col-sm-3">
                                    <div class="logo">
                                        <!-- Brand -->
                                        <a class="navbar-brand page-scroll white-logo" href="{{route('index')}}">
                                            <img  width="250px" src="{{asset('/logo.png')}}" alt="">
                                        </a>
                                        <a class="navbar-brand page-scroll black-logo" href="{{route('index')}}">
                                            <img src="{{asset('/logo-dark.png')}}" alt="">
                                        </a>
                                    </div>
                                    <!-- logo end -->
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <div class="header-right-link">
                                        <!-- search option end -->
                                        <a class="s-menu" href="{{route('login')}}">Login</a>
                                    </div>
                                    <!-- mainmenu start -->
                                    <nav class="navbar navbar-default">
                                        <div class="collapse navbar-collapse" id="navbar-example">
                                            <div class="main-menu">
                                                <ul class="nav navbar-nav navbar-right">
                                                    <li><a class="" href="{{route('index')}}">Home</a></li>
                                                    <li><a href="{{route('about')}}">About us</a></li>
                                                    <li><a href="{{route('faq')}}">FAQ</a></li>
                                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                                    <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                    <!-- mainmenu end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-area end -->
            <!-- mobile-menu-area start -->
            <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <div class="logo">
                                    <a href="{{asset('index')}}"><img  height="100px" src="{{asset('/asset/images/aca.png')}}" alt="" /></a>
                                </div>
                                <nav id="dropdown">
                                    <ul>
                                        <li><a class="" href="{{route('index')}}">Home</a></li>
                                        <li><a href="{{route('about')}}">About us</a></li>
                                        <li><a href="{{route('faq')}}">FAQ</a></li>
                                        <li><a href="{{route('contact')}}">Contact</a></li>
                                        <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
                                    </ul>
                                </nav>
                            </div>					
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area end -->		
        </header>