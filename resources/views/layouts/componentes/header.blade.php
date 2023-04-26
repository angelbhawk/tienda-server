<header>
    <h1>TIENDA DEL TECNM</h1>
    @if(Session::has('cliente'))
        <h3>{{Session::get('cliente')->nombre}}</h3>
        <div><a href="/clientes/logout">Logout</a></div>
    @else
        <div><a href="/clientes">Login</a></div>
    @endif
</header>
