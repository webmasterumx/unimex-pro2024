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
        Schema::create('c_planteles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->string('correo', 150);
            $table->text('direccion');
            $table->string('telefonos', 40);
            $table->string('portada', 200);
            $table->text('descripcion_larga');
            $table->text('descripcion_corta');
            $table->json('galeria');
            $table->text('mapa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_planteles');
    }
};
