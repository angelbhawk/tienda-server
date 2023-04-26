@extends('layouts.general')

@section('titulo', 'Catalogo de Productos')

@section('main')
    @parent
    <main>
        <livewire:productos-catalogo/>
    </main>
@endsection

@section('aside')
@endsection

@section('head')
    @livewireStyles
@endsection

@section('scripts')
    @livewireScripts
@endsection
