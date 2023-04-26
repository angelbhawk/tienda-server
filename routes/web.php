<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CarritoController;
use App\Http\Middleware\VerifyCsrfToken;
use PHPUnit\TextUI\XmlConfiguration\Group;

use function PHPUnit\Framework\returnSelf;

Route::get('/productos',function(){
    return view('productos.alta');
})->name('catalogo_productos')->middleware('admin');

Route::controller(ProductosController::class)->group(function () {
    Route::get('/', 'consultar')->name('home');;
    Route::get('/productos/detalle/{id}','detalle');
    Route::get('/productos/detalleMovil/{id}','detalleMovil');
    Route::get('/productos/show','show');
    Route::middleware(['admin'])->group(function () {
        Route::post('/productos/alta','alta');
        Route::get('/productos/catalogo','catalogo');

        Route::get('/productos/livewire/catalogo','catalogoLivewire');

        Route::get('/productos/angular/catalogo','catalogoAngular');
        Route::get('/productos/angular/catalogo/show/{pagina}/{elementosPorPagina}','catalogoAngularShow');
        Route::get('/productos/angular/catalogo/eliminar/{id}','catalogoAngularEliminar');

        Route::get('/productos/jquery/catalogo','catalogoJquery');
        Route::get('/productos/jquery/catalogo/show','catalogoJqueryShow');
        Route::get('/productos/jquery/catalogo/eliminar/{id}','catalogoJqueryEliminar');
    });
});

Route::controller(ClientesController::class)->group(function () {
    Route::get('/clientes', function(){
        return view('clientes.login');
    })->name('login');
    Route::post('/clientes/login','login');
    Route::post('/clientes/loginMovil','loginMovil')->withoutMiddleware(VerifyCsrfToken::class);
    Route::get('/clientes/logout','logout');
});

Route::middleware(['aut'])->group(function () {
    Route::controller(CarritoController::class)->group(function () {
        Route::get('/carrito','show')->name('carrito');
        Route::get('/carrito/agregar/{producto_id}','agregarGet');
        
    });
});

Route::controller(CarritoController::class)->group(function () {
    Route::post('/carrito/showMovil','showMovil')->withoutMiddleware(VerifyCsrfToken::class);
    Route::get('/carrito/showMovil','showMovil')->withoutMiddleware(VerifyCsrfToken::class);
    Route::post('/carrito/agregarMovil','agregarMovil')->withoutMiddleware(VerifyCsrfToken::class);
    Route::get('/carrito/agregarMovil','agregarMovil')->withoutMiddleware(VerifyCsrfToken::class);
});

Route::post('/carrito/agregar',[CarritoController::class,'agregarPost']);

Route::get('/producto/modificarImage',[ProductosController::class,'modificarImagen'])->withoutMiddleware(VerifyCsrfToken::class);
Route::post('/producto/modificarImage',[ProductosController::class,'modificarImagen'])
->withoutMiddleware(VerifyCsrfToken::class);