@extends('layouts.layout_admin')

@section('stylesheet')
{{asset('css/styleShalala.css')}}
@endsection

@section('contenido')
@extends('layouts.usuarios')
@extends('layouts.sidebar')
<!-- Jquery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">

    function deleteUser(id, nombre) {
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

    function editUser(id, categoria, nombre, stock, precio, imagen) {
        const modalContainer = document.getElementById("modalContainer");
        var html =
            `<div class="modal fade" id="modalInventario" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:100%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añadir Nuevo Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/guardaProductoInventario" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="identificador" value="${id}">
                            <label for="">Categoría del producto</label>
                            <input class="form-control" type="text" name="categoria" id="categoria" value="${categoria}" required>
                            <br>

                            <label for="">Nombre del producto</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="${nombre}" required>
                            <br>

                            <label for="">Cantidad de stock</label>
                            <input class="form-control" type="number" name="stock" id="stock" value="${stock}" required>
                            <br>

                            <label for="">Precio del producto</label>
                            <input class="form-control" type="number" name="precio" id="precio" value="${precio}" required>
                            <br>
                            <label for="">Imagen del producto</label>
                            <input class="form-control" type="text" name="file_name" id="file_name" value="Nombre del archivo" required>
                            <input class="form-control mt-3" type="file" name="imagen" id="imagen" value="${imagen}" required>
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
</script>
@endsection