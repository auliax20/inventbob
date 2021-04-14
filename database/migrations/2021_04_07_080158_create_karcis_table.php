<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarcisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karcis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karcis_id');
            $table->string('nama');
            $table->string('warna');
            $table->string('isi');
            $table->string('no_seri');
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
        Schema::dropIfExists('karcis');
    }
}
