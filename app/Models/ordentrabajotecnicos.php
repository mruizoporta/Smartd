<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordentrabajotecnicos extends Model
{
    use HasFactory;

    public function Ordentrabajo(){
        return $this->belongsTo(ordentrabajo::class);
    }

    public function Tecnicos(){
        return $this->belongsTo(Empleados::class);
    }
}
