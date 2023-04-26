<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\AltaProductoRequest;
use App\Http\Requests\ProductoModificarImagenRequest;
use App\Models\Cliente;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Date;

class ProductosController extends Controller
{
    public function show()
    {
        return Producto::select(['id','nombre','precio'])->take(20)->get();
    }

    public function consultar()
    {
        //$productos = Producto::all();
        $productos = Producto::take(20)->get();
        //return $productos;
        return view('principal',["productos"=>$productos]);
    }

    public function alta(AltaProductoRequest $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->existencia = $request->input('existencia');
        $producto->envio = $request->input('envio');
        $producto->detalle = $request->input('detalle');
        $producto->save();
        Storage::putFileAs('public',$request->file('imagen'),
        'imagenes/'.$producto->id.'.jpg');
        //return view('productos.alta');
        route('catalogo_productos');
    }

    public function modificarImagen(Request $request)
    {
        $token = $request['token'];
        $imagen = $request->file('imagen');
        $cliente = Cliente::where('token',$token)->get()->first();

        if ($cliente){
                if($imagen){
                    Storage::putFileAs('public',$request->file('imagen'),
                    'imagenes/'.$request->id.'.jpg');
                     return "ok";
                }
            return "no hay imagen"; 
            
        }
        return abort(404);//$request->file('imagen');
    }


    public function detalle($id)
    {
        $producto = Producto::find($id);
        if ($producto)
            return view('productos.detalle',['producto'=>$producto]);
        else
            abort(404);
    }

    public function detalleMovil($id)
    {
        $producto = Producto::find($id);
        if ($producto)
        {
            //return $producto->detalle;
            unset($producto->created_at);
            unset($producto->updated_at);
            return json_encode($producto);
        }
        else
            return "false";
    }

    public function catalogo()
    {
        $productos = Producto::paginate(20);
        return view('productos.catalogo',["productos"=>$productos]);
    }
//////////////////////////LIVEWIRE//////////////////////////
    public function catalogoLivewire()
    {
        return view('productos.livewire.catalogo');
    }

//////////////////////////ANGULAR///////////////////////////
    public function catalogoAngular()
    {
        return view('productos.angular.catalogo');
    }

    public function catalogoAngularShow($pagina,$elementosPorPagina)
    {
        return Producto::offset(($pagina-1)*$elementosPorPagina)->take($elementosPorPagina)->get();
    }

    public function catalogoAngularEliminar($id)
    {
        $producto = Producto::find($id);
        if ($producto)
        {
            $producto->delete();
            return 1;
        }
        return 0;
    }
//////////////////////////JQUERY///////////////////////////
    public function catalogoJquery()
    {
        $productos = Producto::paginate(20);
        return view('productos.jquery.catalogo',["productos"=>$productos]);
    }

    public function catalogoJqueryShow($pagina,$elementosPorPagina)
    {
        return Producto::offset(($pagina-1)*$elementosPorPagina)->take($elementosPorPagina)->get();
    }

    public function catalogoJqueryEliminar($id)
    {
        $producto = Producto::find($id);
        if ($producto)
        {
            $producto->delete();
            return 1;
        }
        return 0;
    }
//////////////////////////////////////////////////////////////
    public function eliminar($id)
    {
    }
}
