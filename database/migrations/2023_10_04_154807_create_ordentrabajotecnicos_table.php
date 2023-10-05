<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ordentrabajotecnicos', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('orden_id')->nullable()->constrained('ordentrabajos');
            $table->foreignId('tecnico_id')->nullable()->constrained('empleados');          
            $table->decimal('horasextras', 8, 2)->nullable();         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordentrabajotecnicos');
    }
};
