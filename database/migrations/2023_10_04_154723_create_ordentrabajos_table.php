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
        Schema::create('ordentrabajos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->nullable()->constrained('empresas');
            $table->foreignId('cliente_id')->nullable()->constrained('clientes');
            $table->string('nombre')->nullable();
            $table->date('fechacreacion')->nullable();
            $table->date('fechainicio')->nullable();
            $table->date('fechafin')->nullable();
            $table->date('fechafactura')->nullable();
            $table->boolean('anulada')->default(true);
            $table->string('comentarios')->nullable();
            $table->boolean('insumosoperativps')->default(false);
            $table->boolean('manoobraexterna')->default(false);
            $table->boolean('horasextras')->default(true);
            $table->decimal('tiempototal', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordentrabajos');
    }
};
