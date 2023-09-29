<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    use HasFactory;

    public function Empresa(){
        return $this->belongsTo(Empresa::class);
    }
}
