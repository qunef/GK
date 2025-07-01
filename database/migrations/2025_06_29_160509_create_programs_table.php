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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas'); // Untuk "Kelas PLATINUM"
            $table->text('fitur'); // Untuk list fitur, kita akan simpan sebagai JSON
            $table->integer('harga_lama')->nullable(); // Untuk harga coret (opsional)
            $table->integer('harga_baru'); // Untuk harga yang ditampilkan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
