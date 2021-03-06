<body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center p-2">
          <a class="navbar-brand brand-logo" href="index.html">
           <img src="{{asset('images/em-crm-logo.png')}}" alt="dev-crm" style="width:120px"/>
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('images/em-crm-logo.png')}}" alt="dev-crm" style="width:120px"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome {d}everybody</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <form class="search-form d-none d-md-block" action="#">
              <i class="icon-magnifier"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>           
            
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator message-dropdown notification-bell" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="icon-bell"></i>
                <span class="count">@yield('notification-count')</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
               
                <div class="dropdown-divider"></div>
                 @yield('notification-content')
              </div>
            </li>

       
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle mr-2" src="{{url(Auth::user()->profile_picture == '' ? 'images/user-profile/user-avatar.png' : 'user-profile/'. Auth::user()->profile_picture)}}" alt="Profile image"> <span class="font-weight-normal"> {{ Auth::user()->name }} </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="{{url(Auth::user()->profile_picture == '' ? 'images/user-profile/user-avatar.png' : 'user-profile/'. Auth::user()->profile_picture)}}" alt="Profile image" width="90">
                  <p class="mb-1 mt-3">{{ Auth::user()->name }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
                <a href="/profile" class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger ml-1">1</span></a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-energy text-primary"></i> Activity</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-question text-primary"></i> FAQ</a>

             

                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="dropdown-item-icon icon-power text-primary"></i>
                                        {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>                
                
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>

       <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->


