@extends('layouts.layout_admin')

@section('stylesheet')
{{asset('css/styleShalala.css')}}
@endsection

@section('contenido')
@extends('layouts.inventario')
@extends('layouts.sidebar')


<!-- Jquery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).on('change', '#categoria', function(event) {
        var valor = $(this).val();
        $('#input-category').val(valor);
    });

    function addProduct() {
        const modalContainer = document.getElementById("modalContainer");
        var html =
            `<div class="modal fade" id="modalInventario" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:100%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añadir Nuevo Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/storeProduct" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="identificador" value="">
                            <label for="">Categoría del producto</label>
                            <div class="d-flex flex-row mb-2">
                                <select class="form-select" aria-label="" name="categoria" id="categoria" required>
                                    <option selected>Selecciona una categoría</option>
                                    @foreach($categorias as $e)
                                    <option value="{{$e->id}}">{{$e->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input class="form-control" type="hidden" name="category_id" id="input-category" value="" required>
                            <br>

                            <label for="">Agregar nueva categoria</label>
                            <button type="button" class="btn btn-primary mb-3" onclick="addCategory()"> <i class="fas fa-plus"></i></button>
                            <br>

                            <label for="">Nombre del producto</label>
                            <input class="form-control" type="text" name="name" id="name" value="" required>
                            <br>

                            <label for="">Descripción del producto</label>
                            <input class="form-control" type="text" name="description" id="description" value="" required>
                            <br>

                            <label for="">Cantidad de stock</label>
                            <input class="form-control" type="number" name="stock" id="stock" value="" required>
                            <br>

                            <label for="">Precio del producto</label>
                            <input class="form-control" type="number" name="price" id="price" value="" required>
                            <br>
                            <label for="">Imagen del producto</label>
                            <input class="form-control mt-3" type="file" name="image_path" id="image_path" value="" required>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>`;

        modalContainer.innerHTML = html;
        $("#modalInventario").modal("show");
    }

    function deleteProduct(id, nombre) {
        const modalContainer = document.getElementById("modalContainer");
        var html =
            `<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:160%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="fas fa-exclamation-triangle"></i>
                            Eliminar producto del inventario
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container-fluid d-flex flex-column justify-content-center align-items-center mt-2">
                        <label for="" class="fs-2">
                            ¿Estás seguro de eliminar este producto?
                        </label>
                        <label for="" class="fs-3">
                            <strong>Nombre del producto:</strong>
                            ${nombre}
                        </label>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <a href="/delete/${id}" class="btn btn-danger">
                                Sí, Eliminar Definitivamente
                            </a>
                    </div>
                </div>
            </div>
        </div>`;

        modalContainer.innerHTML = html;
        $("#modalDelete").modal("show");
    }

    function editProduct(id, categoria, categoria_id, nombre, stock, precio, imagen, description) {
        const modalContainer = document.getElementById("modalContainerEditar");
        var html =
            `<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:100%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/editProduct" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="identificador" value="${id}">
                            <label for="">Categoría del producto</label>
                            <div class="d-flex flex-row mb-2">
                                <select class="form-select" aria-label="" name="" id="" value="${categoria}" required>
                                    @foreach($categorias as $e)
                                    <option value="{{$e->id}}">{{$e->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input class="form-control" type="hidden" name="category_id" id="input-category" value="${categoria_id}" required>
                            <br>

                            <label for="">Nombre del producto</label>
                            <input class="form-control" type="text" name="name" id="name" value="${nombre}">
                            <br>

                            <label for="">Descripción del producto</label>
                            <input class="form-control" type="text" name="description" id="description" value="${description}" required>
                            <br>

                            <label for="">Cantidad de stock</label>
                            <input class="form-control" type="number" name="stock" id="stock" value="${stock}">
                            <br>

                            <label for="">Precio del producto</label>
                            <input class="form-control" type="number" name="price" id="price" value="${precio}">
                            <br>
        
                            <label for="">Imagen del producto</label>
                            <input class="form-control mt-3" type="file" name="image_path" id="image_path" value="${imagen}">
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>`;

        modalContainer.innerHTML = html;
        $("#modalEditar").modal("show");
    }

    function addCategory() {
        const modalContainer = document.getElementById("modalContainer2");
        var html =
            `<div class="modal fade" id="modalCategoria" tabindex="-2" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:100%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añadir Nueva Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/guardaNuevaCategoria" method="POST" enctype="">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="identificador" value="">
                            <label for="">Categoría</label>
                            <input class="form-control" type="text" name="category" id="category" value="" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>`;

        modalContainer.innerHTML = html;
        $("#modalCategoria").modal("show");
    }
</script>
@endsection