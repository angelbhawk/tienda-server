<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;

class ProductosCatalogo extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.productos.catalogo',['productos'=>Producto::paginate(20)]);
    }

    public function eliminar($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
    }
}
