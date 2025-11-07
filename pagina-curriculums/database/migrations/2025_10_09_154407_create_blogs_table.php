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
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60);
            $table->string('apellidos', 100);
            $table->string('telefono', 15)->nullable();
            $table->string('correo', 100)->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->float('nota_media')->nullable();
            $table->longText('experiencia')->nullable();
            $table->longText('formacion')->nullable();
            $table->longText('habilidades')->nullable();
            $table->string('path', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
