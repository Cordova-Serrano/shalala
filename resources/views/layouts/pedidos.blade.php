<div class="container-fluid d-flex justify-content-center mt-5">
    <section class="container" id="tabla-pedidos">
        <div class="mt-3" style="height:800px; overflow:scroll;">
            <table class="table table-hover align-middle">
                <thead style="background-color: #ffc8cb; color:black;">
                    <tr>
                        <th scope="col">No. de Pedido</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Productos</th>
                        <th scope="col">Precio / Unidad</th>
                        <th scope="col">Fecha de Pedido</th>
                        <th scope="col">Total a pagar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->id}}</td>
                        <td>{{$pedido->User->name}}</td>
                        <td>
                            @foreach($products_by_pedidos as $pp)
                            <ul>
                                @foreach($pp as $product)
                                @if ($product->User->id == $pedido->User->id && $pedido->id == $product->pedido_id)
                                <li>
                                    {{$product->product->name}} :
                                    <strong>{{$product->quantity}} pz</strong>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            @endforeach
                        </td>
                        <td>
                            @foreach($products_by_pedidos as $pp)
                            <ul>
                                @foreach($pp as $product)
                                @if ($product->User->id == $pedido->User->id && $pedido->id == $product->pedido_id)
                                <li>
                                    <strong>${{$product->product->price}} c/u</strong>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            @endforeach
                        </td>
                        <td>{{$pedido->created_at->diffForHumans()}}</td>
                        <td>${{$pedido->total}}</td>
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