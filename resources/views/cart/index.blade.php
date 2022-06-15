@extends('layouts.principal')

@section('contenido')

    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="cyan-text text-darken-3">Carrito de compras</h1>
            </div>
        </div>
        @if(!session('cart'))
        <div class="row">
            <p>No hay items en el carrito</p>
        </div>
        @else()


        <div class="row">
            <div class="col s12">
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $index => $producto)
                        <tr>
                            <td>{{ $producto[0]['nombre_prod'] }}</td>
                            <td>{{ $producto[0]['cantidad'] }}</td>
                            <td>{{ $producto[0]['precio'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

          <div class="row">
              <form action="{{ route('cart.destroy' ,1) }}" method="POST">
                @method('DELETE')
                @csrf

                <div class="col s8">
                    <button class="btn waves-effect waves-light green darken-1" type="submit" name="action">Vaciar Carrito</button>
                 </div>
              </form>
          </div>

        </div>
    </div>
@endif
@endsection