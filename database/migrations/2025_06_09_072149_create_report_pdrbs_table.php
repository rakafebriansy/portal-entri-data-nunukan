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
        Schema::create('report_pdrbs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_pdrb_id');
            $table->unsignedBigInteger('user_id');
            $table->year('tahun');
            $table->string('deskripsi', 255);
            $table->string('url_file');
            $table->enum('periode', ['Triwulan 1', 'Triwulan 2', 'Triwulan 3', 'Triwulan 4']);
            $table->enum('status', ['belum selesai', 'selesai']);

            $table->foreign('kategori_pdrb_id')->references('id')->on('kategori_pdrbs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_pdrbs');
    }
};
