<?php

namespace App\Livewire\Proveedor;

use Livewire\Component;
use App\Models\Proveedor;

class TrashProveedor extends Component
{
    public $numeroFilas;
    public $tiempo;
    public $proveedores;
    public $showModalForceDelete = false;
    public $proveedor_id;//Id del modal force delete
    public $provNombre;

    public function abrirModalForceDelete($id, $nombre)
    {
        $this->proveedor_id = $id;
        $this->provNombre = $nombre;
        $this->showModalForceDelete = true;
    }

    public function forceDelete($id)
    {
        Proveedor::withTrashed()->find($id)->forceDelete(); // Elimina permanentemente
        $this->showModalForceDelete = false;        
        session()->flash('success', 'El Registro fue eliminado permanentemente');
    }
    public function closeModalForceDelete()
    {
        $this->showModalForceDelete = false;
    }

    public function restore($id)
    {
        Proveedor::withTrashed()->find($id)->restore(); // Restaura el registro        
        session()->flash('success', 'Registro Restaurado');
    }

    public function render()
    {
        $inicio = microtime(true);
        $this->proveedores = Proveedor::onlyTrashed()->get();
        $fin = microtime(true);
        $this->tiempo = round($fin - $inicio, 3);
        $this->numeroFilas = $this->proveedores->count();
        return view('livewire.proveedor.trash-proveedor', [
            'proveedores' => $this->proveedores
        ]);
    }
}
