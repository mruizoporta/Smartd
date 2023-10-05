<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordentrabajotareas extends Model
{
    use HasFactory;

    public function Ordentrabajo(){
        return $this->belongsTo(ordentrabajo::class);
    }

    public function Estado(){
        return $this->belongsTo(ValorCatalogo::class);
    }
}
