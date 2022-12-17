<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CartTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CartTransactions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_Member');
            $table->string('id_Barang');
            $table->bigInteger('Quantity');
            $table->foreign('id_Member')->references('id')->on('Member');
            $table->foreign('id_Barang')->references('id')->on('Barang');
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
        Schema::dropIfExists('CartTransactions');
    }
}
