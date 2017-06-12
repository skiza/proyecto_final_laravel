<header class="sticky-top">
    <?php 
        $nt_parameters = [];
        
        if(isset($route_parameters)){
            $nt_parameters = $route_parameters;
        }
    ?>
    
    <div class="container">
        <nav class="navbar navbar-toggleable-md navbar-light main_menu" >
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="material-icons">menu</i>
            </button>
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('usersList') }}">
                <img src="{{ asset('img/logo_fit-and-up.png') }}" class="logo" />
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownAdminMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i> Admin Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownAdminMenuLink">
                            <a class="dropdown-item" href="{{ route('adminsList') }}">
                                <i class="material-icons">people</i> Admins List
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownUserMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i> User Control Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownUserMenuLink">
                            <a class="dropdown-item" href="{{ route('usersList') }}">
                                <i class="material-icons">people</i> Users List
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownNewMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">assignment</i> Data Control Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownNewMenuLink">
                            <a class="dropdown-item" href="{{ route('categoryList') }}">
                                <i class="material-icons">view_list</i> Categories List
                            </a>
                            <a class="dropdown-item" href="{{ route('workoutList') }}">
                                <i class="material-icons">view_list</i> Workouts List
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownUserMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i> {{ auth()->user()->alias }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownUserMenuLink">
                            <a class="dropdown-item" href="{{ route('adminProfile') }}">
                                <i class="material-icons">person</i> Ver Perfil
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off" aria-hidden="true"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>