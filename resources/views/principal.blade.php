@extends('layouts.general')

@section('titulo', 'Inicio')

@section('main')
    @parent
    <main>
        <livewire:productos-filtro>
        <livewire:productos-filtro>
    </main>
@endsection

@section('head')
    @livewireStyles
@endsection

@section('scripts')
    @livewireScripts
@endsection
