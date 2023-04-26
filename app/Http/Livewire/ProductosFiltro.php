<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class ProductosFiltro extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $activos;
    private $filtros=[['filtro'=>'precioEntre','valor1'=>'0', 'valor2'=>'500','texto'=>'$0-$500'],
                      ['filtro'=>'precioEntre','valor1'=>'500', 'valor2'=>'1000','texto'=>'$500-$1000'],
                      ['filtro'=>'precioEntre','valor1'=>'1000', 'valor2'=>'5000','texto'=>'$1000-$5000'],
                      ['filtro'=>'precioEntre','valor1'=>'5000', 'valor2'=>'10000','texto'=>'$5000-$10000'],
                      ['filtro'=>'precioMasDe','valor'=>'10000','texto'=>' > $10000']];
    public function render()
    {
        $consulta = Producto::where('existencia','>',0);
        if (count($this->activos)>0)
        {
            $consulta->where(
                function($sql)
                {
                    foreach ($this->activos as $key)
                    {
                        switch ($this->filtros[$key]['filtro'])
                        {
                            case "precioMenorDe": $sql->orWhere('precio','<',$this->filtros[$key]['valor']);
                            break;
                            case "precioEntre": $sql->orWhere(function($q) use ($key){
                                        $q->where('precio','>=',$this->filtros[$key]['valor1'])
                                        ->where('precio','<=',$this->filtros[$key]['valor2']);
                                });
                            break;
                            case "precioMasDe": $sql->orWhere('precio','>',$this->filtros[$key]['valor']);
                            break;
                        }
                    }
                }
            );
        }
        //if (count($this->activos)==4)
            //return view('livewire.productos.consulta',['consulta'=>json_encode($consulta->toSql())]);
        $productos = $consulta->paginate(20);
        return view('livewire.productos.filtro',['productos'=>$productos,'filtros'=>$this->filtros]);
    }

    public function mount()
    {
        $this->activos = [];
    }

    public function filtrar($key)
    {
        if (isset($this->activos[$key]))
            unset($this->activos[$key]);
        else
            $this->activos[$key] = $key;
        $this->resetPage();
    }
}
