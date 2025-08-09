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
        Schema::create('ca_estatus', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('asunto_correo')->nullable();
            $table->text('contenido_correo')->nullable();
            $table->boolean('estatus');
            $table->foreignId('ca_tipo_estatus_id')
                  ->constrained('ca_tipos_estatus')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ca_estatus');
    }
};
