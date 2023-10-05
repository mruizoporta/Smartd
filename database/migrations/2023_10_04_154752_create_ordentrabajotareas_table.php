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
        Schema::create('ordentrabajotareas', function (Blueprint $table) {
            $table->id();

            $table->string('tarea')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('orden')->nullable();
            $table->string('comentario')->nullable();
            $table->boolean('activo')->default(true);
            $table->decimal('tiempo', 8, 2)->nullable();
            $table->foreignId('estado_id')->nullable()->constrained('valor_catalogos');
            $table->foreignId('orden_id')->nullable()->constrained('ordentrabajos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordentrabajotareas');
    }
};
