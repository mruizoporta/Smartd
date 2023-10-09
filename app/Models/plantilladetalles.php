<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plantilladetalles extends Model
{
    use HasFactory;

    public function Plantilla(){
        return $this->belongsTo(plantillas::class);
    }
}
