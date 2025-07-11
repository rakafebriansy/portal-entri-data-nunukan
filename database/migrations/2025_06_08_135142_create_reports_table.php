<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report_sps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_sp_id');
            $table->unsignedBigInteger('user_id');
            $table->year('tahun');
            $table->string('deskripsi', 255);
            $table->string('url_file');
            $table->enum('periode', ['Triwulan 1', 'Triwulan 2', 'Triwulan 3', 'Triwulan 4', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', 'Tahunan']);
            $table->enum('status', ['belum selesai', 'selesai']);
            $table->timestamps();

            $table->foreign('kategori_sp_id')->references('id')->on('kategori_sps')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
