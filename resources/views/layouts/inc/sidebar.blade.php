{{-- SIDEBAR --}}
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            {{-- <img src="images/faces/face1.jpg" alt="profile image"> --}}
            <i class="fas fa-user-circle" style="font-size:2em;"></i>
          </div>
          <div class="text-wrapper">
            {{-- <p class="profile-name">{{ Auth::user()->name }} {{ Auth::user()->apepat }} {{ Auth::user()->apemat }}</p> --}}
          <span class="profile-name">{{ Auth::user()->getFullNameAttribute() }}</span>
          </div>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#banco-sangre" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon fas fa-bell"></i>
        <span class="menu-title">Banco de Sangre</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="banco-sangre">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
          <a class="nav-link" href="{{ route('seeAddNotification') }}">Ingresar notificación</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ route('seeNotifications') }}">Notificaciones</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#usuarios" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon fas fa-user"></i>
          <span class="menu-title">Usuarios</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="usuarios">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/buttons.html">Ver Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/typography.html">Agregar Usuario</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#encuestas" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon fas fa-edit"></i>
          <span class="menu-title">Encuestas</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="encuestas">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
            <a class="nav-link" href="{{ route('survey') }}">Ver Encuestas</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('seeCreateEncuesta') }}">Crear Encuesta</a>
            </li>
          </ul>
        </div>
      </li>
  </ul>
</nav>

  
  {{-- END SIDEBAR --}}