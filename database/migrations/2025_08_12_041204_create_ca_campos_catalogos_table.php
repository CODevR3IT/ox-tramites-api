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
        Schema::create('ca_campos_catalogos', function (Blueprint $table) {
            $table->id();
            $table->integer('orden')->nullable();
            $table->string('nombre');
            $table->string('tipo');
            $table->integer('longitud');
            $table->boolean('nullable');
            $table->foreignId('ca_catalogo_id')
                  ->constrained('ca_catalogos')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ca_campos_catalogos');
    }
};
