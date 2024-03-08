<!-- SIDE-MENU -->
<div class="dropdown d-flex profile-1">
    <a href="#" data-bs-toggle="dropdown" class="nav-link pe-2 leading-none d-flex">
        <img src="https://api.multiavatar.com/{{\Auth::user()->name}}.png" alt="profile-user" class="avatar  profile-user brround cover-image">
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <div class="drop-heading">
            <div class="text-center">
                <h5 class="text-dark mb-0 fs-14 fw-semibold">{{\Auth::user()->name}}</h5>
                <small class="text-muted">Admin</small>
            </div>
        </div>
        
        <div class="dropdown-divider m-0"></div>
        
        <a class="dropdown-item" href="{{route('perfil.index')}}">
            <i class="dropdown-icon fe fe-user"></i> Perfil
        </a>
        
        <a class="dropdown-item" href="{{route('perfil.cambiarpwd')}}">
            <i class="dropdown-icon fe fe-lock"></i> Cambiar Password
        </a>                
        
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="dropdown-icon fe fe-alert-circle"></i> Salir
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
        </form>            
        </a>
    </div>
</div>