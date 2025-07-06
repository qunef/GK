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
        Schema::table('programs', function (Blueprint $table) {
            // Tambahkan kolom setelah 'nama_kelas'
            $table->string('gambar')->nullable()->after('nama_kelas');
            $table->string('periode_kelas')->nullable()->after('gambar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['gambar', 'periode_kelas']);
        });
    }
};
