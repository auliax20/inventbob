<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiStokKarcis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karcis_stok_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stok_id');
            $table->unsignedInteger('stok_awal');
            $table->unsignedInteger('jumlah_transaksi');
            $table->unsignedInteger('stok_akhir');
            $table->enum('jenis', ['masuk','keluar']);
            $table->text('ket')->nullable();
            $table->string('refID', 50)->nullable();
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
        Schema::dropIfExists('karcis_stok_transaksi');
    }
}
