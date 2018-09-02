<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav">
        <li class="nav-item mobile-menu hidden-md-up float-xs-left">
          <a class="nav-link nav-menu-main menu-toggle hidden-xs">
            <i class="icon-menu5 font-large-1"></i></a></li>
        <li class="nav-item">
          <a href="{{ url('/dashboard') }}" class="navbar-brand nav-link">
            <img alt="branding logo" src="{{ url('public/Admin/') }}/app-assets/images/logo/logo-pos.png" data-expand="{{ url('public/Admin/') }}/app-assets/images/logo/logo.png" data-collapse="{{ url('public/Admin/') }}/app-assets/images/logo/logo-small.png" class="brand-logo"></a></li>
        <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
      </ul>
    </div>
    <div class="navbar-container content container-fluid">
      <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
        <ul class="nav navbar-nav">
          <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
          <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
      
        </ul>
        <ul class="nav navbar-nav float-xs-right">
          <li class="dropdown dropdown-language nav-item"><a id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link"><i class="flag-icon flag-icon-gb"></i><span class="selected-language">English</span></a>
            <div aria-labelledby="dropdown-flag" class="dropdown-menu"><a href="#" class="dropdown-item"><i class="flag-icon flag-icon-gb"></i> English</a><a href="#" class="dropdown-item"><i class="flag-icon flag-icon-fr"></i> French</a><a href="#" class="dropdown-item"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a href="#" class="dropdown-item"><i class="flag-icon flag-icon-de"></i> German</a></div>
          </li>
          
          <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online">
            
            @if (Auth::user()->image)
            <img src="{{ Auth::user()->image }} ">
              @else
              <img src="{{ url('public/Admin/') }}/app-assets/images/portrait/small/avatar-s-5.png" alt="avatar"><i></i>
            @endif
          </span>
          <span class="user-name">
              {{ Auth::user()->name }} </span></a>
     
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{ url('/user/edit',Auth::user()->id) }}" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a>
              <div class="dropdown-divider">
                
              </div>
               <a class="dropdown-item" href="{{ route('logout') }}"
  onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
          <i class="icon-power3"></i>
         Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>