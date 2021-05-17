<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanKarcis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_karcis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karcis_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jumlah_pesanan');
            $table->unsignedBigInteger('no_seri_awal');
            $table->unsignedBigInteger('no_seri_akhir');
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
        Schema::dropIfExists('permintaan_karcis');
    }
}
