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
        Schema::create('ca_campos_subtramites', function (Blueprint $table) {
            $table->id();
            $table->json('campos');
            $table->boolean('estatus');
            $table->foreignId('ca_subtramite_id')
                  ->constrained('ca_subtramites')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ca_campos_subtramites');
    }
};
