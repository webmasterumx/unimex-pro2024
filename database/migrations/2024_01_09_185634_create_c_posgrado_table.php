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
        Schema::create('c_posgrado', function (Blueprint $table) {
            $table->id();
            $table->string('portada', 150);
            $table->string('titulo', 150);
            $table->text('objetivo');
            $table->json('temario_posgrado');
            $table->json('temario_maestria');
            $table->text('bolsadetrabajo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_posgrado');
    }
};
