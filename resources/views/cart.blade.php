@extends('layouts.layout')

@section('stylesheet2')
{{asset('css/product.css')}}
@endsection

@section('contenido')
@extends('layouts.navbar')

@if(!empty($successMsg))
<div class="d-flex flex-column container mt-5">
    <div class="alert alert-success"> {{ $successMsg }}</div>
</div>
@endif
<!-- <div class="d-flex flex-column container mt-5">
    <div class="alert alert-success"> PEDIDO REALIZADO CON EXITO! </div>
</div> -->
<div class="d-flex flex-column container mt-2">
    <div class="text-center bg-primary bg-gradient d-flex justify-content-center align-items-center" style="height: 60px">
        <h1 style="color: white">Carrito de Compras</h1>
    </div>
    <div class="mt-3" style="overflow:scroll; height: 580px;">
        <table class="table table-hover align-middle mt-4">
            <thead>
                <tr>
                    <th scope="col">Imagen del producto</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $c)
                <tr>
                    <td name="image_path"><img src="{{asset('storage'). '/' . $c->product->image_path}}" alt="" style="width: 100px; height: 100px"></td>
                    <td name="category">{{$c->product->Category->name}}</td>
                    <td name="name">{{$c->product->name}}</td>
                    <td name="price">${{$c->product->price}}</td>
                    <td name="quantity">{{$c->quantity}}</td>
                    <td>
                        <button type="button" class="btn btn-danger" onclick="deleteProductfromCart('{{$c->id}}','{{$c->product->name}}')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <form action="/buyCart" method="POST">
        <div class="modal-body d-flex flex-column">
            @csrf
            @foreach($cart as $c)
            <input type="hidden" name="user_id" value="{{$c->user_id}}">
            @endforeach
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success mb-2">
                Comprar
            </button>
        </div>
    </form>
</div>
<div id="modalContainer">

</div>
<script type="text/javascript">
    function deleteProductfromCart(id, nombre) {
        const modalContainer = document.getElementById("modalContainer");
        var html =
            `<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:160%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="fas fa-exclamation-triangle"></i>
                            Eliminar producto del carrito de compras
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container-fluid d-flex flex-column justify-content-center align-items-center mt-2">
                        <label for="" class="fs-2">
                            ¿Estás seguro de eliminar este producto de tu carrito?
                        </label>
                        <label for="" class="fs-3">
                            <strong>Nombre del producto:</strong>
                            ${nombre}
                        </label>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <a href="{{ url('/deleteFromCart/${id}') }}" class="btn btn-danger">
                                Sí
                            </a>
                    </div>
                </div>
            </div>
        </div>`;

        modalContainer.innerHTML = html;
        $("#modalDelete").modal("show");
    }

    function confirmPurchase(id, nombre) {
        const modalContainer = document.getElementById("modalContainer");
        var html =
            `<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:160%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="fas fa-exclamation-triangle"></i>
                            Eliminar producto del carrito de compras
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container-fluid d-flex flex-column justify-content-center align-items-center mt-2">
                        <label for="" class="fs-2">
                            ¿Estás seguro de eliminar este producto de tu carrito?
                        </label>
                        <label for="" class="fs-3">
                            <strong>Nombre del producto:</strong>
                            ${nombre}
                        </label>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <a href="{{ url('/deleteFromCart/${id}') }}" class="btn btn-danger">
                                Sí
                            </a>
                    </div>
                </div>
            </div>
        </div>`;

        modalContainer.innerHTML = html;
        $("#modalDelete").modal("show");
    }
</script>
@endsection