<div>
    <aside class='filtros'><h3>Filtros</h3>
        <ul>
        @foreach ($filtros as $key => $filtro)
            <li><input type='checkbox'
                @if (isset($activos[$key]))
                    checked
                @endif
                wire:click="filtrar({{$key}})">{{$filtro['texto']}}</li>
        @endforeach
        </ul>
    @foreach ($productos as $producto)
        <article class="producto">
            <a href='/productos/detalle/{{$producto->id}}'>{{$producto->nombre}}</a><br>
            <img src="/img/producto.png" width="60px"><br>
            {{$producto->precio}}
        </article>
    @endforeach
    {{$productos->links()}}
</div>
