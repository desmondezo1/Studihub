<nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <a class="navbar-brand" href="{{ route('home') }}" style="margin:0;">
        <picture>
            <source height="50px" media="(min-width: 481px)" srcset="{{ asset('img/studi-blue.png') }}">
            <source height="50px" media="(max-width: 480px)" srcset="{{ asset('img/logo.png') }}">
            <img height="50px" src="{{ asset('img/logo.png') }}" alt="Studihub Logo">
        </picture>
    <!--<img height="50px" src="{{-- asset('img/logo.png') --}}" alt="Studihub Logo">-->
    </a>
    <form class="form-inline mx-auto" >
        <div class="input-group">
            <input type="text" class="form-control nav-search" placeholder="Learn anything" aria-label="Username" aria-describedby="basic-addon1">
        </div>
    </form>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarNavDropdown"  >
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('auth.register'))
                        <a class="nav-link" href="{{ route('auth.register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            <li class="nav-item dropdown">

                    <a href="/privatetutor" style="background: #f32a34;
                    border: 0.7px solid #061c3e;
                    color: #f2f4f7;
                    border-radius: 5%;
                    text-align: center;" id="privatetutorbutton" class="nav-link front" >Tutor
                    </a>

            </li>
                   
        </ul>
    </div>
</nav>
