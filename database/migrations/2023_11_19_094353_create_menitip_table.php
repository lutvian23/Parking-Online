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
        Schema::create('penitipan', function (Blueprint $table) {
            $table->id('idPenitipan')->unique();
            $table->integer('idClient');
            $table->char('plat', 15);
            $table->enum('status', ['OFF', 'MENITIP'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menitip');
    }
};
