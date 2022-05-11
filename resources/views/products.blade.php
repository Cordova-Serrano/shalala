@extends('layouts.layout')

@section('stylesheet2')
{{asset('css/product.css')}}
@endsection

@section('contenido')
@extends('layouts.navbar')
<div class="container">
    <ul class="nav nav-tabs">
        <!-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Brownie</a>
        </li> -->
        @foreach($categorias as $cat)
        <li class="nav-item">
            <a class="nav-link" href="#">{{$cat->categoria}}</a>
        </li>
        @endforeach
    </ul>
</div>
<div class="container mt-3">
    <section class="d-flex justify-content-between flex-wrap" name="products list">
        @foreach($inventario as $e)
        <a href="{{ url('/producto/'.$e->Category->name.'/'.$e->id)}}" style="text-decoration: none;">
            <div class="d-flex justify-content-center align-items-center img-product-min" style="width: 316; height: 270; background-color:#f3f6fb;">
                <img class="" src="{{asset('storage'). '/' . $e->image_path}}" alt="" style="width: 80%; height: 80%;">

            </div>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h4>{{$e->name}}</h4>
                <strong><p class="txt-price">${{$e->price}}</p></strong>
            </div>
        </a>
        @endforeach
    </section>
</div>
<div class="container d-flex justify-content-center align-items-center p-2">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
@endsection