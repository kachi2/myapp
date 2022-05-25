      <body>
         <!-- Start Navbar Area -->
         <div class="navbar-area pakap-new-navbar-area">
            <div class="pakap-responsive-nav">
                <div class="container">
                    <div class="pakap-responsive-menu">
                        <div class="logo">
                            <a href="index.html"><img src="{{asset('/mobile/images/logo-hover.png')}}" width="70px" alt="logo"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pakap-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
                        <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('/mobile/images/logo-hover.png')}}" width="100px" alt="logo"></a>
                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="{{route('index')}}" class="nav-link ">Home</a>
                                  
                                </li>
                              
                                <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About Us</a></li>
                                <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact Us</a></li>
                                <li class="nav-item"><a href="{{route('terms')}}" class="nav-link">Privacy</a></li>


                            </ul>
                            <div class="others-option">
                             <span> <a href="{{route('login')}}"> Login </a></span>   <span><a href="{{route('login')}}">  Register</a> </span>  &nbsp;  <a href="{{route('users.agent')}}" class="btn btn-primary">Become an Agent</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>