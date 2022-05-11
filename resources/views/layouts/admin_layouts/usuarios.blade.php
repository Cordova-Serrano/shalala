<div class="d-flex" style="height: 100%;">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100%;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="{{asset('assets/img/shalala.png')}}" alt="" width="108" height="108">
            <span class="fs-2">Shalala</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item" id="inventario">
                <a href="{{ url('/admin/inventario') }}" class="nav-link text-white">
                    <i class="fas fa-clipboard-list"></i>
                    Inventario
                </a>
            </li>
            <li class="nav-item" id="inventario">
                <a href="{{ url('/admin/productos') }}" class="nav-link text-white">
                <i class="fas fa-warehouse"></i>
                    Productos
                </a>
            </li>
            <li id="pedidos">
                <a href="{{ url('/admin/pedidos') }}" class="nav-link text-white">
                    <i class="fas fa-shopping-cart"></i>
                    Pedidos
                </a>
            </li>
            <li id="usuarios">
                <a href="{{ url('/admin/usuarios') }}" class="nav-link text-white active" aria-current="page">
                    <i class="fas fa-user"></i>
                    Usuarios
                </a>
            </li>
            <li id="administradores">
                <a href="{{ url('/admin/administradores') }}" class="nav-link text-white">
                    <i class="fas fa-star"></i>
                    Administradores
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{asset('assets/img/admin/admin.jpg')}}" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>
    <!--End Sidebar-->
    <div class="container-fluid d-flex justify-content-center mt-5">
        <section class="container" id="tabla-usuarios">
            <div class="container d-flex flex-row-reverse p-0">
                <button type="button" class="btn btn-success" onclick="addProduct()">
                    <i class="fas fa-plus"></i>
                    Añadir Nuevo Usuario
                </button>
            </div>
            <table class="table table table-hover mt-3">
                <thead style="background-color: #ffc8cb; color:black;">
                    <tr>
                        <th scope="col pe-0">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tipo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $e)
                    <tr>
                        <th scope="row">{{$e->id}}</th>
                        <td>{{$e->name}}</td>
                        <td>{{$e->email}}</td>
                        <td>
                            @if({{$e->tipo==0}})
                                Administrador
                            @endif
                            Usuario
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="deleteProduct('{{$e->id}}','{{$e->nombre}}')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <button type="button" class="btn btn-info" onclick="editProduct('{{$e->id}}','{{$e->categoria}}','{{$e->nombre}}','{{$e->stock}}','{{$e->precio}}','{{$e->imagen}}')">
                                <i class="fas fa-pen"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="modalContainer">

            </div>
        </section>
    </div>
</div>