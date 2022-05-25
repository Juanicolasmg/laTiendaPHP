<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "Aquí va a ir el catálogo de productos.";
        //Seleccionar los productos en un arreglo
        $productos = Producto::all();
        //mostrar la vista del catalogo, llevandole los productos
        return view('producto.index')
                ->with('productos', $productos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('producto.create')->with("marcas", $marcas)->with("categorias", $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreProductRequest $request)
    {
        //2. Crear validación
        $p = new Producto();
        $p->nombre = $request->nombre;
        $p->descripcion = $request->desc;
        $p->precio = $request->precio;
        $p->marca_id = $request->marca;
        $p->categoria_id = $request->categoria;
        //obtener file
        $archivo = $request->imagen;
        //nombre original
        $p->imagen = $archivo->getClientOriginalName();
        
        //ruta donde se almacena el archivo
        $ruta = public_path()."/img/productos";
        
        //movemos archivo a la ruta
        $archivo->move($ruta , 
                        $archivo->getClientOriginalName());

        $p->save();
        
        //Redireccionar a una ruta disponible.

        return redirect('productos/create')
                ->with('mensaje', "Producto registrado exitosamente.");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "Aquí se va a mostrar el detalle del producto.";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "Aquí se muestra el form de editar producto.";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        echo "Guarda el producto editado.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        echo "Eliminar el producto.";
    }
}
