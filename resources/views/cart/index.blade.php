@extends('layouts.principal')

@section('contenido')

    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="cyan-text text-darken-3">Carrito de compras</h1>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $index => $producto)
                        <tr>
                            <td>{{ var_dump($producto) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

          <div class="row">
              <form action="{{ route('cart.destroy' ,1) }}" method="POST">
                @method('DELETE')
                @csrf

                    <button type="submit">
                        Vaciar contenido
                    </button>
              </form>
          </div>

        </div>
    </div>

@endsection 