<div class="main-sidemenu">
    <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
    <ul class="side-menu">
        <li class="sub-category">
            <h3>Menú</h3>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="{{route('home')}}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
        </li>

        @if(auth()->user()->perfil==1)
        <li class="slide">
            <a class="side-menu__item {{ request()->routeIs('usuarios.*') ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('usuarios.index')}}"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Usuarios</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item {{ request()->routeIs('cuentas.*') ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('cuentas.index')}}"><i class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Cuentas</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item {{ request()->routeIs('tipo_establecimientos.*') ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('tipo_establecimientos.index')}}">
                <i class="side-menu__icon fa-regular fa-shop-lock"></i>
                <span class="side-menu__label">Tipo Establecimientos</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item {{ request()->routeIs('establecimientos.*') ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('establecimientos.index')}}">
                <i class="side-menu__icon fa-regular fa-store"></i>
                <span class="side-menu__label">Establecimientos</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item {{ request()->routeIs('productos.*') ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('productos.index')}}">
                <i class="side-menu__icon fa-regular fa-boxes-stacked"></i>
                <span class="side-menu__label">Productos</span>
            </a>
        </li>
        @endif
    </ul>
    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
</div>