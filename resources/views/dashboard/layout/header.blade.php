<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fa fa-bars"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block" style="font-size: 16px;">@yield('title')</li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="nav-item d-none d-lg-block"><a href="{{ route('dashboardHome') }}" class="nav-link"><i class="fa fa-dashboard"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a href="{{ route('popupad.index') }}" title="الاعلان المنبثق" class="nav-link"><i class="fa fa-bolt"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="fa fa-arrows-alt"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a href="{{ route('options') }}" class="nav-link"><i class="fa fa-gear"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="fa fa-search"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="fa fa-search primary"></i></div>
                            <form action="{{ route('search') }}">
                                <input class="input" name="word" type="text" placeholder="ابحث في الموقع">
                            </form>
                            <div class="search-input-close"><i class="fa fa-times"></i></div>
{{--                            <ul class="search-list search-list-main"></ul>--}}
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('logingOut') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link"><i class="fa fa-sign-out"></i></a>
                        <form id="logout-form" action="{{ route('logingOut') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                            <i class="fa fa-bell"></i>
                            <span class="badge badge-pill badge-primary badge-up badge-sm">0</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                                </div>
                            </li>
                            <li class="scrollable-container media-list">
                                <a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="fa fa-bell font-medium-5 primary"></i></div>
                                        <div class="media-body">
                                            <h6 class="primary media-heading">You have new order!</h6>
                                            <small class="notification-text"> Are your going to meet me tonight?</small>
                                        </div>
                                        <small><time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
</ul>
