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
        Schema::create('usuario_tramite', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->json('datos_tramite');
            $table->foreignId('ca_tramite_id')
                  ->constrained('ca_tramites')
                  ->onDelete('cascade')
                  ->nullable();
            $table->foreignId('ca_subtramite_id')
                  ->constrained('ca_subtramites')
                  ->onDelete('cascade')
                  ->nullable();
            $table->foreignId('ca_estatus_id')
                  ->constrained('ca_estatus')
                  ->onDelete('cascade')
                  ->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_tramite');
    }
};
