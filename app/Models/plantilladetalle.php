<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plantilladetalle extends Model
{
    use HasFactory;

    public function Plantilla(){
        return $this->belongsTo(Plantilla::class);
    }
}
