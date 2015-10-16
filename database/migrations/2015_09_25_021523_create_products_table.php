<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products', function (Blueprint $table){

        $table->string('product_code');
        $table->string('category');
        $table->string('brand');
        $table->string('image')->nullable();
        $table->integer('price');
        $table->integer('price_krw');
        $table->string('status');
        $table->string('product_group');
        $table->string('size')->nullable();
        $table->integer('stock');
        $table->string('supplier');
        $table->string('marketplaces')->nullable();
        $table->string('product_name');
        $table->string('color');
        $table->string('description');
        $table->string('demension');
        $table->integer('weight');
        $table->string('keyword');
        $table->string('material_english');
        $table->string('material_china');
        $table->increments('id');
        $table->string('business_group');
        $table->string('variation');
        $table->string('added_time');
        $table->string('added_user');
        $table->string('modified_time');
        $table->string('modified_user');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('products');
    }
}
