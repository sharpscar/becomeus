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


        $table->increments('id');
        $table->string('business_group');
        $table->string('product_group');
        $table->string('category');
        $table->string('supplier');
        $table->string('brand');
        $table->string('product_code');
        $table->integer('price');
        $table->integer('price_krw');
        $table->integer('stock');
        $table->string('variation');
        $table->string('color');
        $table->integer('weight');
        $table->string('dimension');
        $table->string('material_china');
        $table->string('material_english');
        $table->string('product_name');
        $table->string('description');
        $table->string('keyword');
        $table->string('image')->nullable();
        $table->string('marketplaces')->nullable();
        $table->string('status');
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
