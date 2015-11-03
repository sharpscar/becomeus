<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('orders', function (Blueprint $table){

          $table->increments('id');
          //$table->string('product_name');
          //$table->string('size_color');
          //$table->string('price');
          //$table->string('quantity');
        //  $table->string('total');
          //$table->string('sales_price');
          $table->string('sales_owner');
          $table->date('order_date');
          $table->string('notes');
          $table->double('sub_total',5,2);
          $table->double('vat',3,2);
          $table->double('discount',3,2);
          $table->string('grand_total');
          $table->date('delivery_date');
          $table->string('delivery_agency');
          $table->string('track_number');
          $table->string('market_place');
          $table->string('customer_name');
          $table->string('order_status');
          $table->string('customer_id');
          $table->string('shipped_date');





          $table->date('updated_at')->nullable();
          $table->date('created_at')->nullable();


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
          Schema::dropIfExists('orders');
    }
}
