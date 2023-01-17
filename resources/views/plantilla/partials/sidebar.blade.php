<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('home')}}">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Administrar</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

                @can('users.index')
                    <li>
                        <a href="{{route('users.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Usuarios</span>
                        </a>
                    </li>
                @endcan
                @can('roles')
                    <li>
                        <a href="{{route('roles.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Roles</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>

        <li class="nav-item collapsed">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Gestionar</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                @can('personal.index')
                    <li>
                        <a href="{{route('personal.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Personal</span>
                        </a>
                    </li>
                @endcan
                @can('archivos.index')
                    <li>
                        <a href="{{route('archivos.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Archivos</span>
                        </a>
                    </li>
                @endcan
                @can('certificados.index')
                    <li>
                        <a href="{{route('certificados.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Emitir Certificados</span>
                        </a>
                    </li>
                @endcan
                @can('horarios.index')
                    <li>
                        <a href="{{route('horarios.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Registrar Horarios</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>



        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('asistencias.index')}}">
                <i class="bi bi-person"></i>
                <span>Asistencias</span>
            </a>
        </li>


    </ul>
</aside>
