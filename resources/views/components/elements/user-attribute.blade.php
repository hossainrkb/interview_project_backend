<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
    <b><i class="fa fa-info-circle"></i> <strong>Welcome . {{ isset(auth()->user()->a_username)?strtoupper(auth()->user()->a_username):null }} </strong></b>
    </a>
    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
      <a href="#" class="nav-link dropdown" ><b><i class="fa fa-fw fa-user"></i> Profile</b></a>
      <div class="dropdown-divider"></div>
      <a href="#" class="nav-link dropdown"><b><i class="fa fa-fw fa-envelope"></i> Inbox</b></a>
      <div class="dropdown-divider"></div>
      <a href="#" class="nav-link dropdown"><b><i class="fa fa-fw fa-envelope"></i> Notices</b></a>
      <div class="dropdown-divider"></div>
      <a href="#" class="nav-link dropdown"><b><i class="fa fa-fw fa-envelope"></i> Settings</b></a>
      <div class="dropdown-divider"></div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" class="nav-link dropdown"  onclick="event.preventDefault();
        this.closest('form').submit();">
          <b><i class="fa fa-fw fa-power-off"></i> Log Out</b>
        </a>
    </form>
      <div class="dropdown-divider"></div>
    </div>
  </li>