<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::get();

        return response()->json($categorias, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validar
        $request->validate([
            "nombre" => "required"
        ]);

        $cat = new Categoria();
        $cat->nombre = $request->nombre;
        $cat->color_hexadecimal = $request->color_hexadecimal?$request->color_hexadecimal:"-";
        $cat->detalle = $request->detalle;
        $cat->save();

        return response()->json(["mensaje" => "Categoria registrada"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id);

        return response()->json($categoria, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nombre" => "required"
        ]);

        $cat = Categoria::find($id);
        $cat->nombre = $request->nombre;
        $cat->color_hexadecimal = $request->color_hexadecimal;
        $cat->detalle = $request->detalle;
        $cat->update();

        return response()->json(["mensaje" => "Categoria actualizada"], 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Categoria::find($id);
        $cat->delete();

        return response()->json(["mensaje" => "Categoria eliminada"], 200);

    }
}
