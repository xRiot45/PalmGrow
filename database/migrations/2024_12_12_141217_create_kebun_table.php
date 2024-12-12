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
        Schema::create('kebun', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi');
            $table->integer('luas');
            $table->enum('status', ['Aktif', 'Non-Aktif']);
            $table->date('tanggal_tanam')->default(date('Y-m-d'));
            $table->date('tanggal_panen')->default(date('Y-m-d'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebun');
    }
};
