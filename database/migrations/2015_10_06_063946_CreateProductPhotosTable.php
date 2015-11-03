<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('product_photos', function(Blueprint $table){
          $table->increments('id');

          $table->integer('product_id')->unsigned();
          $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

          $table->string('name');
          $table->string('path');
          $table->string('thumbnail_path');
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
        //
        Schema::table('product_photos', function(BluePrint $table){
          $table->dropForeign('product_photos_product_id_foreign');
        });
        Schema::dropIfExists('product_photos');
    }
}
