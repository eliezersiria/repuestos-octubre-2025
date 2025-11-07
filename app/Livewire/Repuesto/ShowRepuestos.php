<?php

namespace App\Livewire\Repuesto;

use Livewire\Component;
use App\Models\Repuesto;
use Livewire\WithPagination;

class ShowRepuestos extends Component
{
    use WithPagination;

    public $inicio;
    public $fin;
    public $numeroFilas;
    public $tiempo;
    // Campo de búsqueda
    public $search = ''; // Cada vez que cambie el texto de búsqueda, reinicia a la página 1
    public $editMode = false;
    public $repuesto_id;
    public $codigo;
    public $nombre;
    public $marca;
    public $descripcion;
    public $precio_compra;
    public $precio_venta;
    public $precio_promo;
    public $stock;
    public $url;
    public $activo;
    public $thumb;
    public $categoria_id;
    public $proveedor_id;
    protected $rules = [
        'codigo' => 'required|string',
        'nombre' => 'required|string',
        'marca' => 'required|string',
        'descripcion' => 'required',
        'precio_compra' => 'required|numeric',
        'precio_venta' => 'required|numeric',
        'stock' => 'required|string',
        'url' => 'required|string|unique:repuestos,url',
        'thumb' => 'required|image|max:1024', // 1MB máximo
        'categoria_id' => 'required',
        'proveedor_id' => 'required',
        'vehiculo_id' => 'required'
    ];
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateRepuesto()
    {
        $this->validate();
    }
    public function render()
    {
        //$repuestos = Repuesto::with('vehiculos')->get();
        $inicio = microtime(true);
        $this->repuestos = Repuesto::with(['vehiculos', 'categoria', 'proveedor'])
            ->when($this->search, function ($query) {
                $search = $this->search;
                $query->where(function ($q) use ($search) {
                    // 1. Buscar en nombre del repuesto
                    $q->where('nombre', 'like', "%{$search}%");
                })
                    ->orWhere(function ($q) use ($search) {
                        // 2. Buscar en vehículos compatibles
                        $q->whereHas('vehiculos', function ($sub) use ($search) {
                            $sub->where('marca', 'like', "%{$search}%")
                                ->orWhere('modelo', 'like', "%{$search}%")
                                ->orWhere('anio', 'like', "%{$search}%");
                        });
                    });
            })
            ->orderBy('nombre')
            ->paginate(10);

        $fin = microtime(true);
        $this->tiempo = round($fin - $inicio, 3);
        $this->numeroFilas = $this->repuestos->total();

        return view('livewire.repuesto.show-repuestos', [
            'repuestos' => $this->repuestos,
        ]);
    }
}
