  <body>
        <!-- Preloader -->
        <div class="preloader">
            <div class="preloader-wrapper">
                <div class="preloader-content">
                    <img src="{{asset('/mobile/images/preloader-logo.png')}}" alt="logo">
                    <h3>Advent Capital</h3>
                </div>
            </div>
        </div>
        <!-- Preloader -->

        <!-- Header-bg -->
        <div class="header-bg header-bg-1"></div>
        <!-- Header-bg -->

        <!-- Appbar -->
        <div class="fixed-top">
            <div class="appbar-area sticky-black">
                <div class="container">
                    <div class="appbar-container">
                        <div class="appbar-item appbar-actions">
                            <div class="appbar-action-item">
                                <a href="#" class="appbar-action-bar" data-bs-toggle="modal" data-bs-target="#sidebarDrawer"><i class="flaticon-menu"></i></a>
                            </div>
                        </div>
                        <div class="appbar-item appbar-brand me-auto">
                            <a href="{{route('home')}}">
                                <h3 style="color:aliceblue"> Advent Capital</h3>
                            </a>
                        </div>
                        <div class="appbar-item appbar-options">
                            <div class="appbar-option-item appbar-option-notification">
                                <a href="{{route('user.notifications')}}"><i class="flaticon-bell"></i></a>
                                <span class="option-badge">{{count($notification)}}</span>
                            </div>
                            <div class="appbar-option-item appbar-option-profile">
                                <a href="{{route('account')}}">
                                <img src="{{asset('/mobile/images/profile.png')}}"alt="profile">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Appbar -->