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
        Schema::create('tb_producto', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->decimal('Precio_compra', 10, 2);
            $table->decimal('Precio_venta', 10, 2);
            $table->string('Unidad_medida');
            $table->integer('cantidad')->nullable();
            $table->string('Categoria');
            $table->unsignedBigInteger('ID_proveedor');
            $table->foreign('ID_proveedor')->references('id')->on('tb_proveedores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_producto');
    }
};
