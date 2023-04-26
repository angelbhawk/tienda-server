@extends('layouts.general')

@section('titulo', 'Alta de productos')

@section('main')
    @parent
<section id='altaProductos'>
    <h2>Alta de productos</h2>
    <form name='altaProductos' enctype="multipart/form-data" method="post" action="/productos/alta">
        @csrf
        <label>Nombre</label>
        <input type='text' name='nombre' value="{{ old('nombre') }}"/>
        @error('nombre')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>imagen</label>
        <input type='file' name='imagen'/>
        @error('imagen')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Precio</label>
        <input type='number' name='precio' step=".01" value="{{ old('precio') }}"/>
        @error('precio')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Existencia</label>
        <input type='number' name='existencia' value="{{ old('existencia') }}"/>
        @error('existencia')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Consto de envio</label>
        <input type='number' name='envio' step=".01" value="{{ old('envio') }}"/>
        @error('envio')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Detalle</label>
        <textarea name='detalle' cols="100" rows="10">{{ old('detalle') }}</textarea>
        @error('detalle')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <input type='submit' value='Dar de alta'/>
    </form>
</section>
@endsection

@section('aside')
@endsection

