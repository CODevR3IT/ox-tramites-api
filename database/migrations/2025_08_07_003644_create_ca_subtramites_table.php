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
        Schema::create('ca_subtramites', function (Blueprint $table) {
            $table->id();
            $table->string('clave')->nullable();            
            $table->string('descripcion');
            $table->string('detalle')->nullable();
            $table->boolean('estatus');
            $table->boolean('is_cita');
            $table->boolean('is_pago');
            $table->json('config')->nullable();
            $table->string('url_file')->nullable();
            $table->json('files')->nullable();
            $table->foreignId('ca_tramite_id')
                  ->constrained('ca_tramites')
                  ->onDelete('cascade');            
            $table->json('tipo_usuarios_restringidos')->nullable();
            //$table->foreign('id_tramite')->references('id')->on('ca_tramites');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ca_subtramites');
    }
};
