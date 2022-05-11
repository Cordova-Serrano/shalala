@extends('layouts.layout')

@section('stylesheet2')
{{asset('css/product.css')}}
@endsection

@section('contenido')
@extends('layouts.navbar')
<div class="d-flex flex-column container mt-2">
    <div class="text-center bg-primary bg-gradient d-flex justify-content-center align-items-center" style="height: 60px">
        <h1 style="color: white">Pedidos</h1>
    </div>
    <div class="mt-3" style="overflow:scroll; height: 600px;">
        <table class="table table-hover align-middle mt-4">
            <thead class="">
                <tr>
                    <th scope="col">Productos</th>
                    <th scope="col">Fecha de Pedido</th>
                    <th scope="col">Total a Pagar</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                <tr>
                    <td>
                        @foreach($products_by_pedidos as $pp)
                        @foreach($pp as $product)
                        @if ($product->User->id == $pedido->User->id && $pedido->id == $product->pedido_id)
                        <li>
                            {{$product->product->name}} :
                            <strong>{{$product->quantity}} pz</strong>
                        </li>
                        @endif
                        @endforeach
                        @endforeach
                    </td>
                    <td>{{$pedido->created_at->diffForHumans()}}</td>
                    <td>${{$pedido->total}}</td>
                    <td>
                        <a type="button" class="btn btn-dark" href="{{url('/ver-compra/'.Auth::user()->id.'/'.$pedido->id)}}">
                            Ver Detalles
                        </a>
                        <a type="button" class="btn btn-info" href="{{url('/downloadPDF/'.Auth::user()->id.'/'.$pedido->id)}}">
                            Descargar PDF
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">

</script>
@endsection