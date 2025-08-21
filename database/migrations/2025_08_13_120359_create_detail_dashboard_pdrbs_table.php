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
        Schema::create('detail_dashboard_pdrbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dashboard_pdrb_id')->constrained()->cascadeOnDelete();
            $table->integer('pdrb_atas_dasar_harga_berlaku');
            $table->integer('pdrb_atas_dasar_harga_konstan');
            $table->integer('pertumbuhan_y_on_y');
            $table->integer('pdrb_per_kapita');
            $table->integer('nilai_adhb');
            $table->integer('nilai_adhk');
            $table->integer('sektor_lapangan_usaha_1_1');
            $table->integer('sektor_lapangan_usaha_1_2');
            $table->integer('sektor_lapangan_usaha_1_3');
            $table->integer('sektor_lapangan_usaha_2_1');
            $table->integer('sektor_lapangan_usaha_2_2');
            $table->integer('sektor_lapangan_usaha_2_3');
            $table->integer('sektor_lapangan_usaha_3_1');
            $table->integer('sektor_lapangan_usaha_3_2');
            $table->integer('sektor_lapangan_usaha_3_3');
            $table->integer('sektor_lapangan_usaha_4_1');
            $table->integer('sektor_lapangan_usaha_4_2');
            $table->integer('sektor_lapangan_usaha_4_3');
            $table->integer('sektor_lapangan_usaha_5_1');
            $table->integer('sektor_lapangan_usaha_5_2');
            $table->integer('sektor_lapangan_usaha_5_3');
            $table->integer('sektor_lapangan_usaha_6_1');
            $table->integer('sektor_lapangan_usaha_6_2');
            $table->integer('sektor_lapangan_usaha_6_3');
            $table->integer('sektor_lapangan_usaha_7_1');
            $table->integer('sektor_lapangan_usaha_7_2');
            $table->integer('sektor_lapangan_usaha_7_3');
            $table->integer('sektor_lapangan_usaha_8_1');
            $table->integer('sektor_lapangan_usaha_8_2');
            $table->integer('sektor_lapangan_usaha_8_3');
            $table->integer('sektor_lapangan_usaha_9_1');
            $table->integer('sektor_lapangan_usaha_9_2');
            $table->integer('sektor_lapangan_usaha_9_3');
            $table->integer('sektor_lapangan_usaha_10_1');
            $table->integer('sektor_lapangan_usaha_10_2');
            $table->integer('sektor_lapangan_usaha_10_3');
            $table->integer('sektor_lapangan_usaha_11_1');
            $table->integer('sektor_lapangan_usaha_11_2');
            $table->integer('sektor_lapangan_usaha_11_3');
            $table->integer('sektor_lapangan_usaha_12_1');
            $table->integer('sektor_lapangan_usaha_12_2');
            $table->integer('sektor_lapangan_usaha_12_3');
            $table->integer('sektor_lapangan_usaha_13_1');
            $table->integer('sektor_lapangan_usaha_13_2');
            $table->integer('sektor_lapangan_usaha_13_3');
            $table->integer('sektor_lapangan_usaha_14_1');
            $table->integer('sektor_lapangan_usaha_14_2');
            $table->integer('sektor_lapangan_usaha_14_3');
            $table->integer('adhb_lapangan_usaha_1');
            $table->integer('adhk_lapangan_usaha_1');
            $table->integer('adhb_lapangan_usaha_2');
            $table->integer('adhk_lapangan_usaha_2');
            $table->integer('adhb_lapangan_usaha_3');
            $table->integer('adhk_lapangan_usaha_3');
            $table->integer('sektor_pengeluaran_1_1');
            $table->integer('sektor_pengeluaran_1_2');
            $table->integer('sektor_pengeluaran_1_3');
            $table->integer('sektor_pengeluaran_2_1');
            $table->integer('sektor_pengeluaran_2_2');
            $table->integer('sektor_pengeluaran_2_3');
            $table->integer('sektor_pengeluaran_3_1');
            $table->integer('sektor_pengeluaran_3_2');
            $table->integer('sektor_pengeluaran_3_3');
            $table->integer('sektor_pengeluaran_4_1');
            $table->integer('sektor_pengeluaran_4_2');
            $table->integer('sektor_pengeluaran_4_3');
            $table->integer('sektor_pengeluaran_5_1');
            $table->integer('sektor_pengeluaran_5_2');
            $table->integer('sektor_pengeluaran_5_3');
            $table->integer('sektor_pengeluaran_6_1');
            $table->integer('sektor_pengeluaran_6_2');
            $table->integer('sektor_pengeluaran_6_3');
            $table->integer('adhb_komp_1');
            $table->integer('adhk_komp_1');
            $table->integer('adhb_komp_2');
            $table->integer('adhk_komp_2');
            $table->integer('adhb_komp_3');
            $table->integer('adhk_komp_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_dashboard_pdrbs');
    }
};
