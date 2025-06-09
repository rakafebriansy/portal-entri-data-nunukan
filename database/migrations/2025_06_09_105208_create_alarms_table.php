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
        Schema::create('alarms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_sp_id')->nullable();
            $table->unsignedBigInteger('report_pdrb_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('report_sp_id')->references('id')->on('report_sps')->onDelete('cascade');
            $table->foreign('report_pdrb_id')->references('id')->on('report_pdrbs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alarms');
    }
};
