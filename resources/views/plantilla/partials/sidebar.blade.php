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
                <i class="bi bi-menu-button-wide"></i><span>Gestionar</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                
                <li>
                    <a href="{{route('users.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
            </ul>
        </li>



        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        {{-- <a id="dark-mode" class="nav-link collapsed">
             <i class="fa-solid fa-moon-over-sun"></i> </a> --}}
        
        <button id="adulto-mode" > Adulto </i></button> 
        <button id="joven-mode" >Joven</i></button> 
        <button id="nino-mode" >Niño</i></button> 
        <button id="dark-mode" ><i class="bi bi-moon"></i></button> 
    </ul>
    
</aside>
