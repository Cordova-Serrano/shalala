<!--NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- HOME -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <!-- {{ config('app.name', 'SHALALA') }} -->
            <img src="{{asset('assets/img/shalala.png')}}" alt="" width="108" height="108">
            SHALALA
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--  -->
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <div class="btn-group">
                    <a type="button" class="btn btn-info" href="{{ url('/productos') }}">
                        <strong>
                            Productos
                        </strong>
                    </a>

                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                        <li><a class="dropdown-item" href="{{url('/productos/brownies')}}">Brownies</a></li>
                        <li><a class="dropdown-item" href="{{url('/productos/galletas')}}">Galletas</a></li>
                        <li><a class="dropdown-item" href="{{url('/productos/paquetes')}}">Paquetes</a></li>
                        <li><a class="dropdown-item" href="{{url('/productos/especiales')}}">Especiales</a></li>
                        <li><a class="dropdown-item" href="{{url('/productos/personalizados')}}">Pesonalizado</a></li>
                    </ul>
                </div>
            </ul>
            <div class="d-flex">
                <!-- Botones Login / Register / Logout -->
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="btn btn-success me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="btn btn-info" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
                            <li>
                                <a class="dropdown-item" href="{{url('/carrito/'.Auth::user()->id)}}">
                                    <i class="fas fa-shopping-cart"></i>
                                    Carrito
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{url('/pedidos/'.Auth::user()->id)}}">
                                    <i class="fas fa-dolly-flatbed"></i>
                                    Pedidos
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <!-- Log Out -->
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endguest
                </ul>
                <!--  -->
            </div>
        </div>
    </div>
</nav>
<!--End NAVBAR-->