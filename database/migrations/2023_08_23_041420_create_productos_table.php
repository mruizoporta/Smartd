<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->integer('empresa_id')->nullable()->constrained('empresas');
            $table->string('codigo')->nullable();
            $table->string('nombre')->nullable();
            $table->foreignId('categoria_id')->nullable()->constrained('categorias');
            $table->foreignId('marca_id')->nullable()->constrained('marcas');
            $table->foreignId('medida_id')->nullable()->constrained('medidas');          
            $table->decimal('costopromedio', 8, 2)->nullable();
            $table->decimal('preciocredito', 8, 2)->nullable();
            $table->decimal('preciocontado', 8, 2)->nullable();
            $table->decimal('margenutilidadcredito', 8, 2)->nullable();
            $table->decimal('margenutilidadcontado', 8, 2)->nullable();
            $table->decimal('cantidadminima', 8, 2)->nullable();          
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
