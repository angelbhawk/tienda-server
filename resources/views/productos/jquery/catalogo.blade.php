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
                    <td><button class="btnEliminar">Eliminar</a></td>
                </tr>
        @endforeach
            </tbody>
        </table>
        {{$productos->links()}}
    </main>
@endsection

@section('aside')
@endsection

@section('head')
    <script src="/js/jquery-3.6.3.min.js"></script>
@endsection

@section('scripts')
<script >
    $(".btnEliminar").click(function(){
        let tr = $(this).parent().parent();
        let id = tr.children().first().text();
        $.get("/productos/jquery/catalogo/eliminar/"+id, function(data, status){
            tr.remove();
        });
    });
</script>
@endsection
