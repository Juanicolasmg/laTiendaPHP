@extends('layouts.principal')

@section('contenido')

<div class="container">

    <div class="row">
        <h1> Catálogo de Productos </h1>
    </div>
    
    <div class="row">
        @foreach($productos as $producto)
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                <img width="720px" height="280px" src="{{ asset('img/productos/' .$producto->imagen) }}">
                <span style=color:#eeeeee; class="card-title">{{$producto->nombre}}</span>
                </div>
                <div class="card-content">
                    <ul>
                        <li> Descripción: {{ $producto->descripcion }} </li>
                        <li> Precio: {{ $producto->precio }} </li>
                    </ul>
                </div>
                <div class="card-action">
                <a href="#">VER DETALLES</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection