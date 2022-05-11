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
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap');

    .header {
        height: 100px;
        text-align: center;
    }

    .logo-header {
        width: 90px;
        height: 90px;
        top: 20px;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0px;
    }

    th {
        padding-left: 8px;
        padding-right: 8px;
        padding-bottom: 16px;
        border-bottom: solid 1px gray;
    }

    td {
        padding-bottom: 2px;
        padding-top: 24px;
        border-bottom: solid 1px gray;
    }

    .footer {
        background-color:#ffc8cb;
        height: 100px;
    }
</style>

<body style="background-color:white; font-family: 'Roboto Condensed', sans-serif;">
    <div class="header" style="background-color:#ffc8cb;">
        <section class="justify-content-center align-items-center">
            <img class="mt-2 ms-2" src="{{asset('assets/img/shalala.png')}}" alt="" width="100" height="100">
            <strong style="font-size: 72px; color: white;">
                SHALALA
            </strong>
        </section>
    </div>
    <div class="border-bottom border-3" style="margin-top: 40px; margin-bottom: 30px;">
        <section class="pb-2">
            <strong style="font-size: 24px; color:#888888;">
                DETALLE DE PEDIDO #{{$pedido->id}}
            </strong>
        </section>
    </div>
    <div class="border-bottom border-3 mt-4">
        <section class="pb-4">
            <strong style="font-size: 20px; color:#888888;">
                INFORMACIÓN DEL PEDIDO
            </strong>
        </section>
        <section class="mt-2 pb-4">
            <strong style="font-size: 18px; color:#888888;">
                Nombre:
            </strong>
            {{Auth::user()->name}}
        </section>
        <section class="mt-2 pb-4">
            <strong style="font-size: 18px; color:#888888;">
                Email:
            </strong>
            {{Auth::user()->email}}
        </section>
    </div>
    <div class="border-bottom border-3 mt-4">
        <section class="pb-4">
            <strong style="font-size: 20px; color:#888888;">
                COMPRA
            </strong>
        </section>
        <section class="mt-2 pb-4">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $p)
                    <tr class="mb-5">
                        <td>
                            <img src="{{asset('storage'). '/' . $p->Product->image_path}}" alt="" style="width: 100px; height: 100px;">
                        </td>
                        <td>
                            {{$p->Product->name}}
                        </td>
                        <td style="text-align: center;">
                            {{$p->quantity}}
                        </td>
                        <td style="text-align: center;">
                            ${{$p->Product->price}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table style="margin-top: 30px">
                <thead>
                    <tr>
                        <th scope="col" style="visibility: hidden;">Imagen</th>
                        <th scope="col" style="visibility: hidden;">Producto</th>
                        <th scope="col" style="font-size: 20px; color:#1d6ca1; text-align: center; border-bottom: none;">TOTAL A PAGAR</th>
                        <th scope="col" style="font-size: 20px; color:#1d6ca1; text-align: center; border-bottom: none;">${{$pedido->total}}</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </section>
    </div>
    <section class="footer">
    </section>
</body>

</html>