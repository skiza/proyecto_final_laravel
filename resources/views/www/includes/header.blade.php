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
    <i class="material-icons menu_btn">menu</i>
  </button>
<!-- Branding Image -->
<a class="navbar-brand" href="{{ (Auth::guest())? nt_route(user_lang()) :nt_route('home-'.user_lang())  }}">
    <img src="{{ asset('img/logo_fit-and-up.png') }}" class="logo" />
</a>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    @if (Auth::guest())
      <li class="nav-item ">
        <a class="nav-link btn btn_nav " href="{{ route('login-'.user_lang()) }}"><i class="material-icons">person</i> Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link btn  btn_nav " href="{{ route('register-'.user_lang()) }}"><i class="material-icons">person_add</i> {{ trans('web.register') }} <span class="sr-only">(current)</span></a>
      </li>
    @else
      <li class="nav-item">
        <a class="nav-link" href="{{ nt_route('calendar-'.user_lang()) }}" >
          <i class="material-icons">today</i> {{ trans('web.calendar') }}
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownRoutineMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="material-icons">assignment</i> {{ trans('web.routine') }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownRoutineMenuLink">
          <a class="dropdown-item" href="{{ nt_route('home-'.user_lang()) }}"> <i class="material-icons">assignment</i> {{ trans('web.routine') }}</a>                          
          <a class="dropdown-item" href="{{ nt_route('routine_user-'.user_lang()) }}"><i class="material-icons">assignment_ind</i> {{ trans('web.your_routines') }}</a>
          <a class="dropdown-item" href="{{ nt_route('routine_new-'.user_lang()) }}"><i class="material-icons">add_box</i> {{ trans('web.create_routine') }}</a>
        </div>
      </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownUserMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="material-icons">person</i> {{ Auth::user()->alias }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownUserMenuLink">
          <a class="dropdown-item" href="{{ nt_route('profile-'.user_lang()) }}"><i class="material-icons">person</i> {{ trans('web.view_profile') }}</a>                          
          <a class="dropdown-item" href="{{ nt_route('edit_user-'.user_lang()) }}"><i class="material-icons">create</i>{{ trans('web.edit_profile') }}</a>
          <a class="dropdown-item" href="{{ nt_route('user_credentials-'.user_lang()) }}"><i class="material-icons">build</i> {{ trans('web.edit_account') }}</a>
          <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                   <i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
        </div>
      </li>
    @endif
    @if (!Auth::guard('admin')->check())
      <li class="nav-item dropdown lang">
        <a class="nav-link dropdown-toggle" id="navbarDropdownLangMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{ asset('img/'.user_lang().'.jpg')  }}"/>
          {{ (user_lang() == 'es')? 'ESP' : 'ENG'  }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownLangMenuLink">
          <a class="dropdown-item" href="{{ nt_route(get_lang_route_name('es'),$nt_parameters) }}">
            <img src="{{ asset('img/es.jpg')  }}"/>ESP
          </a>
          <a class="dropdown-item" href="{{ nt_route(get_lang_route_name('en'),$nt_parameters) }}">
            <img src="{{ asset('img/en.jpg')  }}"/>ENG
          </a>
        </div>
      </li>
    @endif
    </ul>
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link" href="#">Link</a>-->
    <!--  </li>-->
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link disabled" href="#">Disabled</a>-->
    <!--  </li>-->
    <!--</ul>-->
    <!--<form class="form-inline my-2 my-lg-0">-->
    <!--  <input class="form-control mr-sm-2" type="text" placeholder="Search">-->
    <!--  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
    <!--</form>-->
  </div>
</nav>
</div>  
</header>