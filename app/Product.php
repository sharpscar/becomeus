<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public $timestamps = false;

    //
    public static $rules = [
      'businessGroup'=>'required',
      'productGroup'=>'required',
      'supplier'=>'required',
      'productCode'=>'required',
      'price_cny'=>'required',
      'stock'=>'required',
      'variation'=>'required',
      'weight'=>'required',
      'Material_china'=>'required'
    ];
    protected $fillable = [

      'product_code',
      'Image',
      'price',
      'status',
      'business_group',
      'product_group',
      'stock',
      'supplier',
      'marketplaces',
      'added_time',
      'added_user',
      'modified_time',
      'modified_user'
    ];

    public function photos()
    {
      return $this->hasMany('App\Photo');
    }
}
