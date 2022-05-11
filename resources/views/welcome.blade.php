@extends('layouts.layout')

@section('stylesheet')
    {{asset('css/styleShalala.css')}}
@endsection

@section('contenido')
@extends('layouts.navbar')
<!-- Section CATEGORIAS -->
<section class="container-fluid d-flex justify-content-center p-3" style="background-color: #ffc8cb;">
    <div class="d-block">
        <h1 class="text-center"><strong>CATEGORÍAS</strong></h1>
        <br>
        <h3 class="text-center">Conoce las categorías de postres SHALALA, te encantarán.</h3>

        <section class="circular mt-5 categorias">
            <a class="item" href="{{ url('/products') }}">
                <img src="{{asset('assets/img/brownies.jpg')}}" alt="">
                <h4 class="text-center">Brownies</h4>
            </a>
            <a class="item" href="">
                <img src="{{asset('assets/img/galletas.jpg')}}" alt="">
                <h4 class="text-center">Galletas</h4>
            </a>
            <a class="item" href="">
                <img src="{{asset('assets/img/paquetes.jpg')}}" alt="">
                <h4 class="text-center">Paquetes</h4>
            </a>
            <a class="item" href="">
                <img src="{{asset('assets/img/especiales.jpg')}}" alt="">
                <h4 class="text-center">Especiales</h4>
            </a>
            <a class="item" href="">
                <img src="{{asset('assets/img/personalizados.jpg')}}" alt="">
                <h4 class="text-center">Personalizados</h4>
            </a>
        </section>
    </div>
</section>
<!-- End Section Categorias -->
@endsection