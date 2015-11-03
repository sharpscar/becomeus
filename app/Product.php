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
      'category',
      'brand',
      'image',
      'price',
      'price_krw',
      'status',
      'product_group',
      'size',
      'stock',
      'supplier',
      'marketplaces',
      'product_name',
      'color',
      'description',
      'demension',
      'weight',
      'keyword',
      'material_english',
      'material_china',
      'business_group',
      'added_time',
      'added_user',
      'modified_time',
      'modified_user'
    ];

    public function photos()
    {
      return $this->hasMany('App\Photo');
    }

    public function addPhoto(Photo $photo)
    {
      return $this->photos()->save($photo);
    }

    public function orderItem()
    {
      return $this->belongsTo('App\OrderItem' );
    }

    public function order()
    {
      return $this->belongsTo('App\Order');
    }

}
