<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConceptoRecibo extends Model
{
    use HasFactory;

    //Relacion de uno a muchos inversa
    public function concepto()
    {
        return $this->belongsTo(Concepto::class);
    }

    public function recibo()
    {
        return $this->belongsTo(Recibo::class);
    }
}
