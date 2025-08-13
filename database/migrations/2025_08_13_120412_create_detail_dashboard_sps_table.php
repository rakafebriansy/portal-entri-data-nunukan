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
        Schema::create('detail_dashboard_sps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dashboard_sp_id')->constrained()->cascadeOnDelete();
            $table->integer('jumlah_alsintan');
            $table->integer('jumlah_penggunaan_benih');
            $table->integer('total_luas_penggunaan_lahan_pertanian');
            $table->integer('luas_panen_jagung_jan');
            $table->integer('luas_panen_jagung_feb');
            $table->integer('luas_panen_jagung_mar');
            $table->integer('luas_panen_jagung_apr');
            $table->integer('luas_panen_jagung_mei');
            $table->integer('luas_panen_jagung_jun');
            $table->integer('luas_panen_jagung_jul');
            $table->integer('luas_panen_jagung_agu');
            $table->integer('luas_panen_jagung_sep');
            $table->integer('luas_panen_jagung_okt');
            $table->integer('luas_panen_jagung_nov');
            $table->integer('luas_panen_jagung_des');
            $table->enum('jenis_panen_palawija_tertinggi_1', ['ubi_kayu','jagung','kacang_tanah','ubi_jalar']);
            $table->integer('luas_panen_palawija_tertinggi_1');
            $table->enum('jenis_panen_palawija_tertinggi_2', ['ubi_kayu','jagung','kacang_tanah','ubi_jalar']);
            $table->integer('luas_panen_palawija_tertinggi_2');
            $table->enum('jenis_panen_palawija_tertinggi_3', ['ubi_kayu','jagung','kacang_tanah','ubi_jalar']);
            $table->integer('luas_panen_palawija_tertinggi_3');
            $table->enum('jenis_tanaman_bst_tertinggi_1',['pisang','nanas','durian']);
            $table->integer('jumlah_tanaman_bst_tertinggi_1');
            $table->enum('jenis_tanaman_bst_tertinggi_2',['pisang','nanas','durian']);
            $table->integer('jumlah_tanaman_bst_tertinggi_2');
            $table->enum('jenis_tanaman_bst_tertinggi_3',['pisang','nanas','durian']);
            $table->integer('jumlah_tanaman_bst_tertinggi_3');
            $table->enum('jenis_tanaman_sbs_tertinggi_1',['bayam','kangkung','sawi']);
            $table->integer('luas_tanaman_sbs_tertinggi_1');
            $table->enum('jenis_tanaman_sbs_tertinggi_2',['bayam','kangkung','sawi']);
            $table->integer('luas_tanaman_sbs_tertinggi_2');
            $table->enum('jenis_tanaman_sbs_tertinggi_3',['bayam','kangkung','sawi']);
            $table->integer('luas_tanaman_sbs_tertinggi_3');
            $table->enum('jenis_ternak_potong_1',['kambing','babi','sapi','kerbau']);
            $table->integer('jumlah_ternak_potong_1');
            $table->enum('jenis_ternak_potong_2',['kambing','babi','sapi','kerbau']);
            $table->integer('jumlah_ternak_potong_2');
            $table->enum('jenis_ternak_potong_3',['kambing','babi','sapi','kerbau']);
            $table->integer('jumlah_ternak_potong_3');
            $table->enum('jenis_ternak_potong_4',['kambing','babi','sapi','kerbau']);
            $table->integer('jumlah_ternak_potong_4');
            $table->year('tahun_tren_pemotongan_ternak_1');
            $table->integer('jumlah_tren_pemotongan_ternak_1');
            $table->year('tahun_tren_pemotongan_ternak_2');
            $table->integer('jumlah_tren_pemotongan_ternak_2');
            $table->year('tahun_tren_pemotongan_ternak_3');
            $table->integer('jumlah_tren_pemotongan_ternak_3');
            $table->year('tahun_tren_pemotongan_ternak_4');
            $table->integer('jumlah_tren_pemotongan_ternak_4');
            $table->year('tahun_tren_pemotongan_ternak_5');
            $table->integer('jumlah_tren_pemotongan_ternak_5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_dashboard_sps');
    }
};
