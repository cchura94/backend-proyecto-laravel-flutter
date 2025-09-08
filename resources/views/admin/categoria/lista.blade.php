@extends('adminlte::page')

@section('title', 'Mis Categorias')

@section('content_header')
    <h1>Gestión Categorias</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <a href="/admin/categoria/create" class="btn btn-primary">Nueva Categoria</a>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nombre</th>
                    <th>DETALLE</th>
                    <th>ACCIÓN</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->nombre }}</td>
                    <td>{{ $cat->detalle }}</td>
                    <td>
                        <a href="/admin/categoria/{{ $cat->id }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <form action="/admin/categoria/{{ $cat->id }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="eliminar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categorias->links() }}
    </div>

</div>
@stop
