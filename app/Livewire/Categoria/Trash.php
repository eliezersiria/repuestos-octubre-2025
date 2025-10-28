<?php

namespace App\Livewire\Categoria;
use Livewire\Component;
use App\Models\Categoria;


class Trash extends Component
{
    public $categorias;
    public $numeroFilas;
    public $tiempo;
    public $showModalForceDelete = false;
    public $idSeleccionado;//Id del modal force delete
    public $catNombre;

    public function abrirModalForceDelete($id, $nombre)
    {
        $this->idSeleccionado = $id;
        $this->catNombre = $nombre;
        $this->showModalForceDelete = true;
    }

    public function closeModalForceDelete()
    {
        $this->showModalForceDelete = false;
    }
    public function restore($id)
    {
        Categoria::withTrashed()->find($id)->restore(); // Restaura el registro
        session()->flash('success', 'Registro Restaurado');
    }
    public function forceDelete($id)
    {
        Categoria::withTrashed()->find($id)->forceDelete(); // Elimina permanentemente
        $this->showModalForceDelete = false;       
        session()->flash('success', 'El Registro fue eliminado permanentemente.');
    }
    public function render()
    {
        $inicio = microtime(true);
        $this->categorias = Categoria::onlyTrashed()->get();
        $fin = microtime(true);
        $this->tiempo = round($fin - $inicio, 3);
        $this->numeroFilas = $this->categorias->count();
        return view('livewire.categoria.trash', [
            'categorias' => $this->categorias
        ]);
    }
}