@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
<h1>Editar Categoria</h1>

<form action="/admin/categoria/{{$categoria->id}}" method="post">
    @csrf
    @method('PUT')
    <label for="">Ingrese Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{ $categoria->nombre }}">
    
    <label for="">Ingrese Descripcion:</label>
    <textarea name="detalle" id="" class="form-control">{{ $categoria->detalle }}</textarea>
    <input type="submit" class="btn btn-success" value="Editar Categoria">
</form>
@stop
