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
        Schema::create('c_licenciaturas_sua', function (Blueprint $table) {
            $table->id();
            $table->string('portada', 150);
            $table->string('titulo', 150);
            $table->text('objetivo');
            $table->text('campo_laboral');
            $table->json('extras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_licenciaturas_sua');
    }
};
