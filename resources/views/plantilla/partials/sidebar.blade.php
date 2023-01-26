<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @if (Request::url() !== route('home')) collapsed @endif" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Administrar</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                @can('users.index')
                    <li>
                        <a href="{{ route('users.index') }}" class="@if (Request::url() == route('users.index')) active @endif">
                            <i class="bi bi-circle"></i>
                            <span>Usuarios</span>
                        </a>
                    </li>
                @endcan
                @can('roles')
                    <li>
                        <a href="{{ route('roles.index') }}" class="@if (Request::url() == route('roles.index')) active @endif">
                            <i class="bi bi-circle"></i>
                            <span>Roles</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Gestionar</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                @can('personal.index')
                    <li>
                        <a href="{{ route('personal.index') }}" class="@if (Request::url() == route('personal.index')) active @endif">
                            <i class="bi bi-circle"></i>
                            <span>Personal</span>
                        </a>
                    </li>
                @endcan
                @can('archivos.index')
                    <li>
                        <a href="{{ route('archivos.index') }}" class="@if (Request::url() == route('archivos.index')) active @endif">
                            <i class="bi bi-circle"></i>
                            <span>Archivos</span>
                        </a>
                    </li>
                @endcan
                @can('certificados.index')
                    <li>
                        <a href="{{ route('certificados.index') }}" class="@if (Request::url() == route('certificados.index')) active @endif">
                            <i class="bi bi-circle"></i>
                            <span>Emitir Certificados</span>
                        </a>
                    </li>
                @endcan
                @can('horarios.index')
                    <li>
                        <a href="{{ route('horarios.index') }}" class="@if (Request::url() == route('horarios.index')) active @endif">
                            <i class="bi bi-circle"></i>
                            <span>Registrar Horarios</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link @if (Request::url() !== route('asistencias.index')) collapsed  @endif" href="{{ route('asistencias.index') }}"> 
                <i class="bi bi-person"></i>
                <span>Asistencias</span>
            </a>
        </li>
    </ul>

</aside>
