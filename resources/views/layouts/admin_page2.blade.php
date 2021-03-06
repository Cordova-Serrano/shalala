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
                <a href="#" class="nav-link text-white active" aria-current="page" id="inventario">
                    <i class="fas fa-clipboard-list"></i>
                    Inventario
                </a>
            </li>
            <li id="pedidos">
                <a href="#" class="nav-link text-white" id="pedidos">
                    <i class="fas fa-shopping-cart"></i>
                    Pedidos
                </a>
            </li>
            <li id="usuarios">
                <a href="#" class="nav-link text-white">
                    <i class="fas fa-user"></i>
                    Usuarios
                </a>
            </li>
            <li id="administradores">
                <a href="#" class="nav-link text-white">
                    <i class="fas fa-star"></i>
                    Administradores
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>Administrador</strong>
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
        <section class="container d-none" id="tabla-inventario">
            <div class="container d-flex flex-row-reverse p-0">
                <button type="button" class="btn btn-success" onclick="addProduct()">
                    <i class="fas fa-plus"></i>
                    A??adir Nuevo Producto
                </button>
            </div>
            <table class="table table table-hover mt-3">
                <thead style="background-color: #ffc8cb; color:black;">
                    <tr>
                        <th scope="col pe-0">No. de Producto</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Nombre del producto</th>
                        <th scope="col">Imagen del producto</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Precio</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventario as $e)
                    <tr>
                        <th scope="row">{{$e->id}}</th>
                        <td>{{$e->categoria}}</td>
                        <td>{{$e->nombre}}</td>
                        <td>
                            <img src="{{asset('storage/.$e->imagen')}}" alt="" style="width: 200px; height: 200px">
                        </td>
                        <td>{{$e->stock}}</td>
                        <td>${{$e->precio}}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="deleteProduct('{{$e->id}}','{{$e->nombre}}')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <button type="button" class="btn btn-info" onclick="editProduct('{{$e->id}}','{{$e->nombre}}')">
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
        <section class="container d-none" id="tabla-pedidos">
            <table class="table table table-hover">
                <thead style="background-color: #ffc8cb; color:black;">
                    <tr>
                        <th scope="col pe-0">No. de Pedido</th>
                        <th scope="col">Nombre del cliente</th>
                        <th scope="col">Productos</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total a pagar</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 7; $i++) <tr>
                        <th scope="row">{{$i}}</th>
                        <td>Eduardo Cordova</td>
                        <td>
                            <ol>
                                <li>Brownie</li>
                                <li>Galletas</li>
                                <li>Pastel</li>
                            </ol>
                        </td>
                        <td>
                            <ul>
                                <li>2</li>
                                <li>4</li>
                                <li>1</li>
                            </ul>
                        </td>
                        <td>$15</td>
                        </tr>
                        @endfor
                </tbody>
            </table>
        </section>
        <section class="container d-none" id="tabla-usuarios">
            <table class="table table table-hover">
                <thead style="background-color: #ffc8cb; color:black;">
                    <tr>
                        <th scope="col pe-0">No.</th>
                        <th scope="col">Nombre de Usuario</th>
                        <th scope="col">Correo electronico</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>Eduardo Cordova</td>
                        <td>corse.eduardo@gmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <button type="button" class="btn btn-info" onclick="">
                                <i class="fas fa-pen"></i>
                            </button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </section>
        <section class="container d-none" id="tabla-administradores">
            <table class="table table table-hover">
                <thead style="background-color: #ffc8cb; color:black;">
                    <tr>
                        <th scope="col pe-0">No.</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Nombre del Administrador</th>
                        <th scope="col">Correo electronico</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 7; $i++) 
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>Administrador</td>
                        <td>Eduardo Cordova</td>
                        <td>corse.eduardo@gmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <button type="button" class="btn btn-info" onclick="">
                                <i class="fas fa-pen"></i>
                            </button>
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </section>
    </div>
</div>