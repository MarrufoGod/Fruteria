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
        Schema::create('tb_proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Telefono')->nullable();
            $table->string('Direccion')->nullable();
            $table->string('Correo_electronico')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_proveedores');
    }
};
