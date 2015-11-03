<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('orderItem', function (Blueprint $table){
          $table->string('product_name');
          $table->string('size_color');
          $table->int('price');
          $table->int('quantity');
          $table->int('total');
          $table->int('sales_price');
          $table->string('order_id');
          $table->string('product_id');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        Schema::dropIfExists('orderItem');
    }
}
