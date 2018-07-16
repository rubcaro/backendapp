<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="{{ route('home') }}" style="color:black;">
      {{-- <img src="images/logo.svg" alt="logo" /> --}}
      <p>Hospital Clínico Magallanes</p>
    </a>
    
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
    
    <ul class="navbar-nav navbar-nav-right">
      
      <li class="nav-item dropdown d-none d-xl-inline-block">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
        {{-- <span class="profile-text">{{ Auth::user()->getFullNameAttribute() }}</span> --}}
          {{-- <img class="img-xs rounded-circle" src="images/faces/face1.jpg" alt="Profile image"> --}}
          <i class="fas fa-user-circle"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          
          <a class="dropdown-item mt-2">
            Opciones de usuario
          </a>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
            Salir
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>