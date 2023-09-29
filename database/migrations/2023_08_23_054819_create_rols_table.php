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
        Schema::create('rols', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();

            $table->boolean('seguridad')->default(false);
            $table->boolean('configuracion')->default(false);
            $table->boolean('catalogos')->default(false);
            $table->boolean('inventario')->default(false);
            $table->boolean('facturacion')->default(false);
            $table->boolean('ordentrabajo')->default(false);
            $table->boolean('cuentasporcobrar')->default(false);
            $table->boolean('cuentasporpagar')->default(false);
            $table->boolean('contabilidad')->default(false);
            
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
        Schema::dropIfExists('rols');
    }
};
