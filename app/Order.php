<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//Model
class Order extends \Eloquent
{
    //

    // public function product(){
    //   return $this->hasMany('App\Product');
    // }
    //
    // public function customer(){
    //   return $this->hasOne('App\Customer');
    // }


    protected $fillable = [

      'sales_owner',
      'market_place',
      'customer_name',
      'product_name',
      'order_status',
      'order_date',
      'notes',
      'sub_total',
      'vat',
      'discount',
      'grand_total',
      'delivery_date',
      'delivery_agency',
      'track_number'
    ];
}
