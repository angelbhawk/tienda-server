<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AgregarCarritoRequest;
use App\Http\Requests\CarritoRequest;
use App\Models\Carrito;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use App\Models\Producto;

class CarritoController extends Controller
{
    function show(Request $request)
    {
        return Carrito::where('cliente_id', session('cliente')->id)->get();
    }

    function agregarGet($producto_id)
    {
        $cliente = session('cliente');
        Carrito::agregarProducto($producto_id,$cliente->id);
        return redirect()->route('carrito');
    }

    //function agregarPost(AgregarCarritoRequest $request)
    function agregarPost($producto_id,$cliente_id)
    {
        Carrito::agregarProducto($producto_id,$cliente_id);
        return redirect()->route('carrito');
    }

    public function showMovil(CarritoRequest $request)
    {
        $cliente = Cliente::where('token',$request->token)->get()->first();
        if ($cliente)
        {
            //pendiente - validar vigencia
            $carrito = DB::table('carritos')
                ->select('productos.id','productos.nombre','productos.precio','carritos.cantidad','productos.envio','productos.detalle')
                ->join('productos','carritos.producto_id','=','productos.id')
                ->where('cliente_id', $cliente->id)->get();
            unset($carrito->created_at);
            unset($carrito->updated_at);
            return json_encode($carrito);
        }
        return "false";
    }

    public function agregarMovil(CarritoRequest $request)
    {
        $cliente = Cliente::where('token',$request->token)->get()->first();
        if ($cliente)
        {
            $carrito = new Carrito();
            $carrito->producto_id = $request->input('producto');
            $carrito->cliente_id = $cliente->id;
            $carrito->cantidad = $request->input('cantidad');
            $carrito->save();
            return "producto agregado al carrito";
        }
        return "false";
    }
}