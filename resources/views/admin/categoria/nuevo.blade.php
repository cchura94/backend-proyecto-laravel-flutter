@extends('adminlte::page')

@section('title', 'Nueva Categoria')

@section('content_header')
    <h1>Nueva Categoria</h1>
@stop

@section('content')
<h1>Nueva Categoria</h1>

<form action="/admin/categoria" method="post">
    @csrf
    <label for="">Ingrese Nombre</label>
    <input type="text" class="form-control" name="nombre">
    
    <label for="">Ingrese Descripcion:</label>
    <textarea name="detalle" id="" class="form-control"></textarea>
    <input type="submit" class="btn btn-success" value="Guardar Categoria">
</form>
@stop
