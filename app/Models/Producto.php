<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'descripcion',
        'precio_compra',
        'existencia',
        'stock_minimo',
        'unidads_id',
        'categoriaproductos_id',
        'estados_id',
        'proveedor_id',
        'ruta',
    ];

    //Relacion de uno a muchos 

    public function unidad()
    {
        return $this->hasMany('App\Models\Unidad');
    }
}