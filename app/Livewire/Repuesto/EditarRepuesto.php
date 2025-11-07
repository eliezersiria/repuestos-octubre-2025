<?php

namespace App\Livewire\Repuesto;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Repuesto;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Vehiculo;
use App\Models\RepuestoVehiculo;

use Illuminate\Support\Str;


class EditarRepuesto extends Component
{
    use WithFileUploads;
    public $categorias;
    public $proveedores;
    public $vehiculos;
    public $vehiculosCompatibles;
    public $codigo;
    public $nombre;
    public $marca;
    public $descripcion;
    public $precio_compra;
    public $precio_venta;
    public $stock;
    public $url;
    public $thumb;
    public $categoria_id;
    public $proveedor_id;
    public $vehiculo_id;
    public $repuesto_id;
    public $repuesto;
    public function updatedPrecioCompra($value)
    {
        $this->precio_venta = is_numeric($value) ? round($value * 1.4, 2) : null;
    }
    public function updatedNombre($value)
    {
        // Genera el slug automáticamente cada vez que se cambia el nombre
        $this->url = Str::slug($value);
        // Opcional: asegurar que sea único
        $contador = 1;
        $slugOriginal = $this->url;
        while (Repuesto::where('url', $this->url)->exists()) {
            $this->url = $slugOriginal . '-' . $contador++;
        }
    }
    public function mount($id)
    {
        $this->vehiculos = Vehiculo::orderBy('marca', 'asc')->get();
        $this->categorias = Categoria::all();
        $this->proveedores = Proveedor::all();
        //MONTO TODOS LOS DATOS EN EL FORMULARIO DE EDITAR
        $repuesto = Repuesto::with('vehiculos')->findOrFail($id);
        $this->repuesto_id = $repuesto->id;
        $this->codigo = $repuesto->codigo;
        $this->nombre = $repuesto->nombre;
        $this->marca = $repuesto->marca;
        $this->descripcion = $repuesto->descripcion;
        $this->precio_compra = $repuesto->precio_compra;
        $this->precio_venta = $repuesto->precio_venta;
        $this->precio_promo = $repuesto->precio_promo;
        $this->stock = $repuesto->stock;
        $this->url = $repuesto->url;
        $this->activo = $repuesto->activo;
        $this->thumb = $repuesto->thumb;
        $this->categoria_id = $repuesto->categoria_id;
        $this->proveedor_id = $repuesto->proveedor_id;
        //EXTRAIGO TODOS LOS VEHICULOS COMPATIBLES
        $this->vehiculosCompatibles = $repuesto->vehiculos;

    }

    public function render()
    {
        return view('livewire.repuesto.editar-repuesto');
    }
}
