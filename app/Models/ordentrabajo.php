<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordentrabajo extends Model
{
    use HasFactory;

    public function Ordentrabajo(){
        return $this->belongsTo(ordentrabajo::class);
    }

    public function Empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function Cliente(){
        return $this->belongsTo(Cliente::class);
    }

}
