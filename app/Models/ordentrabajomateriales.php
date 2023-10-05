<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordentrabajomateriales extends Model
{
    use HasFactory;

    public function Ordentrabajo(){
        return $this->belongsTo(ordentrabajo::class);
    }

    public function Materiales(){
        return $this->belongsTo(Producto::class);
    }

    public function Medida(){
        return $this->belongsTo(ValorCatalogo::class);
    }
}
