@extends('layouts.general')

@section('titulo', 'Login')

@section('main')
    @parent
    <main id='login'>
        <form name="login" method="post" action="/clientes/loginMovil">
            @csrf
            <label>Correo</label>
            <input type='email' name='correo'><br>
            <label>Contraseña</label>
            <input type='password' name='password'><br>
            <input type="submit" value='inicia sesion'>
        </form>
    </main>
@endsection
