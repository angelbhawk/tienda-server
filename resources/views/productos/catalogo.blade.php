@extends('layouts.general')

@section('titulo', 'Catalogo de Productos')

@section('main')
    @parent
    <main>
        <table>
            <title>Catalogo de Productos</title>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Envio</th>
                    <th>Existencia</th>
                    <th>Detalle</th>
                    <th colspan="2"><a class="btnAgregar" href="/productos/alta">Alta</a></th>
                </tr>
            </thead>
            <tbody>
             @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->envio}}</td>
                    <td>{{$producto->existencia}}</td>
                    <td>{{$producto->detalle}}</td>
                    <td><a class="btnModificar" href="/productos/modificar">Modificar</a></td>
                    <td><a class="btnEliminar" href="/productos/modificar">Eliminar</a></td>
                </tr>
             @endforeach
            </tbody>
        </table>
        {{$productos->links()}}
    </main>
@endsection

@section('aside')
@endsection
