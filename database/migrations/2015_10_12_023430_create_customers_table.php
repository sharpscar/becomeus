<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('customers',function(BluePrint $table){

          $table->increments('id');
          $table->string('first_name');
          $table->string('last_name')->nullable();
          $table->string('contact_email')->nullable();
          $table->string('contact_number');
          $table->string('order_relationship');
          $table->string('street')->nullable();
          $table->string('city')->nullable();
          $table->string('state')->nullable();
          $table->string('zip')->nullable();
          $table->string('country')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
