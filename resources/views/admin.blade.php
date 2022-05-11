@extends('layouts.layout')

@section('stylesheet')
{{asset('css/styleShalala.css')}}
@endsection

@section('contenido')
@extends('layouts.sidebar')
<!-- Jquery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('li').on('click', function() {
            $(this).siblings().removeClass('nav-item');
            $(this).addClass('nav-item');

            $(this).siblings().children().removeClass('active');
            $(this).children().addClass('active');

            var id = $(this).attr('id'); //Se obtiene el id del boton escogido

            var tabla = document.getElementById('tabla-' + id);
            $(tabla).removeClass('d-none');

            $(tabla).siblings().addClass('d-none');
        })
    })
</script>
@endsection