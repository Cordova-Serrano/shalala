<div class="container-fluid d-flex justify-content-center mt-5">
    <section class="container" id="tabla-inventario">
        <div class="container d-flex flex-row-reverse p-0">
            <button type="button" class="btn btn-success" onclick="addProduct()">
                <i class="fas fa-plus"></i>
                Añadir Nuevo Producto
            </button>
        </div>
        <div class="mt-3" style="height:800px; overflow:scroll;">
            <table class="table table-hover align-middle">
                <thead style="background-color: #ffc8cb; color:black;">
                    <tr class="text-center align-middle">
                        <th scope="col">No. de Producto</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Nombre del producto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Imagen del producto</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Precio</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventario as $e)
                    <tr>
                        <td class="text-center">{{$e->id}}</td>
                        <td>{{$e->category->name}}</td>
                        <td>{{$e->name}}</td>
                        <td>{{$e->description}}</td>
                        <td>
                            <img src="{{asset('storage'). '/' . $e->image_path}}" alt="" style="width: 100px; height: 100px">
                        </td>
                        @if($e->stock <= 0) 
                            <td>Sin Stock</td>
                        @else
                            <td>{{$e->stock}}</td>
                        @endif
                        <td>${{$e->price}}</td>
                        <td class="align-center">
                            <button type="button" class="btn btn-danger" onclick="deleteProduct('{{$e->id}}','{{$e->name}}')">
                                <i class="fas fa-trash-alt"></i>
                                </button>
                                <button type="button" class="btn btn-info" onclick="editProduct('{{$e->id}}','{{$e->category->name}}','{{$e->category->id}}','{{$e->name}}','{{$e->stock}}','{{$e->price}}','{{$e->image_path}}','{{$e->description}}')">
                                <i class="fas fa-pen"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="modalContainer">

        </div>
        <div id="modalContainer2">

        </div>
        <div id="modalContainerEditar">

        </div>
    </section>
</div>