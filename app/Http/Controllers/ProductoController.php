<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with(["categoria"])->get();
        return response()->json($productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required",
            "precio" => "required",
            "cantidad" => "required",
            "categoria_id" => "required"
        ]);

        $url_imagen = "";
        if($file = $request->file("imagen")){
            $direccion_url = time() . "-". $file->getClientOriginalName();
            $file->move("imagenes", $direccion_url);

            $url_imagen = "imagenes/".$direccion_url;
        }

        $prod = new Producto();
        $prod->nombre = $request->nombre;
        $prod->precio = $request->precio;
        $prod->cantidad = $request->cantidad;
        $prod->imagen = $url_imagen;
        $prod->descripcion = $request->descripcion;
        $prod->categoria_id = $request->categoria_id;
        $prod->save();

        return response()->json(["mensaje" => "Producto registrado"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prod = Producto::with(["categoria"])->find($id);

        return response()->json($prod, 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nombre" => "required",
            "precio" => "required",
            "cantidad" => "required",
            "categoria_id" => "required"
        ]);

        $prod = Producto::find($id);

        $prod->nombre = $request->nombre;
        $prod->precio = $request->precio;
        $prod->cantidad = $request->cantidad;
        $prod->descripcion = $request->descripcion;
        $prod->categoria_id = $request->categoria_id;
        
        $url_imagen = "";
        if($file = $request->file("imagen")){
            $direccion_url = time() . "-". $file->getClientOriginalName();
            $file->move("imagenes", $direccion_url);

            $url_imagen = "imagenes/".$direccion_url;
            $prod->imagen = $url_imagen;
        }   
        $prod->update();

        return response()->json(["mensaje" => "Producto registrado"], 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return response()->json(["mensaje" => "Producto eliminado"], 200);

    }
}
