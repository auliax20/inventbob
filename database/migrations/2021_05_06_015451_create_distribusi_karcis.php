<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribusiKarcis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribusi_karcis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karcis_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jumlah');
            $table->string('penerima');
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
        Schema::dropIfExists('distribusi_karcis');
    }
}
