<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordentrabajos extends Model
{
    use HasFactory;
  
    public function Empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function Cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function Estado(){
        return $this->belongsTo(ValorCatalogo::class);
    }

    
}
