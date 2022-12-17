<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Histories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Histories', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_Member');
            $table->bigInteger('Jumlah_Barang');
            $table->string('Nama_Barang');
            $table->bigInteger('Harga');
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
        Schema::dropIfExists('Histories');
    }
}
