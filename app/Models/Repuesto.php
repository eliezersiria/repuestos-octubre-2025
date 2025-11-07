<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $codigo
 * @property string $nombre
 * @property string|null $marca
 * @property string|null $descripcion
 * @property float $precio_compra
 * @property float $precio_venta
 * @property float|null $precio_promo
 * @property int $stock
 * @property string|null $url
 * @property bool $activo
 * @property string|null $thumb
 * @property int $categoria_id
 * @property int $proveedor_id
 */

class Repuesto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'codigo',
        'nombre',
        'marca',
        'descripcion',
        'precio_compra',
        'precio_venta',
        'precio_promo',
        'stock',
        'url',
        'activo',
        'thumb',
        'categoria_id',
        'proveedor_id'
    ];

    // Relación con Categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class)->withDefault([
            'nombre' => 'Categoría eliminada'
        ]);
    }

    // Relación con Proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class)->withDefault([
            'nombre' => 'Proveedor eliminado'
        ]);
    }

    // Relación muchos a muchos con Vehiculo
    public function vehiculos()
    {
        return $this->belongsToMany(Vehiculo::class, 'repuesto_vehiculos', 'repuesto_id', 'vehiculo_id');
    }

    
}
