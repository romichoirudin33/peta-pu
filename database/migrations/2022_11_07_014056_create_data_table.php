<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('pekerjaan_spam')->nullable();
            $table->string('anggaran')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('dusun')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('jumlah_terlayani')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('dimensi')->nullable();
            $table->string('panjang_pipa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
};
