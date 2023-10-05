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
        Schema::create('plantilladetalles', function (Blueprint $table) {
            $table->id();

            $table->string('tarea')->nullable();
            $table->string('descripcion')->nullable();
            $table->boolean('activo')->default(true);
            $table->foreignId('plantilla_id')->nullable()->constrained('plantillas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plantilladetalles');
    }
};
