<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Order;



class OrderTableSeeder extends Seeder
{

  public function run()
  {
      $faker = Faker::create();  //'ko_KR'

      foreach(range(1,20)as $index)
      {
        Order::create([
          'product_name'=>$faker->word,
          'order_date'=>$faker->dateTime,
          'delivery_date'=>$faker->dateTime,
          'delivery_agency'=>$faker->company,
          'customer_name'=>$faker->name,
          'track_number'=>$faker->randomNumber
          ]);
      }
  }

}
