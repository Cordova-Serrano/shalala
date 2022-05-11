<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/e840fab8b7.js" crossorigin="anonymous"></script>
    <title>PDF</title>
</head>

<body>
    <div class="d-flex align-items-center container bg-secondary mt-5 p-3">
        <img src="{{asset('assets/img/shalala.png')}}" alt="" width="90" height="90">
        <h1 class="display-2" style="color: white">SHALALA</h1>
    </div>
    <div class="container">
        <section class="ms-1 me-1 mt-3 mb-2 border-bottom border-3 pb-2">
            <strong style="font-size: 24px;">
                DETALLE DE PEDIDO #{{$pedido->id}}
            </strong>
        </section>
        <div class="container">
            <div class="col">
                <div class="row border-bottom border-3 pb-2">
                    <strong class="mb-4" style="font-size: 20px;">
                        INFORMACIÓN DEL PEDIDO
                    </strong>
                    <div class="col">
                        <div class="ms-1 d-flex flex-row ">
                            <div>
                                <strong>
                                    Nombre:
                                </strong>
                            </div>
                            <div class="ms-2">
                                {{Auth::user()->name}}
                            </div>
                        </div>
                        <div class="ms-1 d-flex flex-row ">
                            <div>
                                <strong>
                                    Email:
                                </strong>
                            </div>
                            <div class="ms-2">
                                {{Auth::user()->email}}
                            </div>
                        </div>
                        <div class="ms-1 d-flex flex-row ">
                            <div>
                                <strong>
                                    Fecha del pedido:
                                </strong>
                            </div>
                            <div class="ms-2">
                                {{$pedido->created_at->diffForHumans()}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <strong style="font-size: 20px;">
                        PRODUCTOS
                    </strong>
                    <div class="container">
                        <table class="table table-bordered border border-3 align-middle mt-4 text-center">
                            <thead class="">
                                <tr>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio Unitario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $p)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage'). '/' . $p->Product->image_path}}" alt="" style="width: 100px; height: 100px">
                                    </td>
                                    <td>
                                        {{$p->Product->name}}
                                    </td>
                                    <td>
                                        {{$p->quantity}}
                                    </td>
                                    <td>
                                        ${{$p->Product->price}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="container d-flex p-0" style="background-color:#f5f5f5">
                            <div class="col col-7"></div>
                            <div class="col col-3">
                                <strong style="font-size: 20px; color:#1d6ca1;">
                                    TOTAL A PAGAR
                                </strong>
                            </div>
                            <div class="col col-2 d-flex align-items-center justify-content-center">
                                <strong style="font-size: 20px; color:#1d6ca1;">
                                    ${{$pedido->total}}
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="d-flex align-items-center justify-content-center container bg-secondary mt-5 p-3">
        <h1 class="display-4 text-center" style="color: white">¡AGRADECEMOS TU COMPRA!</h1>
    </div>
</body>

</html>