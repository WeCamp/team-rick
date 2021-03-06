<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

final class CreateBatchTable extends Migration
{
    public function up()
    {
        Schema::create('batch', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->date('expiration_date');
            $table->integer('retail_price');
            $table->timestamps();

//            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    public function down()
    {
        Schema::dropIfExists('batch');
    }
}
