<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class AdminCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::paginate(2);
        return view("admin.categoria.lista", compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categoria.nuevo");
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

        return redirect("/admin/categoria");


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view("admin.categoria.editar", compact("categoria"));
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

        return redirect("admin/categoria");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Categoria::find($id);
        $cat->delete();

        return redirect("admin/categoria");

    }
}
