<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoCollection;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProductoCollection(Producto::where('disponible', 1)->orderBy('id','ASC')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'imagen' => 'required|string|max:255',
        'disponible' => 'required|numeric',
        'stock' => 'required|numeric',
        'categoria_id' => 'required|numeric',
    ]);

    // Crear un nuevo objeto Producto y asignar los valores del formulario
    $producto = new Producto;
    $producto->nombre = $request->input('nombre');
    $producto->precio = $request->input('precio');
    $producto->imagen = $request->input('imagen');
    $producto->disponible = $request->input('disponible');
    $producto->stock = $request->input('stock');
    $producto->categoria_id = $request->input('categoria_id');

    // Guardar el objeto Producto en la base de datos
    $producto->save();

    // Redirigir al usuario a la página de inicio del apartado de administración
    return response()->json(['mensaje' => 'Producto creado correctamente'], 201);
}

        
           
        
        
    


    
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
        /* $producto->delete();
        return [
        'producto' => $producto
    ]; */

        
        
        
       
        
        // Validar los datos del formulario
        /* $producto = Producto::findOrFail($stock);
        $producto->stock = $request->input('stock');
        $producto->save();

        return response()->json(['message' => 'El stock del producto se ha actualizado correctamente']); */


        // Actualizar el producto en la base de datos
        /* $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->imagen = $request->input('imagen');
        $producto->disponible = $request->input('disponible');
        $producto->stock = $request->input('stock');
        $producto->categoria_id = $request->input('categoria_id');
        $producto->save(); */

        // Devolver el producto actualizado
        /* return [
            'producto' => $producto
            ]; */
        
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }

    public function handleClickProductoUpdate(Request $request, Producto $producto){
        if ($producto->disponible === 1) {
            $producto->nombre = $request->input('nombre');
            $producto->precio = $request->input('precio');
            $producto->imagen = $request->input('imagen');
            $producto->categoria_id = $request->input('categoria');
            $producto->save();
            return [
                'producto' => $producto
                ];
        }
    }
    public function handleClickProductoAgotado(Request $request, Producto $producto){
        $producto->disponible=0;
        $producto->save();
            return [
                'producto' => $producto
                ];
        
    }
    public function handleClickProductoStock(Request $request, Producto $producto){
        if ($producto->disponible === 1) {
            $producto->stock = $request->input('stock');
            $producto->save();
        }
        
        
        return [
        'producto' => $producto
        ];
        
    }
    
}
