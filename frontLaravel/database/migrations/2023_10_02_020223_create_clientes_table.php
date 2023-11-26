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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('codigo');
            $table->string('correo');
            $table->integer('edad');
            $table->string('telefono');
            $table->text('descripcion');
            $table->text('expectativas');
            $table->string('horario')->nullable();
            $table->string('clasificacion')->nullable();
            $table->date('nacimiento')->nullable();
            $table->string('usuario_id')->nullable();
            $table->string('secciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
