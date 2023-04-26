<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use Session;

class Carrito extends Model
{
    use HasFactory;

    static function agregarProducto($producto_id,$cliente_id)
    {
        //$producto = Producto::find($producto_id);
        $carrito = Carrito::where([['producto_id',$producto_id],
                                   ['cliente_id',$cliente_id]])
                                    ->get()->first();
        if ($carrito)
        {
            $carrito->cantidad = $carrito->cantidad+1;
        }
        else
        {
            $carrito = new Carrito();
            $carrito->producto_id = $producto_id;
            $carrito->cliente_id = $cliente_id;
            $carrito->cantidad = 1;
        }
        $carrito->save();
    }
}
