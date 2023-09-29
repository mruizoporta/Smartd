<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    public function Empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function Pais(){
        return $this->belongsTo(Pais::class);
    }

    public function Ciudad(){
        return $this->belongsTo(Ciudad::class);
    }
}
