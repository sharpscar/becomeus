<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//Model
class Order extends Model
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

    public function product()
    {
      return $this->hasManyThrough('App\Product', 'App\OrderItem','product_id','');
    }

    public function orderItem()
    {
      return $this->hasMany('App\OrderItem');
    }

}
